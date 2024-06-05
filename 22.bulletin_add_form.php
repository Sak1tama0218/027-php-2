<?php
    error_reporting(0); // 禁止顯示錯誤報告
    session_start(); // 啟動會話
    if (!$_SESSION["id"]) { // 如果沒有登入
        echo "please login first"; // 顯示請先登入訊息
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 自動重新導向到 2.login.html 頁面
    }
    else{
        echo "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <form method=post action=23.bulletin_add.php>
                    標    題：<input type=text name=title><br> <!-- 輸入佈告標題 -->
                    內    容：<br><textarea name=content rows=20 cols=20></textarea><br> <!-- 輸入佈告內容 -->
                    佈告類型：<input type=radio name=type value=1>系上公告  <!-- 選擇系上公告類型 -->
                            <input type=radio name=type value=2>獲獎資訊 <!-- 選擇獲獎資訊類型 -->
                            <input type=radio name=type value=3>徵才資訊<br> <!-- 選擇徵才資訊類型 -->
                    發布時間：<input type=date name=time><p></p> <!-- 輸入發布時間 -->
                    <input type=submit value=新增佈告> <input type=reset value=清除> <!-- 提交按鈕與重置按鈕 -->
                </form>
            </body>
        </html>
        ";
    }
?>
