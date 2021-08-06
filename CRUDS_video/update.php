<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
	date_default_timezone_set('Asia/Manila');
	require_once 'dbconnection.php';

        if(isset($_POST['edits']))
        {
            $file_name = $_FILES['video']['name'];
            $file_temp = $_FILES['video']['tmp_name'];
            $file_size = $_FILES['video']['size'];
            $save_query_pdo = db_config();
            
            if( $file_size < 50000000 )
            {
		$file = explode('.', $file_name);
			$end = end($file);
			$allowed_ext = array('avi', 'flv', 'wmv', 'mov', 'mp4');
			if(in_array($end, $allowed_ext))
                        {
				$name = date("Ymd").time();
				$location = 'video/'.$name.".".$end;
				if(move_uploaded_file($file_temp, $location))
                                {
                                        unlink("./".$_SESSION['location']);
                                        $save_query_insert = $save_query_pdo->prepare("UPDATE video SET video_name=:video_name, location=:location WHERE id=:id");
                                        $save_query_insert->execute(array('video_name'=>$name, 'location'=>$location, 'id'=>$_SESSION['id']));
					echo "<script>alert('Video has been Edited')</script>";
					echo "<script>window.location = 'index.php'</script>";
				}
			}
                        else
                        {
				echo "<script>alert('Wrong video format')</script>";
				echo "<script>window.location = 'index.php'</script>";
			}
            }
            else
            {
                echo "<script>alert('File too large to upload')</script>";
                echo "<script>window.location = 'index.php'</script>";
            }
        }
?>
