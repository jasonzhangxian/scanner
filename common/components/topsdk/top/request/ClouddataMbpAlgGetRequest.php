<?php
/**
 * TOP API: taobao.clouddata.mbp.alg.get request
 * 
 * @author auto create
 * @since 1.0, 2016.03.06
 */
class ClouddataMbpAlgGetRequest
{
	/** 
	 * 分组ID
	 **/
	private $groupId;
	
	/** 
	 * 模型ID
	 **/
	private $modelId;
	
	/** 
	 * 调用ARIMA模型时，parameter设为"$预测时长"，其中"预测时长"是一个大于0小于60的整数。对于回归模型，parameter的格式为"!feature1,!feature2,...,!featureN"。其中被英文逗号隔开的每一个值表示一个feature的值，用英文叹号开头。
	 **/
	private $parameter;
	
	private $apiParas = array();
	
	public function setGroupId($groupId)
	{
		$this->groupId = $groupId;
		$this->apiParas["group_id"] = $groupId;
	}

	public function getGroupId()
	{
		return $this->groupId;
	}

	public function setModelId($modelId)
	{
		$this->modelId = $modelId;
		$this->apiParas["model_id"] = $modelId;
	}

	public function getModelId()
	{
		return $this->modelId;
	}

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
		return "taobao.clouddata.mbp.alg.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->groupId,"groupId");
		RequestCheckUtil::checkNotNull($this->modelId,"modelId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
