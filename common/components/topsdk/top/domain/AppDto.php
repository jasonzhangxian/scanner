<?php

/**
 * 应用信息
 * @author auto create
 */
class AppDto
{
	
	/** 
	 * 应用文件名
	 **/
	public $app_file_name;
	
	/** 
	 * 应用唯一Id
	 **/
	public $app_id;
	
	/** 
	 * 应用名
	 **/
	public $app_name;
	
	/** 
	 * 安装包下载地址
	 **/
	public $app_path;
	
	/** 
	 * 应用大小
	 **/
	public $app_size;
	
	/** 
	 * 附件列表
	 **/
	public $attachments;
	
	/** 
	 * 所属小类
	 **/
	public $child_type;
	
	/** 
	 * 应用压缩包大小（字节）
	 **/
	public $compre_size;
	
	/** 
	 * 应用解压缩包大小（字节）
	 **/
	public $decompre_size;
	
	/** 
	 * 图标地址
	 **/
	public $icon;
	
	/** 
	 * 是否有增量包（0：无增量包；1：有增量包），默认为0
	 **/
	public $incre_packet;
	
	/** 
	 * 增量包列表
	 **/
	public $incre_packet_list;
	
	/** 
	 * 应用描述
	 **/
	public $introduction;
	
	/** 
	 * MD5码
	 **/
	public $md5;
	
	/** 
	 * 包名
	 **/
	public $package_name;
	
	/** 
	 * 价格
	 **/
	public $price;
	
	/** 
	 * 提供商
	 **/
	public $provider;
	
	/** 
	 * 时间戳
	 **/
	public $publish_date;
	
	/** 
	 * 应用系统语言
	 **/
	public $system_language;
	
	/** 
	 * 安装环境OS系统最低版本
	 **/
	public $system_version;
	
	/** 
	 * 所属大类
	 **/
	public $type;
	
	/** 
	 * 更新内容
	 **/
	public $update_content;
	
	/** 
	 * 更新策略（0：不强制，1：强制更新），默认为0
	 **/
	public $upgrade_strategy;
	
	/** 
	 * 版本
	 **/
	public $version;
	
	/** 
	 * 版本号
	 **/
	public $version_no;	
}
?>