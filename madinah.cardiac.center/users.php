
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
    
    
    if ($_GET['func']=='add_user'){
            add_user();   
        }

        elseif ($_GET['func']=='update_user') {
            update_user();
        }
        elseif ($_GET['func']=='delete_user') {
            delete_user();
        }
        else  {
        view_user();
    }
        
    

 function  add_user(){
    GLOBAL $conn;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_name = $_POST["user_name"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

    
        $sql = "INSERT INTO users ( user_name,password,email,phone)
        VALUES  (:user_name , :password , :email , :phone)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":user_name", $user_name);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
       

        $stmt->execute();
        //التحقق من وجود صف واحد كحد أقصى يتطابق مع معلومات الاستعلام 
        if ($stmt->rowCount() == 1) {
            echo "<h1>تم الاستعلام عن الجهاز بنجاح!</h1>";
        } else {
          
            echo "<h1> PIN فشل العثور على الجهاز . يرجى التحقق من اسم الجهاز  </h1>";
        }
    }
}


function update_user(){
   
}



function delete_user(){
 
}

function view_user(){

 
}


?>