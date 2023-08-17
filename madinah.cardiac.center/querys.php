

<!DOCTYPE html>
<html lang="en">
<head> 
<meta charset="UTF-8">
<meta http-equiv="x-UA-Compatible" content="IE=edge">
<meta name="viewport"content="width=device-width,initial-scale=1.0">
<title> madinah.cardiac.center</title>
<link rel="stylesheet"href="style.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="wrapper">
     <form action="./"method="post">
     <h1>Query a device</h1><br>
      <label for="device">Choose:</label>
  <select id="device" name="device">
    <option value="Device_name">device</option>
    <option value="Serial_number">Serial_number</option>
    <option value="model">model</option>
    <option value="manufactured">manufactured</option>
    <option value="Physicaladdress">Physicaladdress</option>
    <option value="Date_of_service">Date_of_service</option>
  </select>
     <div id="edit-tool">
    <input type="submit" value="modification">
  </div>
  
  <div id="delete-tool">
  <input type="submit" value="delete">
  </div>
          <div>
               <button class="button"><span>GO</span></button>
          </div>
</div>

</body>
</html>


<?php
$servername = "localhost";
$username = "root";
$password  = "";

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
    $Device_name = $_POST["Device_name"];
    $model = $_POST["model"];

    $sql = "INSERT INTO device ( Device_name,model)
    VALUES  :Device_name , :Serial_numbe , :manufactured , :model , :Physicaladdress , :Date_of_service";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":Device_name", $Device_name);
    $stmt->bindParam(":model", $model);
    $stmt->execute();
    //التحقق من وجود صف واحد كحد أقصى يتطابق مع معلومات الاستعلام 
    if ($stmt->rowCount() == 1) {
        echo "<h1>تم الاستعلام عن الجهاز بنجاح!</h1>";
    } else {
      
        echo "<h1> PIN فشل العثور على الجهاز . يرجى التحقق من اسم الجهاز  </h1>";
    }
}
