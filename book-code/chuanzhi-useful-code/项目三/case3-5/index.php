<?php
header('Content-Type:text/html;charset=utf-8');
echo 'Web服务器地址：',$_SERVER['HTTP_HOST'],'<br /><br />';
echo '客户端操作系统和浏览器信息：',$_SERVER['HTTP_USER_AGENT'],'<br /><br />';
echo '服务器端IP地址：',$_SERVER['SERVER_ADDR'],'<br /><br />';
echo '客户端IP地址：',$_SERVER['REMOTE_ADDR'];
