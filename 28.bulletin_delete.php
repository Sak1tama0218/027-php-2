<?php
    error_reporting(0); // 關閉錯誤報告
    session_start(); // 啟動 session
    if (!$_SESSION["id"]) { // 檢查是否有登入
        echo "請登入帳號"; // 如果沒有登入，提示用戶先登入，並在3秒後跳轉到登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 連接資料庫
        $sql="delete from bulletin where bid='{$_GET["bid"]}'"; // 構建刪除佈告的 SQL 語句
        #echo $sql;
        if (!mysqli_query($conn,$sql)){ // 執行刪除操作並檢查是否成功
            echo "佈告刪除錯誤"; // 如果刪除失敗，提示用戶
        }else{
            echo "佈告刪除成功"; // 如果刪除成功，提示用戶
        }
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>"; // 在3秒後跳轉回佈告欄列表
    }
?>
