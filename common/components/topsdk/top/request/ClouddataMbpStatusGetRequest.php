<?php
/**
 * TOP API: taobao.clouddata.mbp.status.get request
 * 
 * @author auto create
 * @since 1.0, 2015.11.04
 */
class ClouddataMbpStatusGetRequest
{
	/** 
	 * 形式为param1=value1,param2=value2,...的字符串， 参数名称只能包含字母数字和下划线，Value如果包含=和，必须用\转义. 必填参数: query_type:用于描述查询类型，目前只有1，表示查询任务的运行状态 其他参数： action_id:当query_type为1的时候必填，用于表示需要查询的任务的id date:当query_type为1的时候必填，用于表示任务运行的日期,格式必须是yyyyMMdd
	 **/
	private $parameter;
	
	private $apiParas = array();
	
	public function setParameter($parameter)
	{
		$this->parameter = $parameter;
		$this->apiParas["parameter"] = $parameter;
	}

	public function getParameter()
	{
		return $this->parameter;
	}

	public function getApiMethodName()
	{
		return "taobao.clouddata.mbp.status.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
