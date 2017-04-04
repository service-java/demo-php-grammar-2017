<?php
# @Author: 骆金参
# @Date:   2017-03-19T17:54:26+08:00
# @Email:  1095947440@qq.com
# @Filename: regex-basic.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-19T18:38:06+08:00

class FormCheck
{
  const name_regex = "/^[a-zA-Z ]*$/";
  const email_regex = "/([\w\-]+\@[\w\-]+\.[\w\-]+)/";
  const url_regex = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";

  // public function __construct() {
  //   $this->$name_regex = "/^[a-zA-Z ]*$/";
  //   $this->$email_regex = "/([\w\-]+\@[\w\-]+\.[\w\-]+)/";
  //   $this->$url_regex = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
  // }

  public function pre($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
  }

  public function match_name($data) {
    return preg_match(self::name_regex, $this->pre($data));
  }

  public function match_email($data) {
    return preg_match(self::email_regex, $this->pre($data));
  }

  public function match_url($data) {
    return preg_match(self::url_regex, $this->pre($data));
  }

}


$regex = new FormCheck();
$email = "109@as.com";
$name = "骆哥哥"; // 只需英文数字
$url = "ftp://www.baidu.c";

echo $regex->match_email($email), PHP_EOL; // 1
echo $regex->match_name($name), PHP_EOL; // 0
echo $regex->match_url($url), PHP_EOL; // 1
