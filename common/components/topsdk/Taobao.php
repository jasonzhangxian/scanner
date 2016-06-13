<?php
	namespace common\components\topsdk;
	use TopClient;

	include "TopSdk.php";

	date_default_timezone_set('Asia/Shanghai'); 
	define('TOP_SDK_BASE_DIR', __DIR__ . '/');


	/**
	* 淘宝Sdk调用类
	*/
	class Taobao extends TopClient
	{
		public $appkey;
		public $secretKey;
		private $session_key;
		public $_req = null;
		public $format = 'xml';
		
		function __construct($appkey = "", $secretKey = "")
		{
			parent::__construct($appkey = "", $secretKey = "");
			$this->appkey = $appkey;
			$this->secretKey = $secretKey;
		}


		public function setAppkey($appkey)
		{
			if(!empty($appkey))
				$this->appkey = $appkey;
		}
		
		public function setSecret($secretKey)
		{
			if(!empty($secretKey))
				$this->secretKey = $secretKey;
		}
		
		public function setSession($session)
		{
			$this->session_key = $session;
		}

		public function setOption($_options)
		{
			if($_options)
			{
				$this->setAppkey($_options['appkey']);
				$this->setSecret($_options['secretKey']);
				$this->setSession($_options['session_key']);
			}
		}

		/**
		 * setRequest
		 *
		 * COMMENT : setRequest : 设置调用方法
		 *
		 * @access	public
		 * @param	string
		 * @param	array
		 * @return	bool
		 */
		public function setRequest($request = '', $params = array())
		{
			$allow_requests = $this->_get_all_request();
			if (!in_array($request, $allow_requests)) {
				throw new Exception('不支持当前请求方法', 1);
				return FALSE;
			}
			$this->_req = new $request;
			if(!empty($params))
			{
				foreach ($params as $method => $param)
				{
					$method = implode("",array_map('ucfirst',explode('_', $method)));
					$this->{'set'.$method}($param);
				}
			}
			return TRUE;
		}

		/**
		 * getData
		 *
		 * COMMENT : getData : comment
		 *
		 * @access	public
		 * @param	string
		 * @return	bool
		 */
		public function getData($session = '')
		{
			if(!empty($session))
				$this->session_key = $session;
			$resp = $this->execute($this->_req,$this->session_key);
	        if ('xml' == $this->format) {	
				$resp = $this->_get_object_vars_final($resp);
			}
			return $resp;
		}

		// ------------------------------------------------------------------------
		
		/**
		 * __call
		 *
		 * COMMENT : __call : comment
		 *
		 * @access	public
		 * @param	string
		 * @return	bool
		 */
		public function __call($method, $args)
		{
			if (!is_object($this->_req)) {
				throw new Exception('没有初始化请求方法', 1);
			}

	        if(method_exists($this->_req, $method))
	        {
	            $this->_req->$method($args[0]);
	        }
		}

		// ------------------------------------------------------------------------
		
		/**
		 * get_object_vars_final
		 *
		 * COMMENT : get_object_vars_final : comment
		 *
		 * @access	private
		 * @param	string
		 * @return	bool
		 */
	    private function _get_object_vars_final ($obj)
	    {
	        if (is_object($obj)) {
	            $obj = get_object_vars($obj);
	        }

	        if (is_array($obj)) {
	            foreach ($obj as $key => $value) {
	                $obj[$key] = $this->_get_object_vars_final($value);
	            }
	        }
	        return $obj;
	    }	
		// ------------------------------------------------------------------------
		
		/**
		 * _get_all_request
		 *
		 * COMMENT : _get_all_request : 获取所有支持的请求
		 *
		 * @access	public
		 * @param	string
		 * @return	bool
		 */
		public function _get_all_request()
		{
			$_requests = array();
			foreach (glob(TOP_SDK_BASE_DIR.'top/request/*.php') as $filename) {
			    $_requests[] = preg_replace('#.php$#', '', basename($filename)) ;
			}
			return $_requests;
		}

	}

?>