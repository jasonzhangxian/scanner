<?php

/**
 * 用户功能点数据
 * @author auto create
 */
class Privilege
{
	
	/** 
	 * 开放平台的app_key
	 **/
	public $app_key;
	
	/** 
	 * 排序数字
	 **/
	public $order_by;
	
	/** 
	 * 创建者ID
	 **/
	public $owner_user_id;
	
	/** 
	 * 父功能编号
	 **/
	public $parent_privilege_code;
	
	/** 
	 * 功能编码
	 **/
	public $privilege_code;
	
	/** 
	 * 权限级别
1 基础功能
2 solution功能
3 私有报表
	 **/
	public $privilege_level;
	
	/** 
	 * 功能点名称
	 **/
	public $privilege_name;
	
	/** 
	 * 1-前台功能，2-后端功能
	 **/
	public $privilege_type;
	
	/** 
	 * 功能URL
	 **/
	public $privilege_url;
	
	/** 
	 * 卖家ID
	 **/
	public $seller_id;	
}
?>