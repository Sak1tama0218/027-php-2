<html>
    <head><title>使用者管理</title></head>
    <body>
    <?php
        error_reporting(0); // 禁止顯示錯誤報告
        session_start(); // 啟動會話
        if (!$_SESSION["id"]) { // 如果沒有登入
            echo "請登入帳號"; // 顯示請登入帳號訊息
            echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 自動重新導向到 2.login.html 頁面
        }
        else{   
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>";
            
            $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 連接到資料庫
            $result=mysqli_query($conn, "select * from user"); // 從資料庫中選擇所有用戶
            while ($row=mysqli_fetch_array($result)){ // 遍歷結果集
                echo "<tr><td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>"; // 顯示每個用戶的操作連結、帳號和密碼
            }
            echo "</table>";
        }
    ?> 
    </body>
</html>
