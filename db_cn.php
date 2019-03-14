<?php

$dbb='mysql:host=localhost;dbname=thailand_db';//ชือฐานข้อมูล
//$CHAR_SET = "charset=utf8";

$username='root';   //  =ชื่อผู้ใช้
$pass='';



try{
    $con = new PDO($dbb,$username,$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES 'utf8' COLLATE 'utf8_unicode_ci' "  ));
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $ex){
        echo 'ไม่ได้'.$ex->getMessage();
    }
?>
