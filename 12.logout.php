<?php
    session_start(); // 啟動會話
    unset($_SESSION["id"]); // 刪除會話中的 id 參數
    echo "登出成功....";  // 顯示登出成功訊息
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>"; // 重新導向到 2.login.html 頁面

?>
