<?php
# @Author: 骆金参
# @Date:   2017-04-03T01:15:58+08:00
# @Email:  1095947440@qq.com
# @Filename: email-simple.php
# @Last modified by:   骆金参
# @Last modified time: 2017-04-03T01:22:48+08:00

header('Content-Type:text/html;charset=utf-8');

$to = "1095847440@qq.com";         // 邮件接收者
$subject = "参数邮件";                // 邮件标题
$message = "Hello! 这是邮件的内容。";  // 邮件正文
$from = "luo0412@qmen.space";   // 邮件发送者
$headers = "From:" . $from;         // 头部信息设置
mail($to,$subject,$message,$headers);
echo "邮件已发送";
?>
