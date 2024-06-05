<?php

    error_reporting(0); // 關閉錯誤報告
    session_start(); // 啟動 session
    if (!$_SESSION["id"]) { // 檢查是否有登入
        echo "請登入帳號"; // 如果沒有登入，提示用戶先登入，並在3秒後跳轉到登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 連接資料庫
        // 檢查更新操作是否成功
        if (!mysqli_query($conn, "update bulletin set title='{$_POST['title']}',content='{$_POST['content']}',time='{$_POST['time']}',type={$_POST['type']} where bid='{$_POST['bid']}'")){
            // 如果更新失敗，提示用戶並在3秒後跳轉回佈告欄列表
            echo "修改錯誤"; 
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }else{
            // 如果更新成功，提示用戶並在3秒後跳轉回佈告欄列表
            echo "修改成功，三秒鐘後回到佈告欄列表";
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }

?>
