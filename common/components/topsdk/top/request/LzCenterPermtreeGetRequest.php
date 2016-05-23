<?php
/**
 * TOP API: taobao.lz.center.permtree.get request
 * 
 * @author auto create
 * @since 1.0, 2016.03.06
 */
class LzCenterPermtreeGetRequest
{
	/** 
	 * 引擎编号
	 **/
	private $engine;
	
	/** 
	 * 订购应用的卖家ID
	 **/
	private $sellerId;
	
	/** 
	 * 用户id
	 **/
	private $userId;
	
	private $apiParas = array();
	
	public function setEngine($engine)
	{
		$this->engine = $engine;
		$this->apiParas["engine"] = $engine;
	}

	public function getEngine()
	{
		return $this->engine;
	}

	public function setSellerId($sellerId)
	{
		$this->sellerId = $sellerId;
		$this->apiParas["seller_id"] = $sellerId;
	}

	public function getSellerId()
	{
		return $this->sellerId;
	}

	public function setUserId($userId)
	{
		$this->userId = $userId;
		$this->apiParas["user_id"] = $userId;
	}

	public function getUserId()
	{
		return $this->userId;
	}

	public function getApiMethodName()
	{
		return "taobao.lz.center.permtree.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->engine,"engine");
		RequestCheckUtil::checkNotNull($this->sellerId,"sellerId");
		RequestCheckUtil::checkNotNull($this->userId,"userId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
