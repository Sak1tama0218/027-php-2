<?php
    error_reporting(0); // 關閉錯誤報告
    session_start(); // 啟動 session
    // 檢查是否有登入
    if (!$_SESSION["id"]) {
        echo "please login first";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 如果沒有登入，提示用戶先登入，並在3秒後跳轉到登入頁面
    }
    else{
        
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 連接資料庫
        $result=mysqli_query($conn, "select * from bulletin where bid={$_GET["bid"]}"); // 根據 GET 參數 bid 取得對應的佈告資訊
        $row=mysqli_fetch_array($result);
        // 初始化單選按鈕的選中狀態
        $checked1="";
        $checked2="";
        $checked3="";
        // 根據佈告類型設置對應單選按鈕為選中狀態
        if ($row['type']==1)
            $checked1="checked";
        if ($row['type']==2)
            $checked2="checked";
        if ($row['type']==3)
            $checked3="checked";
            // 輸出 HTML 表單，用於編輯佈告內容
        echo "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <form method=post action=27.bulletin_edit.php>
                    佈告編號：{$row['bid']}<input type=hidden name=bid value={$row['bid']}><br>
                    標    題：<input type=text name=title value={$row['title']}><br>
                    內    容：<br><textarea name=content rows=20 cols=20>{$row['content']}</textarea><br>
                    佈告類型：<input type=radio name=type value=1 {$checked1}>系上公告 
                            <input type=radio name=type value=2 {$checked2}>獲獎資訊
                            <input type=radio name=type value=3 {$checked3}>徵才資訊<br>
                    發布時間：<input type=date name=time value={$row['time']}><p></p>
                    <input type=submit value=修改佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
