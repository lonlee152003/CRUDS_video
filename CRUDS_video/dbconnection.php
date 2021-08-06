<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dbconnection
 *
 * @author ronald-PC
 */
define('HOST','localhost');
define('DBNAME','cruds_video_db');
define('USER','root');
define('PASSWORD','');
function db_config()
{
        $dsn = 'mysql:host='.HOST.';dbname='.DBNAME;
        $pdo = new PDO($dsn, USER, PASSWORD);
        $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        return $pdo;
}
?>