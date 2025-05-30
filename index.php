<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首頁</title>
</head>
<body>
    
<table>
<tr>車款介紹</tr>
<tr><td>首頁</td><td>登入<br>註冊新帳號</td><td>關於</td><td>搜尋<input type="text" name="keyword" placeholder="輸入車型" 
                    value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"></td></tr>
<tr></tr>
</table>
</body>
</html>