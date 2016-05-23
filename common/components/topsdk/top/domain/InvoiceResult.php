<?php

/**
 * 发票返回数据对象
 * @author auto create
 */
class InvoiceResult
{
	
	/** 
	 * 防伪码
	 **/
	public $anti_fake_code;
	
	/** 
	 * 错误编码
	 **/
	public $biz_error_code;
	
	/** 
	 * 错误信息
	 **/
	public $biz_error_msg;
	
	/** 
	 * 发票密文，密码区的字符串
	 **/
	public $ciphertext;
	
	/** 
	 * 税控设备编号(新版电子发票有)
	 **/
	public $device_no;
	
	/** 
	 * erp自定义单据号
	 **/
	public $erp_tid;
	
	/** 
	 * 文件类型(pdf,jpg,png)
	 **/
	public $file_data_type;
	
	/** 
	 * 发票PDF的下载地址(仅在单个查询接口上显示，批量查询不显示)
	 **/
	public $file_path;
	
	/** 
	 * 开票金额
	 **/
	public $invoice_amount;
	
	/** 
	 * 发票代码
	 **/
	public $invoice_code;
	
	/** 
	 * 开票日期
	 **/
	public $invoice_date;
	
	/** 
	 * 发票号码
	 **/
	public $invoice_no;
	
	/** 
	 * 收款方税务登记证号
	 **/
	public $payee_register_no;
	
	/** 
	 * 电商平台代码。淘宝：taobao，天猫：tmall
	 **/
	public $platform_code;
	
	/** 
	 * 电商平台订单号
	 **/
	public $platform_tid;
	
	/** 
	 * 二维码
	 **/
	public $qr_code;
	
	/** 
	 * 开票流水号，唯一标志开票请求。如果两次请求流水号相同，则表示重复请求。
	 **/
	public $serial_no;
	
	/** 
	 * 开票状态 (waiting = 开票中) 、(create_success = 开票成功)、(create_failed = 开票失败)
	 **/
	public $status;	
}
?>