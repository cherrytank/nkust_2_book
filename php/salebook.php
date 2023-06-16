<?php
    session_start();
    if($_SESSION['user_id']== NULL){
        
    }else{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 獲取表單數據
        $ordernumber = $_POST["ordernumber"];
        $ISBN = $_POST["ISBN"];
        $bookname = $_POST["bookname"];
        $author = $_POST["author"];
        $price = $_POST["price"];
        $college = $_POST["college"];
        $exchang = $_POST["exchang"];
        $img_id = $_POST["img_id"];
        $theowner = $_SESSION['user_id'];
        require_once 'loginserver.php';

        // 構建插入資料的 SQL 語句
        $sql = "INSERT INTO books(`ordernumber`,`ISBN`, `bookname`, `author`, `price`, `college`, `exchang`,`img_id`, `theowner`)
        VALUES ('$ordernumber','$ISBN', '$bookname', '$author', '$price', '$college', '$exchang','$img_id','$theowner')";

        // 執行 SQL 語句
        if ($conn->query($sql) === TRUE) {
            echo "success";
        } else {
            echo "fail";
        }

        // 關閉連接
        $conn->close();
    }
}

    
?>