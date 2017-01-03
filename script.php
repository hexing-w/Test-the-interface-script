<?php  
header("Content-type:application/json;charset=utf-8");  
$url="http://192.168.32.159/attack";  
$redisCluster = new \Redis();
$redisCluster->connect("192.168.32.159", "19000");
$uid = $redisCluster->smembers("uid");

foreach ($uid as $key => $value) 
{
	if($key==101)
	{

	$param=array(  
    "attack"=>"100089888",  
    "code"=>"60001", 
    "uid"=>$value,
    "building"=>"130011"
	);  
	$data = json_encode($param);
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_POST, 1);  
	curl_setopt($ch, CURLOPT_URL, $url);  
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  
	echo $data;
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(  
	    "Content-Type: application/json; charset=utf-8",  
	    "Content-Length: " . strlen($data))  
	);  
	$exe = curl_exec($ch);
	curl_close($ch);
	break;
}

}
	
