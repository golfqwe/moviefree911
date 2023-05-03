<?
function func($detail)  
	{
		$detail=str_replace(chr(13), "<br>", $detail);
		$detail=str_replace(" ", "&nbsp;", $detail); 
		return $detail;
	}

function rewrite($url)  
	{
		$url=str_replace(" ", "-", $url);
		return $url;
	}
?>