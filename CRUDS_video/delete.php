<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'dbconnection.php';

$delete_pdo = db_config();
$delete_delete = $delete_pdo->prepare('DELETE FROM video WHERE id=:id');
$delete_delete_result = $delete_delete->execute(['id'=>$_SESSION['id']]);
if( $delete_delete_result )
{
    unlink("./".$_SESSION['location']);
    echo "<script>alert('The video has been deleted!')</script>";
    echo "<script>window.location = 'index.php'</script>";
}
?>
