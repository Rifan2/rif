
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

    if ($_GET['func']=='add_device'){
        add_device();
    }
    elseif ($_GET['func']=='update_device'){
        update_device();

    }
    elseif($_GET['func']=='delete_device'){
        delete_device();
    }
    else {
        view_device();
    }

function add_device(){
GLOBAL $conn;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Device_name = $_POST["Device_name"];
        $Serial_numbe = $_POST["Serial_numbe"];
        $manufactured = $_POST["manufactured"];
        $model = $_POST["model"];
        $Physicaladdress = $_POST["Physicaladdress"];
        $Date_of_service = $_POST["Date_of_service"];
        
        
    
        $sql = "INSERT INTO device ( Device_name,Serial_numbe,manufactured,model,Physicaladdress,Date_of_service)
        VALUES  :Device_name , :Serial_numbe , :manufactured , :model , :Physicaladdress , :Date_of_service";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":Device_name", $Device_name);
        $stmt->bindParam(":Serial_numbe", $Serial_numbe);
        $stmt->bindParam(":manufactured", $manufactured);
        $stmt->bindParam(":model", $model);
        $stmt->bindParam(":Physicaladdress", $Physicaladdress);
        $stmt->bindParam(":Date_of_service", $Date_of_service);
        $stmt->execute();
        //التحقق من وجود صف واحد كحد أقصى يتطابق مع معلومات الاستعلام 
        if ($stmt->rowCount() == 1) {
            echo "<h1>تم الاستعلام عن الجهاز بنجاح!</h1>";
        } else {
          
            echo "<h1> PIN فشل العثور على الجهاز . يرجى التحقق من اسم الجهاز  </h1>";
        }
    }
}


function update_device(){
   
}



function delete_device(){
 
}

function view_device(){

 
}


?>