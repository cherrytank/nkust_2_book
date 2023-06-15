<?php
$host = 'localhost';
$dbuser ='root';
$dbpassword = '';
$dbname = 'nkust2book';
$conn = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
/*if($conn){
    echo "正確連接資料庫";
}
else {
    echo "不正確連接資料庫</br>" . mysqli_connect_error();
}*/
?>