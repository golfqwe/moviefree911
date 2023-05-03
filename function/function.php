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



function curl($url){

  $curl = curl_init();
  $ref=explode("/",$url);
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Referer: https://'.$ref[2]
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  return base64_encode($response);

  } 
?>