<?php

error_reporting(0); // 禁止顯示錯誤報告
session_start(); // 啟動會話
if (!$_SESSION["id"]) { // 如果沒有登入
    echo "請登入帳號"; // 顯示請登入帳號訊息
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 自動重新導向到 2.login.html 頁面
}
else{    

   #mysqli_connect() 建立資料庫連結
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   #mysqli_query() 從資料庫查詢資料
   #新增資料SQL命令：insert into 表格名稱(欄位1,欄位2) values(欄位1的值,欄位2的值)
   $sql="insert into user(id,pwd) values('{$_POST['id']}', '{$_POST['pwd']}')";
   #echo $sql;
   if (!mysqli_query($conn, $sql)) { // 如果新增命令錯誤
     echo "新增命令錯誤"; // 顯示新增命令錯誤訊息
   }
   else{
     echo "新增使用者成功，三秒鐘後回到網頁"; // 顯示新增使用者成功訊息
     echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>"; // 自動重新導向到 18.user.php 頁面
   }
}
?>
