<?php
/**
 * Created by PhpStorm.
 * User: Luo_0412
 * Date: 2017/2/27
 * Time: 22:03
 */

/**
 * 处理后缀
 * @param $path
 * @return string
 */
function getFileExt($path) {
    $ext = substr($path, strrpos($path, '.') + 1); // 偏移量
    return $ext;
}

function gradeLevel($score) {
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

    return $str;
}

function hr() {
    echo "\n----------------\n";
}

/**
 * 加法
 * @param $a
 * @param $b
 * @return mixed
 */
function add($a, $b) {
    return $a + $b;
}


function isLeapYearHelper($year) {
    return (($year % 4 == 0) && ($year % 100 != 0) || ($year % 400 == 0));
}

function isLeapYear($year) {
    $str = $year . "";
    if(isLeapYearHelper($year) == false) {
        $str .= "不是";
    } else {
        $str .= "是";
    }
    $str .= "闰年\n";
    echo $str;
}