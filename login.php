<?php
include"db.php";
session_start();



if(isset($_POST["name"]) && isset($_POST["phone"])){
  
  $name=$_POST["name"];
  $phone=$_POST["phone"];

  $q="SELECT * FROM `user` WHERE uname='$name' && phone='$phone'";

  if($rq=mysqli_query($db,$q)){

    if(mysqli_num_rows($rq)==1){
        echo "login";
       $_SESSION["userName"]=$name;
       $_SESSION["phone"]=$phone;
       header("location: index.php");


    }else {
      //echo "not login";

          /* This query make phone no. unique.
             if we give same phone no. with different usrename it don't take . */
        $q="SELECT * FROM `user` WHERE phone='$phone'";
         if($rq=mysqli_query($db,$q)){
            if(mysqli_num_rows($rq)==1){
                echo $phone. "is already taken";

            }else{

                $q="INSERT INTO `user`(`uname`, `phone`) VALUES ('$name','$phone')";
                 if($rq=mysqli_query($db,$q)){
                
                  $q="SELECT * FROM `user` WHERE uname='$name' && phone='$phone'";
                   if($rq=mysqli_query($db,$q)){
                       //if(mysqli_num_rows($rq)==1){

                          // echo "login and registered";
                          $_SESSION["userName"]=$name;
                          $_SESSION["phone"]=$phone;
                          header("location: index.php");
                          
                        }

                    }


               }
            }

       }

     }

    }

 


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Box</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">

</head>
<body>
    <h1>Chat Box</h1>
    <div class="login">
        <h2>login</h2>
        <p>We Try To Gave You a Best Experience Of Chating.</p>
        <p>Massage Yor loved onces</p>
        <form action="" method="post">
            <h3>UserName</h3>
            <input type="text" placeholder="UserName" name="name">

            <h3>Mobile No:</h3>
            <input type="number" placeholder="With Country Code" min="1111111111" max="9999999999999"
               name="phone">
             
            <button>Login/Resgister</Resgister></button>
        </form>
     </div>
</body>
</html>