<?php

$res="\033[0m";
$hitam="\033[0;30m";
$abu2="\033[1;30m";
$putih="\033[0;37m";
$putih2="\033[1;37m";
$red="\033[0;31m";
$red2="\033[1;31m";
$green="\033[0;32m";
$green2="\033[1;32m";
$yellow="\033[0;33m";
$yellow2="\033[1;33m";
$blue="\033[0;34m";
$blue2="\033[1;34m";
$purple="\033[0;35m";
$purple2="\033[1;35m";
$lblue="\033[0;36m";
$lblue2="\033[1;36m";

system('clear');
echo "$lblue2 Instance : $putih"; $instance=trim(fgets(STDIN));
echo "$lblue2 Token : $putih"; $token=trim(fgets(STDIN));
echo "$lblue2 Pesan : $putih"; $pesan=trim(fgets(STDIN));
echo "$lblue2 No Tujuan : $putih"; $noTujuan=trim(fgets(STDIN));

// 10142007
//c2jqswj0sdcdf2xm

function post($url,$data){
	$ch = curl_init();
	
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POST,1);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	
	$result = curl_exec($ch);
    curl_close($ch);
    
	return $result;
}

function sendMsg($instance,$token,$pesan,$noTujuan) {
    $url='https://api.chat-api.com/instance'.$instance.'/sendMessage?token='.$token;
    $data=[
        'body' => $pesan,
        'phone' => $noTujuan
    ];

    return post($url,$data);
}

echo "Jumlah Pesan : "; $i=trim(fgets(STDIN));
$i=intval($i);

system('clear');
for ($i; $i>0; $i--) {

    $send = sendMsg($instance,$token,$pesan,$noTujuan);
    $send = json_decode($send);
    
    echo "$red2 Message : $green2".$send->message."\n";

}


?>