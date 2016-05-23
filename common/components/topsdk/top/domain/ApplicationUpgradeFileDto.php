<?php

/**
 * 应用更新增量包文件
 * @author auto create
 */
class ApplicationUpgradeFileDto
{
	
	/** 
	 * 应用Id
	 **/
	public $application_id;
	
	/** 
	 * 增量包依赖的应用版本号
	 **/
	public $base_by_version;
	
	/** 
	 * 压缩包大小（字节）
	 **/
	public $compre_size;
	
	/** 
	 * 上传时间
	 **/
	public $create_date;
	
	/** 
	 * 解压缩文件大小（字节）
	 **/
	public $decompre_size;
	
	/** 
	 * 文件名
	 **/
	public $file_name;
	
	/** 
	 * 增量包唯一Id
	 **/
	public $id;
	
	/** 
	 * MD5码
	 **/
	public $md5;
	
	/** 
	 * 下载地址
	 **/
	public $path;
	
	/** 
	 * 更新策略（0：不强制，1：强制更新），默认为0
	 **/
	public $upgrade_strategy;	
}
?>