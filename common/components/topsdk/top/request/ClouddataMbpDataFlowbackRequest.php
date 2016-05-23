<?php
/**
 * TOP API: taobao.clouddata.mbp.data.flowback request
 * 
 * @author auto create
 * @since 1.0, 2016.03.04
 */
class ClouddataMbpDataFlowbackRequest
{
	/** 
	 * 一、上传单行数据：
1)	形式为column1=value1,column2=value2,...的字符串，列名称只能包含字母数字和下划线，Value如果包含=(半角等号),(半角逗号)\(反斜杠)必须用\转义，没有参数则不选 
2)	若想自行指定数据的日期，请在这个字段里追加上"dt=yyyymmdd"字段，如dt=20140605 
二、上传多行数据:
1)	形式为:upload-multi-line;column1,column2,column3,dt;11,12,13,20140726;21,,23,20140727;31,,33,20140728...的字符串 
2)	每行数据之间使用;(半角分号)隔开
3)	第一行固定是upload-multi-line，标识是多行上传模式
4)	第二行是上传的数据的列名，列名之间使用,（半角逗号）分隔，列名只能是数字、字母和下划线，并且只能以字母开头，列名不能为空
5)	第三列开始是上传的数据，数据都使用,(半角逗号) 分隔，数据顺序与对应列名顺序一致，数据可以为空，但是逗号不能省略，数据中如果包含;(半角分号),(半角逗号)\(反斜杠)必须用\转义
6)	若想自行指定数据的日期，请在列名中加上dt，并在数据列对应位置加上yyyymmdd格式的数据，如20140605，不允许为空，格式必须正确
7)	假如字段类型是boolean，数据请使用0或1，不支持true或者false
8)	由于接口会有超时限制，建议单次上传的数据量不要超过15,000字节
	 **/
	private $data;
	
	/** 
	 * MBP查询表名
	 **/
	private $tableName;
	
	private $apiParas = array();
	
	public function setData($data)
	{
		$this->data = $data;
		$this->apiParas["data"] = $data;
	}

	public function getData()
	{
		return $this->data;
	}

	public function setTableName($tableName)
	{
		$this->tableName = $tableName;
		$this->apiParas["table_name"] = $tableName;
	}

	public function getTableName()
	{
		return $this->tableName;
	}

	public function getApiMethodName()
	{
		return "taobao.clouddata.mbp.data.flowback";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->data,"data");
		RequestCheckUtil::checkNotNull($this->tableName,"tableName");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
