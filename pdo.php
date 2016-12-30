<?php
class DB
{
    /*
    *@var host: host name
    *@var user:database user name
    *@var pass:password
    *@var db:database name
    */
    function __construct($host, $user, $pass, $dbn)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbn = $dbn;
        $this->dsn = "mysql:dbname=$dbn;host=$host";
    }
    //pdo section
    function pdo_connect()
    {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->pass);
        }catch(PDOException $e) {
            var_dump($e->getMessage());
            die();
        }
        return $pdo;
    }

    //select(one) section
    function pdo_select_one($sql)
    {

        if(empty($sql) || !$sql) {
            $err["pdo_err_select"] = "SQL文が入力されませんでした。";
        }else {
            $result_select = array();
            $td_select = $this->pdo_connect();
            $stmt = $td_select->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result_select = $row;
            }
            return $result_select;
        }
    }

    //select(all) section
    function pdo_select_all($sql)
    {

        if(empty($sql) || !$sql) {
            $err["pdo_err_select"] = "SQL文が入力されませんでした。";
        }else {
            $result_select = array();
            $i = 0;
            $td_select = $this->pdo_connect();
            $stmt = $td_select->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result_select[] = $row;
                $i++;
            }
            return $result_select;
        }
    }

    //insert section
    function pdo_insert($sql,$bindArray)
    {
        if(empty($sql) || !$sql) {
            $err["pdo_err_insert"] = "SQL文が入力されませんでした。";
            return $err;
        }else {
            $td_insert = $this->pdo_connect();
            $stmt = $td_insert->prepare($sql);
            if(!empty($bindArray)){
                foreach($bindArray as $bindParam){
                    $stmt->bindValue($bindParam['param'], $bindParam['val'], $bindParam['type']);
                }
                $stmt->execute();
            }else{
                $err["pdo_insert_bindArray"] = "配列データが取得できませんでした";
                return $err;
            }
        }
    }

    //update section
    function pdo_update($sql,$bindArray)
    {
        if(empty($sql) || !$sql) {
            $err["pdo_err_update"] = "SQL文が入力されませんでした。";
            return $err;
        }else {
            $td_update = $this->pdo_connect();
            $stmt = $td_update->prepare($sql);
            if(!empty($bindArray)){
                foreach($bindArray as $bindParam){
                    $stmt->bindValue($bindParam['param'], $bindParam['val'], $bindParam['type']);
                }
                $stmt->execute();
            }else{
                $err["pdo_insert_bindArray"] = "配列データが取得できませんでした";
                return $err;
            }
        }
    }
}

