<?php
/**
 * Linuxdo登录SDK
 * 1.0
 * https://linux.do/u/kiko923/
**/
session_start(); // 启动 session
@header('Content-Type: text/html; charset=UTF-8');
include('config.php');

$code = $_GET['code'];

$key = base64_encode($ClientId.':'.$ClientSecret);

$header = [
    'Authorization: Basic '.$key
];

$post = http_build_query([
    'grant_type' => 'authorization_code',
    'code' => $code,
    'redirect_uri' => ''
]);

$getTokenRes = get_curl('https://connect.linux.do/oauth2/token', $post, 0, 0, $header);

$getTokenArr = json_decode($getTokenRes, true);

if (isset($getTokenArr['access_token'])) {
    $access_token = $getTokenArr['access_token'];
    
    $header = [
        'Authorization: Bearer '.$access_token
    ];

    $getUserRes = get_curl('https://connect.linux.do/api/user', 0, 0, 0, $header);
    
    $getUserArr = json_decode($getUserRes, true);
    
    if (isset($getUserArr['id'])) {
        // 保存每个用户数据项到 session 中
        $_SESSION['user_id'] = $getUserArr['id'];
        $_SESSION['user_sub'] = $getUserArr['sub'];
        $_SESSION['user_username'] = $getUserArr['username'];
        $_SESSION['user_login'] = $getUserArr['login'];
        $_SESSION['user_name'] = $getUserArr['name'];
        $_SESSION['user_email'] = $getUserArr['email'];
        $_SESSION['user_avatar_template'] = $getUserArr['avatar_template'];
        $_SESSION['user_avatar_url'] = $getUserArr['avatar_url'];
        $_SESSION['user_active'] = $getUserArr['active'];
        $_SESSION['user_trust_level'] = $getUserArr['trust_level'];
        $_SESSION['user_silenced'] = $getUserArr['silenced'];
        $_SESSION['user_external_ids'] = $getUserArr['external_ids'] ?? 'null';
        $_SESSION['user_api_key'] = $getUserArr['api_key'];
    }
    exit("<script language='javascript'>window.location.href='./';</script>");
    //echo json_encode($getUserArr);
} else {
    echo json_encode($getTokenArr);
}

// cURL 函数
function get_curl($url, $post=0, $referer=0, $cookie=0, $header=0, $ua=0, $nobaody=0, $addheader=0)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    $httpheader[] = "Accept: */*";
    $httpheader[] = "Accept-Encoding: gzip,deflate,sdch";
    $httpheader[] = "Accept-Language: zh-CN,zh;q=0.8";
    $httpheader[] = "Connection: close";
    if ($header) {
        $httpheader = array_merge($httpheader, $header);
    }
    curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
    if ($post) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    if ($header) {
        curl_setopt($ch, CURLOPT_HEADER, false);
    }
    if ($cookie) {
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    }
    if ($referer) {
        if ($referer == 1) {
            curl_setopt($ch, CURLOPT_REFERER, '');
        } else {
            curl_setopt($ch, CURLOPT_REFERER, $referer);
        }
    }
    if ($ua) {
        curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    } else {
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36");
    }
    if ($nobaody) {
        curl_setopt($ch, CURLOPT_NOBODY, 1);
    }
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $ret = curl_exec($ch);
    curl_close($ch);
    return $ret;
}
