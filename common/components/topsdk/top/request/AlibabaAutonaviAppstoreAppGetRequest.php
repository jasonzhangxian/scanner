<?php
/**
 * TOP API: alibaba.autonavi.appstore.app.get request
 * 
 * @author auto create
 * @since 1.0, 2015.07.28
 */
class AlibabaAutonaviAppstoreAppGetRequest
{
	/** 
	 * 应用key
	 **/
	private $applicationKey;
	
	/** 
	 * 版本号
	 **/
	private $version;
	
	private $apiParas = array();
	
	public function setApplicationKey($applicationKey)
	{
		$this->applicationKey = $applicationKey;
		$this->apiParas["application_key"] = $applicationKey;
	}

	public function getApplicationKey()
	{
		return $this->applicationKey;
	}

	public function setVersion($version)
	{
		$this->version = $version;
		$this->apiParas["version"] = $version;
	}

	public function getVersion()
	{
		return $this->version;
	}

	public function getApiMethodName()
	{
		return "alibaba.autonavi.appstore.app.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->applicationKey,"applicationKey");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
