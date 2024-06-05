<?php

    error_reporting(0); // 禁止顯示錯誤報告
    session_start(); // 啟動會話
    if (!$_SESSION["id"]) { // 如果沒有登入
        echo "請登入帳號"; // 顯示請登入帳號訊息
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 自動重新導向到 2.login.html 頁面
    }
    else{   
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 連接到資料庫
        if (!mysqli_query($conn, "update user set pwd='{$_POST['pwd']}' where id='{$_POST['id']}'")){ // 更新用戶密碼
            echo "修改錯誤"; // 顯示修改錯誤訊息
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>"; // 自動重新導向到 18.user.php 頁面
        }else{
            echo "修改成功，三秒鐘後回到網頁"; // 顯示修改成功訊息
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>"; // 自動重新導向到 18.user.php 頁面
        } 
    }

?>
