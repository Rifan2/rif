<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=mcc_assets_db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt->execute();
    // التحقق من وجود صف واحد كحد أقصى يتطابق مع معلومات تسجيل الدخول
    if ($stmt->rowCount() == 1) {
        // تم التحقق من صحة معلومات تسجيل الدخول
        // يمكنك تنفيذ الإجراءات المناسبة هنا، مثل توجيه المستخدم إلى صفحة محمية
        echo "<h1>تم تسجيل الدخول بنجاح!</h1>";
    } else {
        // فشل في التحقق من صحة معلومات تسجيل الدخول
        echo "<h1>فشل تسجيل الدخول. يرجى التحقق من اسم المستخدم وكلمة المرور</h1>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="x-UA-Compatible" content="IE=edge">
<meta name="viewport"content="width=device-width,initial-scale=1.0">
<title> madinah.cardiac.center</title>
<link rel="stylesheet"href="style.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
</head>
<body></body></html>