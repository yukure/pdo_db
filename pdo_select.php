<?php
require_once("./dbconf.php");
require_once("./pdo.php");
//bindValue　するための配列作成

//select(複数データの場合)
$item =array();
$db = new DB($host, $user, $pass, $dbn);
$sql = "SELECT * FROM test";


/*
 * pdo_select_one -> 単一レコードの場合
 * pdo_select_all -> 複数レコードの場合
 */

//$item = $db->pdo_select_one($sql);
//$item = $db->pdo_select_all($sql);

foreach($item as $result){
    echo $result["num"];
    echo $result["text"];
    echo "<br>";
}
