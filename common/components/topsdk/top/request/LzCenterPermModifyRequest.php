<?php
/**
 * TOP API: taobao.lz.center.perm.modify request
 * 
 * @author auto create
 * @since 1.0, 2014.05.22
 */
class LzCenterPermModifyRequest
{
	/** 
	 * 引擎名称
	 **/
	private $appEngine;
	
	/** 
	 * 排序字段
	 **/
	private $orderBy;
	
	/** 
	 * privilege_code
	 **/
	private $privilegeCode;
	
	/** 
	 * privilege_name
	 **/
	private $privilegeName;
	
	/** 
	 * 1-前台功能; 2-后端功能
	 **/
	private $privilegeType;
	
	/** 
	 * privilege_url
	 **/
	private $privilegeUrl;
	
	/** 
	 * 订购应用的卖家ID
	 **/
	private $sellerId;
	
	private $apiParas = array();
	
	public function setAppEngine($appEngine)
	{
		$this->appEngine = $appEngine;
		$this->apiParas["app_engine"] = $appEngine;
	}

	public function getAppEngine()
	{
		return $this->appEngine;
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

	public function setPrivilegeCode($privilegeCode)
	{
		$this->privilegeCode = $privilegeCode;
		$this->apiParas["privilege_code"] = $privilegeCode;
	}

	public function getPrivilegeCode()
	{
		return $this->privilegeCode;
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

	public function getApiMethodName()
	{
		return "taobao.lz.center.perm.modify";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->appEngine,"appEngine");
		RequestCheckUtil::checkNotNull($this->orderBy,"orderBy");
		RequestCheckUtil::checkNotNull($this->privilegeCode,"privilegeCode");
		RequestCheckUtil::checkNotNull($this->privilegeName,"privilegeName");
		RequestCheckUtil::checkNotNull($this->privilegeType,"privilegeType");
		RequestCheckUtil::checkNotNull($this->privilegeUrl,"privilegeUrl");
		RequestCheckUtil::checkNotNull($this->sellerId,"sellerId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
