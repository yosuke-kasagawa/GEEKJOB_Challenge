<?php

//DBへの接続用を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','kasagawa','kasagawa');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $pdo;
    } catch (PDOException $e) {
        die('接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
    }
}

function data_insert($pdo, $sql, $params) {
    try {
        $stmt = $pdo->prepare($sql);
        foreach($params as $key=>$value){
            $stmt->bindValue($key,$value);
        }
        $stmt->execute();
        return $stmt->rowCount();
    } catch (PDOException $e) {
        die('データの挿入に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
    }
}
