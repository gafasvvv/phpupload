<?php
    /*
    * DBの接続情報を設定
    */
    //設定内容を変数に格納
    $host = 'mysql';
    $dbName = 'photoupload';
    $charset = 'utf8';
    $user = 'root';
    $password = 'pass';
    //定数を設定
    define("DSN","mysql:host=$host;dbname=$dbName;charset=$charset;");
    define("DB_USER",$user);
    define("DB_PASSWORD",$password);
?>