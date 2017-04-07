<?php
/**
 * Example Application
 *
 * @package Example-application
 */

require './libs/Smarty.class.php';
$smarty = new Smarty;

// 设定目录
$smarty->template_dir = "./templates";
$smarty->compile_dir  = "./templates_c"; // 编译
$smarty->config_dir   = "./config";
$smarty->cache_dir    = "./cache";

// 设置模板参数
$smarty->caching = true;
$smarty->cache_lifetime = 120;
$smarty->left_delimiter = '{#';
$smarty->right_delimiter = '#}';

// 数据源
$content = "first smarty tpl";
$array[] = array('id'=>1, 'content'=>'news1');
$array[] = array('id'=>2, 'content'=>'news2');
$array[] = array('id'=>3, 'content'=>'news3');

$smarty->assign('name', 'sam');
$smarty->assign('content', $content);
$smarty->assign('newsArray', $array);
$smarty->display('index.tpl'); // 显示的模板
