<?php
    // 檢查表單是否提交
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ID = $_POST["ID"];
        $password = $_POST["password"];
        require_once 'loginserver.php';
        $sql = "SELECT * FROM account WHERE ID = '$ID'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // 顯示搜尋結果
            while ($row = $result->fetch_assoc()) {
                if($row["password"]==$password){
                    echo "success";
                }
            }
            $_SESSION['user_id'] = $ID;
        } else {
            echo "fail";
        }
        $conn->close();
    }
?>