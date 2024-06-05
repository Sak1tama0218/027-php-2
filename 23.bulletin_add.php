<?php
    error_reporting(0); // 禁止顯示錯誤報告
    session_start(); // 啟動會話
    if (!$_SESSION["id"]) { // 如果沒有登入
        echo "please login first"; // 顯示請先登入訊息
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 自動重新導向到 2.login.html 頁面
    }
    else{
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 連接到資料庫
        $sql="insert into bulletin(title, content, type, time) 
        values('{$_POST['title']}','{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')"; // 準備插入佈告的 SQL 語句
        if (!mysqli_query($conn, $sql)){ // 如果插入命令錯誤
            echo "新增命令錯誤"; // 顯示新增命令錯誤訊息
        }
        else{
            echo "新增佈告成功，三秒鐘後回到網頁"; // 顯示新增佈告成功訊息
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>"; // 自動重新導向到 11.bulletin.php 頁面
        }
    }
?>
