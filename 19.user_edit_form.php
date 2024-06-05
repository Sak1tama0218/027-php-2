<html>
    <head><title>修改使用者</title></head>
    <body>
    <?php
    error_reporting(0); // 禁止顯示錯誤報告
    session_start(); // 啟動會話
    if (!$_SESSION["id"]) { // 如果沒有登入
        echo "請登入帳號"; // 顯示請登入帳號訊息
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 自動重新導向到 2.login.html 頁面
    }
    else{   
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 連接到資料庫
        $result=mysqli_query($conn, "select * from user where id='{$_GET['id']}'"); // 從資料庫中選擇指定id的用戶
        $row=mysqli_fetch_array($result); // 取得結果集中的一行作為關聯數組
        echo "
        <form method=post action=20.user_edit.php>
            <input type=hidden name=id value={$row['id']}>
            帳號：{$row['id']}<br> 
            密碼：<input type=text name=pwd value={$row['pwd']}><p></p>
            <input type=submit value=修改> #提交按鈕
        </form>
        ";
    }
    ?>
    </body>
</html>
