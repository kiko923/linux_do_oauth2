# linux_do_oauth2
Linux.do Oauth2.0 PHP语言SDK
DEMO地址：[https://api.98.do/linuxdo/oauth2/](https://api.98.do/linuxdo/oauth2/)
可以试试效果

**如何部署？**
教程开始
1. 进入[https://connect.linux.do/dash/sso](https://connect.linux.do/dash/sso) 选择***申请新接入**
2. 填写对应资料![cd68f4dbc3afe4c034e646daf8e0bbb|690x461](upload://fBWCNPpiKuoyElmO45gkSgB4lOs.png)
3. 下载SDK压缩包 [oauth2.tar.gz|attachment](upload://1m6EQFbhw3mFZ7UEWKNmasv5ksK.gz) (2.4 KB)
4. 在[https://connect.linux.do/dash/sso](https://connect.linux.do/dash/sso)获取`ClientId`和`ClientSecret`
![399428d9bb818068536f4767bfb94c8|603x151](upload://9K1RKxTdJuqGbX7Gwc3VsAxOPzi.png)
5. 在`config.php`参数文件中修改`ClientId`和`ClientSecret`
![3c7e6ab47c4ae42187a031266665ad7|635x218](upload://sYys1ZNMNBCEOCi2kY3sutrvSP1.png)

6. 第2步的`回调地址`填写`https://域名/return.php`![abd36ae742b4d05732a677f9e1d5a5c|690x302](upload://ohp1x3laxab4Wd14gySEP4WT3Q3.png)
7. 访问域名即可 返回的参数可以在`return.php`中查看 本程序只做demo使用 其他功能请自行二开
