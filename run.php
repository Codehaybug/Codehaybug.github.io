<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>TOOL_AUTO_MESSENGER</title>
	<style>
	</style>
</head>

<body>

<?php
if(strpos($_POST["ck"], "captcha_khangtool")){
$cookie = explode("captcha_khangtool",$_POST["ck"])[0];
$user = explode("captcha_khangtool",$_POST["ck"])[1];
$hd = array(
"Cookie:".$cookie,
"Host:mbasic.facebook.com",
"user-agent:".$user,
"sec-fetch-site:same-origin",
"sec-fetch-mode:navigate",
"sec-fetch-user:?1",
"sec-fetch-dest:document",
"upgrade-insecure-requests:1");
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_HTTPHEADER => $hd,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => 'https://mbasic.facebook.com/messages/?ref_component=mbasic_home_header&ref_page=MMessagingThreadlistController&refid=11',
    CURLOPT_SSL_VERIFYPEER => false
));
$resp = curl_exec($curl);
curl_close($curl);
$getinfo = explode("<img",explode('/messages/read/?',$resp)[$_POST["choose"]])[0];
$getidlink = explode("#fua",$getinfo)[0];
$asslink = "/messages/read/?".$getidlink;


$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_HTTPHEADER => $hd,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => "https://mbasic.facebook.com".$asslink,
    CURLOPT_SSL_VERIFYPEER => false
));
$resp = curl_exec($curl);
curl_close($curl);
for($t=1;$t<20;$t++){
$d1 = explode(">",explode('<input type="hidden"',$resp)[$t])[0];
$getd = explode('"',explode('value="',$d1)[1])[0];
if(strpos($d1, "fb_dtsg")){$fb_dtsg=$getd;}
if(strpos($d1, "jazoest")){$jazoest=$getd;}
if(strpos($d1, "tids")){$tids=$getd;}
if(strpos($d1, "wwwupp")){$wwwupp=$getd;}
if(strpos($d1, "ids")){$ids=$getd;}
if(strpos($d1, "cver")){$cver=$getd;}
if(strpos($d1, "csid")){$csid=$getd;break;}
}
$text = $_POST["message"];
$data = "fb_dtsg=".$fb_dtsg."&jazoest=".$jazoest."&body=".$text."&send=Gửi&tids=".$tids."&wwwupp=".$wwwupp."&ids[".$ids."]=".$ids."&referrer=&ctype=&cver=".$cver."&csid=".$csid;

while(true){
sleep($_POST["time"]);
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_HTTPHEADER => $hd,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => "https://mbasic.facebook.com/messages/send/?icm=1&refid=12",
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_SSL_VERIFYPEER => false
));
$resp = curl_exec($curl);
curl_close($curl);
echo "Đã Gửi"."<br>";
}

}else{echo "Nhập Sai R Chế Ơi !";}

?>




</body>








</html>
