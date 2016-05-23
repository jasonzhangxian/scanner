<?php
/**
 * TOP API: taobao.lz.center.perm.register request
 * 
 * @author auto create
 * @since 1.0, 2016.03.06
 */
class LzCenterPermRegisterRequest
{
	/** 
	 * 报表引擎的描述字段
	 **/
	private $engine;
	
	/** 
	 * 排序字段，由引擎方设定
	 **/
	private $orderBy;
	
	/** 
	 * 报表创建者的用户id
	 **/
	private $ownerUserId;
	
	/** 
	 * 父功能编码
	 **/
	private $parentPrivilegeCode;
	
	/** 
	 * 功能点唯一编码
	 **/
	private $privilegeCode;
	
	/** 
	 * 1 引擎功能
2 solution功能
3 私有报表
	 **/
	private $privilegeLevel;
	
	/** 
	 * 名称
	 **/
	private $privilegeName;
	
	/** 
	 * 1 前台功能
2 后台功能
	 **/
	private $privilegeType;
	
	/** 
	 * 功能url
	 **/
	private $privilegeUrl;
	
	/** 
	 * 订购应用的卖家ID
	 **/
	private $sellerId;
	
	/** 
	 * 功能所属的solution对应的app key
如果是私有报表，app_key 为报表引擎自身的app_key
	 **/
	private $solutionAppKey;
	
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

	public function setOrderBy($orderBy)
	{
		$this->orderBy = $orderBy;
		$this->apiParas["order_by"] = $orderBy;
	}

	public function getOrderBy()
	{
		return $this->orderBy;
	}

	public function setOwnerUserId($ownerUserId)
	{
		$this->ownerUserId = $ownerUserId;
		$this->apiParas["owner_user_id"] = $ownerUserId;
	}

	public function getOwnerUserId()
	{
		return $this->ownerUserId;
	}

	public function setParentPrivilegeCode($parentPrivilegeCode)
	{
		$this->parentPrivilegeCode = $parentPrivilegeCode;
		$this->apiParas["parent_privilege_code"] = $parentPrivilegeCode;
	}

	public function getParentPrivilegeCode()
	{
		return $this->parentPrivilegeCode;
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

	public function setPrivilegeLevel($privilegeLevel)
	{
		$this->privilegeLevel = $privilegeLevel;
		$this->apiParas["privilege_level"] = $privilegeLevel;
	}

	public function getPrivilegeLevel()
	{
		return $this->privilegeLevel;
	}

	public function setPrivilegeName($privilegeName)
	{
		$this->privilegeName = $privilegeName;
		$this->apiParas["privilege_name"] = $privilegeName;
	}

	public function getPrivilegeName()
	{
		return $this->privilegeName;
	}

	public function setPrivilegeType($privilegeType)
	{
		$this->privilegeType = $privilegeType;
		$this->apiParas["privilege_type"] = $privilegeType;
	}

	public function getPrivilegeType()
	{
		return $this->privilegeType;
	}

	public function setPrivilegeUrl($privilegeUrl)
	{
		$this->privilegeUrl = $privilegeUrl;
		$this->apiParas["privilege_url"] = $privilegeUrl;
	}

	public function getPrivilegeUrl()
	{
		return $this->privilegeUrl;
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

	public function setSolutionAppKey($solutionAppKey)
	{
		$this->solutionAppKey = $solutionAppKey;
		$this->apiParas["solution_app_key"] = $solutionAppKey;
	}

	public function getSolutionAppKey()
	{
		return $this->solutionAppKey;
	}

	public function getApiMethodName()
	{
		return "taobao.lz.center.perm.register";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->engine,"engine");
		RequestCheckUtil::checkNotNull($this->parentPrivilegeCode,"parentPrivilegeCode");
		RequestCheckUtil::checkNotNull($this->privilegeCode,"privilegeCode");
		RequestCheckUtil::checkNotNull($this->privilegeLevel,"privilegeLevel");
		RequestCheckUtil::checkNotNull($this->privilegeName,"privilegeName");
		RequestCheckUtil::checkNotNull($this->privilegeType,"privilegeType");
		RequestCheckUtil::checkNotNull($this->sellerId,"sellerId");
		RequestCheckUtil::checkNotNull($this->solutionAppKey,"solutionAppKey");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
