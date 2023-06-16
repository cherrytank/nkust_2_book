<?php
session_start();
if($_SESSION['user_id']== NULL){
    
}else{
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];

        // 檢查上傳是否成功
        if ($file['error'] === UPLOAD_ERR_OK) {
            $tempFilePath = $file['tmp_name'];

            // 儲存上傳的圖片
            $uploadDir = '../accet/image/';
            $filename = $_SESSION['user_id'].$file['name'];
            $destination = $uploadDir . $filename;

            if (move_uploaded_file($tempFilePath, $destination)) {
                echo $filename;
            } else {
                echo 'fail';
            }
        } else {
            echo 'fail' . $file['error'];
        }
    }
}
}
?>

