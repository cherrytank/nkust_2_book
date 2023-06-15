<?php
    // 檢查表單是否提交
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 獲取表單數據
        $ID = $_POST["ID"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $local = $_POST["local"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        
        require_once 'loginserver.php';

        // 構建插入資料的 SQL 語句
        $sql = "INSERT INTO account(`ID`, `name`, `email`, `local`, `phone`, `password`) 
        VALUES ('$ID', '$name', '$email', '$local', '$phone', '$password')";

        // 執行 SQL 語句
        if ($conn->query($sql) === TRUE) {
            echo "success";
        } else {
            echo "fail";
        }

        // 關閉連接
        $conn->close();
    }
?>
