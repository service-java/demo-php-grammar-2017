<?php
header('Content-Type:text/html;charset=utf-8');
interface I_payment {
	public function send() ;//发送支付请求的方法
	public function respon() ;//处理支付响应的方法
}
//某种支付方法
class alipay implements I_payment {
	public function send() {
	}
	public function respon() {
	}
}
//其他支付方法
class otherPay implements I_payment {
	public function send() {
	}
	public function respon() {
	}
} 