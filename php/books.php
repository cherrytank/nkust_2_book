<?php
require_once 'loginserver.php';
session_start();
$ordernumber=$_GET['ordernumber'];

// 建構檢索所有商品的 SQL 語句
$sql = "SELECT * FROM books WHERE ordernumber = '$ordernumber'";

// 執行 SQL 語句
$result = $conn->query($sql);

// 將商品資料存儲到變數中
$books = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}

// 關閉連接
$conn->close();

// 引入 HTML 檔案
include '../html/books.html';
?>
