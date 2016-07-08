<?php

namespace common\extensions;

use Yii;

class WordSeparator
{
    const KW_SEPARATOR = ",";
    
    private $dictionary = "";
    
    private static $instance;
    
    function __construct()
    {
		mb_internal_encoding("UTF-8");
    }

    public static function getInstance()
    {
        if(!(self::$instance instanceof self))
		{
			self::$instance = new self;
		}
		return self::$instance;
    }
    
	public function initKeyWordsAsArr($kwArr)
	{
		$this->dictionary = implode(self::KW_SEPARATOR,$kwArr);
	}
	
	public function initKeyWords($kws)
	{
		$this->dictionary = $kws;
	}
	
    public function addKeyWord($kw)
	{
		$kw = self::replaceKWS($kw);
		$this->dictionary .= $kw . self::KW_SEPARATOR;
	}
	
	private function replaceKWS($src)
	{
		while(strpos($src,self::KW_SEPARATOR)!=false)
		{
            $src = str_replace(self::KW_SEPARATOR,"",$src);
		}
		
		return $src;
	}
    
    public function seperate($words,$maxWordLen)
	{
		$words = self::replaceKWS($words);
		$mmRes = self::seperateMM($words,$maxWordLen);	
		$rmmRes = self::seperateRMM($words,$maxWordLen);
		$resStr = $mmRes . $rmmRes;
	    $resLen = mb_strlen($resStr);
        $lastChar = mb_substr($resStr,$resLen - 1,1);
	
		if($resLen > 0 && strcmp($lastChar,"#") == 0)
		{
			$resStr = mb_substr($resStr,0,$resLen - 1);
		}
		else if($resLen == 0)
		{
			return "";
		}
		
        $resArr = explode("#",$resStr);
		$resArr = array_unique($resArr);
		$finalRes= implode("#",$resArr);
		
		return $finalRes;
	}
    
    /*
     *逆向拆分，把字符串以 maxWordLen为最大分词大小，从后往前数指针头，然后截断字符串，每次截断的长度为maxWordLen的两倍，截断出来的字符串，进行分词扫描（wordSpRMM），
     *每扫描一次，去掉字符串最后一位，直到找到或找不到词库的关键词为止。指针再往前移动一位，再进行下一次截断分词，直到指针为字符串的第一位为止。
     *例如： AABBCCDDEEFF， maxWordLen是2，阶段过程如下:
     *  第一次： EEFF
     *         扫描1：  EEFF
     *         扫描2：  EEF
     *         扫描3：  EE
     *  第二次： DEEF
     *          ...
    */
    public function seperateRMM($words,$maxWordLen) 
	{
		$words = self::replaceKWS($words);
		$result = "";
		$counter = 0;
		$maxLen = $maxWordLen;
		$srcLen = mb_strlen($words);
		while($counter != $srcLen)
		{
			$endIdx = $srcLen - $counter;
			$startIdx = $endIdx - $maxLen;
			if($startIdx < 0)
			{
				$startIdx = 0;
			}
			$str = self::wordSpRMM(mb_substr($words,$startIdx,$maxLen));
			if(strpos($str,"#") != -1)
			{
				$result .= $str;
			}
			
			$counter++;
		}
		
		return $result;
	}
	
	private function wordSpRMM($word)
	{
		if(strpos($this->dictionary,self::KW_SEPARATOR . $word . self::KW_SEPARATOR) == false)
		{
			if(mb_strlen($word) > 1)
			{
				return self::wordSpRMM(mb_substr($word,1,mb_strlen($word)-1));//递归逆向拆分，不断缩减字符串大小进行拆分
			}
			else
			{
				return "";
			}
		}
		else
		{
			return $word . "#";
		}
		
	}	
	
	
	 /*
     *正向拆分，把字符串以 maxWordLen为最大分词大小，从前往后数指针头，然后截断字符串，每次截断的长度为maxWordLen的两倍，截断出来的字符串，进行分词扫描（wordSpMM），
     *每扫描一次，去掉字符串最后一位，直到找到或找不到词库的关键词为止。指针再往后移动一位，再进行下一次截断分词，直到指针为字符串的最后一位减去字长为止。
     *例如： AABBCCDDEEFF， maxWordLen是2，阶段过程如下:
     *  第一次： AABB
     *         扫描1：  AABB
     *         扫描2：  AAB
     *         扫描3：  AA
     *  第二次： ABBC
     *          ...
    */
	public function seperateMM($words,$maxWordLen)
	{
		$words = self::replaceKWS($words);
		$result = "";
		$counter = 0;
		$maxLen = $maxWordLen;
		$srcLen = mb_strlen($words);
		while($counter != $srcLen)
		{
			$endIdx = $counter + $maxLen;
			if($endIdx >= $srcLen)
			{
				$endIdx = $srcLen - 1;
			}
			$str = self::wordSpMM(mb_substr($words,$counter,$maxLen));
			if(strpos($str,"#") != -1)
			{
				$result .= $str;
			}
			
			$counter++;
		}
		
		return $result;
	}
	
	private function wordSpMM($word)
	{
		if(strpos($this->dictionary,self::KW_SEPARATOR . $word . self::KW_SEPARATOR) == false)
		{
			if(mb_strlen($word) > 1)
			{
				return self::wordSpMM(mb_substr($word,0,mb_strlen($word)-1));//递归正向向拆分，不断缩减字符串大小进行拆分
			}
			else
			{
				return "";
			}
		}
		else
		{
			return $word . "#";
		}
		
	}	
}


?>