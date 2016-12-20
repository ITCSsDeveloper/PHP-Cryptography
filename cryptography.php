<?php 
/* 
   PHP Cryptography by ITCS's Developer 
   Release At 8:36 PM 12/20/2016

   How To Use
   include('cryptography.php');
  
   $encrypt = Encrypt("Some words", "SecretKey");
   $decrypt = Decrypt("Encrypt words", "SecretKey");
*/

function GenHashTable($secretKey)
{
	$hastTable =array();
	for ($i=0; $i <= 255 ; $i++) { 
		array_push($hastTable,array('key'=>$i, 'code'=>  substr(md5($i.$secretKey),0,6) ));
	}
	return $hastTable;
}

function Decrypt($word, $secretKey)
{
	$_deWord = '';
	if($word)
	{
		$word = str_split($word,6);
		$hastTable = GenHashTable($secretKey);
		foreach ($word as $key => $code) {

			$found = false;
			foreach ($hastTable as $key => $codeTable) {
				if($code == $codeTable['code'])
				{
					$_deWord .= chr($codeTable['key']);
					$found = true;
				}
			}

			if(!$found)
			{
				$_deWord .= '#';
			}
		}
	}
	return $_deWord;
}

function Encrypt($word, $secretKey)
{
	$_enWord = '';
	if($word)
	{
		$word = str_split($word);
		foreach ($word as $key => $char) {
			$_enWord .= substr(md5(ord($char) . $secretKey),0,6);
		}
	}
	return $_enWord;
}
?>