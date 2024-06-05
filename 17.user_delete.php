<?php
    error_reporting(0); // 禁止顯示錯誤報告
    session_start(); // 啟動會話
    if (!$_SESSION["id"]) { // 如果沒有登入
        echo "請登入帳號"; // 顯示請登入帳號訊息
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 自動重新導向到 2.login.html 頁面
    }
    else{   
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 連接到資料庫
        $sql="delete from user where id='{$_GET["id"]}'"; // 準備刪除使用者的 SQL 語句
        #echo $sql;
        if (!mysqli_query($conn,$sql)){ // 如果刪除命令錯誤
            echo "使用者刪除錯誤"; // 顯示使用者刪除錯誤訊息
        }else{
            echo "使用者刪除成功"; // 顯示使用者刪除成功訊息
        }
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>"; // 自動重新導向到 18.user.php 頁面
    }
?>
