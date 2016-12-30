<?php
require_once("./dbconf.php");
require_once("./pdo.php");
//bindValue　するための配列作成
$param['0'] = ':num';
$param['1'] = ':text';
$bindArray = array(
    array('param' => $param['0'], 'val' => '4', 'type' => PDO::PARAM_INT),
    array('param' => $param['1'], 'val' => 'wwwww', 'type' => PDO::PARAM_STR),
);
//insert 開始
$db = new DB($host, $user, $pass, $dbn);
$sql = "UPDATE test SET num = :num, text = :text WHERE num = {$_POST['num']} AND text = '{$_POST['text']}'";

$item = $db->pdo_update($sql,$bindArray);

if(!empty($item)) {
    var_dump($item);
}else {
    echo "ok";
    var_dump($item,$bindArray);
    echo $sql;

}
