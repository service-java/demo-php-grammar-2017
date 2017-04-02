<?php
# @Author: 骆金参
# @Date:   2017-04-03T01:10:42+08:00
# @Email:  1095947440@qq.com
# @Filename: mail-basic.php
# @Last modified by:   骆金参
# @Last modified time: 2017-04-03T01:12:03+08:00


$to = "17816869505@163.com";
$subject = "HTML email";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-版本： 1.0" . "rn";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "rn";

// More headers
$headers .= 'From: <1095847440@qq.com>' . "rn";
$headers .= 'Cc: 17816869505@163.com' . "rn";

mail($to,$subject,$message,$headers);
