<?php
require_once 'loginserver.php';
session_start();
$ordernumber=$_GET['ordernumber'];
$theowner = " ";
// 建構檢索所有商品的 SQL 語句
$sql = "SELECT * FROM books WHERE ordernumber = '$ordernumber'";

// 執行 SQL 語句
$result = $conn->query($sql);

// 將商品資料存儲到變數中
$books = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $theowner = $row["theowner"];
    }
}
$to = $theowner.'@nkust.edu.tw'; // 收件人的電子郵件地址
$subject = '你好!有人對您的手書有興趣喔!'; // 郵件主題
$message = 'http://localhost/nkust_2_book/php/books.php?ordernumber='.$ordernumber; // 郵件內容

// 設定郵件標頭，指定寄件人和回覆地址
$headers = 'From: '.$_SESSION['user_id'].'@nkust.edu.tw' . "\r\n" .
    'Reply-To: '.$_SESSION['user_id'].'@nkust.edu.tw'. "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// 使用mail()函式發送郵件
if (mail($to, $subject, $message, $headers)) {
    echo '郵件已成功發送';
} else {
    echo '郵件發送失敗';
}
?>
