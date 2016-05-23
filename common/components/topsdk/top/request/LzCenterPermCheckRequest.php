<?php
/**
 * TOP API: taobao.lz.center.perm.check request
 * 
 * @author auto create
 * @since 1.0, 2016.03.06
 */
class LzCenterPermCheckRequest
{
	/** 
	 * 报表引擎编号
	 **/
	private $engine;
	
	/** 
	 * 权限唯一编码
	 **/
	private $privilegeCode;
	
	/** 
	 * ISV服务的卖家ID(第三方ID)
	 **/
	private $sellerId;
	
	/** 
	 * 用户ID
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

	public function setPrivilegeCode($privilegeCode)
	{
		$this->privilegeCode = $privilegeCode;
		$this->apiParas["privilege_code"] = $privilegeCode;
	}

	public function getPrivilegeCode()
	{
		return $this->privilegeCode;
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
		return "taobao.lz.center.perm.check";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->engine,"engine");
		RequestCheckUtil::checkNotNull($this->privilegeCode,"privilegeCode");
		RequestCheckUtil::checkNotNull($this->sellerId,"sellerId");
		RequestCheckUtil::checkNotNull($this->userId,"userId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
