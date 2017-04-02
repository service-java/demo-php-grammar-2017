<?php
# @Author: 骆金参
# @Date:   2017-04-03T01:35:38+08:00
# @Email:  1095947440@qq.com
# @Filename: many-exception.php
# @Last modified by:   骆金参
# @Last modified time: 2017-04-03T01:35:40+08:00


<?php
class customException extends Exception
{
    public function errorMessage()
    {
        // 错误信息
        $errorMsg = $this->getMessage().' 不是一个合法的 E-Mail 地址。';
        return $errorMsg;
    }
}

$email = "someone@example.com";

try
{
    try
    {
        // 检测 "example" 是否在邮箱地址中
        if(strpos($email, "example") !== FALSE)
        {
            // 如果是个不合法的邮箱地址，抛出异常
            throw new Exception($email);
        }
    }
    catch(Exception $e)
    {
        // 重新抛出异常
        throw new customException($email);
    }
}
catch (customException $e)
{
    // 显示自定义信息
    echo $e->errorMessage();
}
