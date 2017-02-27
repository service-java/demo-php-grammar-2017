<?php
//获取文件后缀
$path = 'C:\images\apple.jpg';
$ext = getFileExt($path);

function getFileExt($path) {
    $ext = substr($path, strrpos($path, '.') + 1); // 偏移量
    return $ext;
}

echo "文件路径：$path" ."\n" . "文件后缀：$ext" ."\n";



// 显示系统信息
echo "当前PHP版本号：" .PHP_VERSION ."\n";
echo "操作系统的类型:" .PHP_OS ."\n";
echo "当前服务器时间:" .date('Y-m-d H:i:s') ."\n";



// 评分等级
$name = '小明';
$score = 78;
$str = '';

if (is_int($score) || is_float($score)) { // 判断score类型
    if ($score >= 90 && $score <= 100) {
        $str = 'A级';
    } elseif ($score >= 80 && $score < 90) {
        $str = 'B级';
    } elseif ($score >= 70 && $score < 80) {
        $str = 'C级';
    } elseif ($score >= 60 && $score < 70) {
        $str = 'D级';
    } elseif ($score >= 0 && $score < 60) {
        $str = 'E级';
    } else {
        $str = '学生成绩范围必须在0~100之间！';
    }
} else {
    $str = '输入的学生成绩不是数值！';
}

echo $name . "学生的分数：" . $score . "分\n成绩等级：" . $str . "\n";




// 随机数
$keys = rand(1, 16); // 可以取到16
echo "生成随机数" . $keys . "\n";

// 在一定范围内产生若干个随机数
$keys = array_rand(range(1, 33), 6); //
shuffle($keys); // 洗牌
foreach ($keys as $v) {
    echo $v . "\n";
}






// 9x9乘法表
for($i = 1; $i < 10; $i++) {
    for($j = 1; $j <= $i; $j++) {
        echo $j . "X" . $i . "=" . $i * $j . " ";
    }
    echo "\n";
}



// 倒金字塔
for($i=1; $i<=5; $i++)
{
    for($j=0; $j<2*$i-1; $j++)
    {
        echo "*";
    }
    echo "\n";
}


// 判断闰年
$year = 2015;
$result = (($year % 4 == 0) && ($year % 100 != 0)
    || ($year % 400 == 0)) ? '是闰年' : '不是闰年';
 echo $result . "\n";