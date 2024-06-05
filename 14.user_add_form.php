<html>
    <head><title>新增使用者</title></head>
    <body>
<?php        
    error_reporting(0); // 禁止顯示錯誤報告
    session_start(); // 啟動session
    if (!$_SESSION["id"]) { // 如果沒有登入
        echo "請登入帳號"; // 顯示請登入帳號訊息
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 自動重新導向到 2.login.html 頁面
    }
    else{    
        echo "
            <form action=15.user_add.php method=post>
                帳號：<input type=text name=id><br> <!-- 輸入帳號 -->
                密碼：<input type=text name=pwd><p></p>  <!-- 輸入密碼 -->
                <input type=submit value=新增> <input type=reset value=清除> <!-- 提交按鈕與重置按鈕 -->
            </form>
        ";
    }
?>
    </body>
</html>
