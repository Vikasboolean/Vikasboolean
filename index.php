<?php
session_start();
if(isset($_SESSION['userName'])&& isset($_SESSION["Phone"]))
{
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Box</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Chat box</h1>
    <div class="chat">
        <h2>Welcome Sir <span>user</span></h2>
        <div class="msg">

        </div>
        <div class="input_msg">
            <input type="text" placeholder="Message">
            <button>SEND</button>
        </div>
    </div>
</body>
</html>

<?php
} else {

header("location: login.php");

}