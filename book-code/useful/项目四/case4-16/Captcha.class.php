<?php
//验证码类
class Captcha{
	private $name = 'captcha';								//验证码在SESSION中保存的名字
	private $len = 5;										//验证码位数
	private $charset = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';	//随机因子
	//生成验证码图像
	public function create(){
		//----------1、创建画布
		$im = imagecreate($x=250,$y=62);//创建画布
		//随机生成背景颜色
		$bg = imagecolorallocate($im,rand(50,200),rand(0,155),rand(0,155));
		//----------2、生成验证码文本
		$captcha = $this->_createCode();
		isset($_SESSION) || session_start();  //开启session会话
		$_SESSION[$this->name] = $captcha;	  //将验证码存放到会话中
		//----------3、绘制验证码
		$fontColor = imagecolorallocate($im,255,255,255);   //设置字体颜色
		$fontstyle = 'C:\Windows\Fonts\simsunb.ttf';   //设置字体（需要字体文件）
		//生成指定长度的验证码
		for($i=0; $i<$this->len; $i++ ){ 
		  imagettftext(
			  $im,						//画布资源
			  30, 						//字符大小
			  rand(0,20) - rand(0,25),  //随机设置字符倾斜角度
			  32 + $i*40, rand(30,50),  //随机设置字符坐标
			  $fontColor, 				//字符颜色
			  $fontstyle, 				//字符样式
			  $captcha[$i] 			//字符内容
		  );
		}
		//----------4、添加干扰元素
		for($i=0; $i<8; ++$i){//添加8个干扰线
			//随机生成干扰线颜色
			$lineColor = imagecolorallocate($im,rand(0,255),
			rand(0,255),rand(0,255));
			//随机生成干扰线
			imageline($im,rand(0,$x),0,rand(0,$x),$y,$lineColor);
		} 
		for($i=0; $i<250; ++$i) {//添加250个噪点
			//随机生成噪点位置
			imagesetpixel($im,rand(0,$x),rand(0,$y),$fontColor);
		}
		//----------5、输出图像
		header('Content-type:image/png');	//设置发送的信息头内容
		imagepng($im);						//输出图片
		imagedestroy($im);					//释放图片所占内存
	}
	//生成随机码
	private function _createCode() { 
		$code = '';                             //保存生成的验证码
		$_len = strlen($this->charset)-1;       //计算验证码字符集合索引长度
		for($i=0; $i<$this->len; ++$i){
			$code .= $this->charset[mt_rand(0,$_len)]; //通过索引取出字符
		}
		return $code;   //返回随机生成的验证码
	}
	//对验证码进行验证
	public function verify($input){ 
		if(!empty($_SESSION[$this->name])){
			$captcha = $_SESSION[$this->name];
			unset($_SESSION[$this->name]); //清除验证码，防止重复验证
			return strtoupper($captcha) == strtoupper($input); //不区分大小写
		}
		return false;
	}
}