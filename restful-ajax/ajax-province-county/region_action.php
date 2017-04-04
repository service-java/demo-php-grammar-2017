<?php
require_once './util/DBHelper.php';
header("Content-type:text/html;charset=utf-8");


$type = isset($_GET["type"]) ? $_GET["type"] : ""; // 健壮
$parent_id = isset($_GET["parent_id"]) ? $_GET["parent_id"] : "";

// 连接数据库
if ($type == "" || $parent_id == "") {
    exit(json_encode(array("flag" => false, "msg" => "查询类型错误")));
} else {
    // 连接数据库
    $db = new DBHelper("localhost", "root", "root", "region"); // dbms user pwd db
    $provinces = $db->getSomeResult("global_region", "region_id,region_name", "parent_id={$parent_id} and region_type={$type}");
    $provinces_json = json_encode($provinces);
    exit($provinces_json);
}

?>
