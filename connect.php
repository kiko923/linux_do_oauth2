<?php
/**
 * Linuxdo登录SDK
 * 1.0
 * https://linux.do/u/kiko923/
**/

error_reporting(0);
session_start();
@header('Content-Type: text/html; charset=UTF-8');
include('config.php');

if($ClientId==''){
    die('请先在config.php中填入密钥');
}
// 官方Oauth接口
$Oauth_url = 'https://connect.linux.do/oauth2/authorize?response_type=code&client_id='.$ClientId;

// 跳转到 Oauth_url
header("Location: $Oauth_url");
exit();
