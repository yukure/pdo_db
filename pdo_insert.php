<?php
require_once("./dbconf.php");
require_once("./pdo.php");
//bindValue　するための配列作成
$param['0'] = ':num';
$param['1'] = ':text';
$bindArray = array(
    array('param' => $param['0'], 'val' => $_POST['num'], 'type' => PDO::PARAM_INT),
    array('param' => $param['1'], 'val' => $_POST['text'], 'type' => PDO::PARAM_STR),
);
//insert 開始
$db = new DB($host, $user, $pass, $dbn);
$sql = "INSERT INTO test (num, text) VALUES ({$param['0']}, {$param['1']})";

$item = $db->pdo_insert($sql,$bindArray);

if(!empty($item)) {
    var_dump($item);
}else {
    echo "ok";
    var_dump($item,$bindArray);
    echo $sql;

}
