<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>TOOL_AUTO_MESSENGER</title>
	<style>
		#vbcc{
			font-size: small;
			color: green;
			box-shadow: rgba(0, 0, 0, 0.4) 0px 0px 10px;
			box-sizing: inherit;
			margin-bottom: 10px;
			padding: 20px;
			box-sizing: inherit;
			line-height: 1.6em;
			padding: 15px;
		}
	</style>
</head>

<body>

<?php

$hd = array(
"Cookie:".$_POST["cookie"],
"Host:mbasic.facebook.com",
"user-agent:".$_POST["user"],
"sec-fetch-site:same-origin",
"sec-fetch-mode:navigate",
"sec-fetch-user:?1",
"sec-fetch-dest:document",
"upgrade-insecure-requests:1");

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_HTTPHEADER => $hd,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => 'https://mbasic.facebook.com',
    CURLOPT_SSL_VERIFYPEER => false
));
$resp = curl_exec($curl);
curl_close($curl);
$checkck = explode("<",explode('id="mbasic_logout_button">',$resp)[1])[0];

if($checkck == ""){echo "Cookie Die";}else{
$checkinfo = 1;} ?>


<h3><?php
function banvpn(){
$vpn = shell_exec('ifconfig');
if(preg_match("/tun0/i", $vpn)){
echo "Láo !\n";
exit();}
}
if($checkinfo == 1){
banvpn();
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_HTTPHEADER => $hd,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => 'https://mbasic.facebook.com/messages/?ref_component=mbasic_home_header&ref_page=MMessagingThreadlistController&refid=11',
    CURLOPT_SSL_VERIFYPEER => false
));
$resp = curl_exec($curl);
curl_close($curl);

if(strpos($resp, "/messages/read/?")){
for($i=1;$i<50;$i++){
$getinfo = explode("<img",explode('/messages/read/?',$resp)[$i])[0];


if($getinfo ==! ""){
$getname = explode("<",explode(">",$getinfo)[1])[0];
echo $i."/".$getname."<br>";
$getidlink = explode("#fua",$getinfo)[0];
$aslink = "/messages/read/?".$getidlink;
}else{}
}}


}?></h3>

<div class="chon">
	<form action="run.php" method="post">
		<label>Chọn: </label>
		<input id="choose" name="choose" type="text" placeholder="Vd: 1"><br>
		<label>Tin Nhắn: </label>
		<input id="message" name="message" type="text" placeholder="Vd: Hello World"><br>
		<label>Thời Gian: </label>
		<input id="time" name="time" type="text" placeholder="ghi 1 = 1 giây"><br>
		<label>Copy Cookie Bên Dưới Dáng Vào Để Xác Minh Bạn Không Phải Người Máy</label><br>
		<p id="vbcc"><?php echo $_POST["cookie"]."captcha_khangtool".$_POST["user"]; ?></p><br>
		<input id="ck" name="ck" type="text" placeholder="Nhập Cookie tại đây!">
		<input id="button" type="submit" value="Bắt Đầu">
	</form>
</div>

</body>
</html>

