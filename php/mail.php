<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
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
//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'C109154214@nkust.edu.tw';                     //SMTP username
    $mail->Password   = ' ';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($theowner.'@nkust.edu.tw', $theowner);
    $mail->addAddress($_SESSION['user_id'].'@nkust.edu.tw', $_SESSION['user_id']);     //Add a recipient             //Name is optional
    $mail->addReplyTo($_SESSION['user_id'].'@nkust.edu.tw', $_SESSION['user_id']);
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Hello! Someone is interested in your second-hand books!';
    $mail->Body    = 'http://localhost/nkust_2_book/php/books.php?ordernumber='.$ordernumber;
    $mail->AltBody = '感謝您使用服務';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>