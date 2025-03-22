<?php 
    session_start();
    
    if (!isset($_SESSION['nom'])) {
        header('Location: login.php');    
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            height : 100vh;
            flex-direction : column;
            display:flex;
            justify-content: center;
            align-items : center;
            font-size : 1.5em ;
            text-align:center;
        }
        button{
            background-color : black;
            color: #fff;
            border : black 2px solid;
            border-radius : 5px;
        }
        .ajt {
            background-color: brown;
        }
        .modify {
            background-color: green;
        }
        .delete {
            background : red
        }
    </style>
</head>
<body>
    <div>
        WELCOME
        <span style="color:red;text-transform: capitalize;">
            <?php if (isset($_SESSION['nom'])) echo " ". $_SESSION['nom'] ?>
        </span><br>
        Visites Count 
        <span style="color: green;text-transform: capitalize;">
            <?php 
            if (!isset($_COOKIE['visits'])) {
                $visits = 1;
            } else {
                $visits = $_COOKIE['visits'] + 1;
            }
            setcookie("visits", $visits, time() + 3600);
            echo ": " . $visits; ?>
        </span>
    </div>
    </div>
    <form method='post' action="/FORMPHPPROJECT/conixion.php">
        <button name = logout>Log out</button>
    </form>
    <div style = 'display: flex; gap:1vw;'>
        <form method='post' action="modify.php">
            <button class= modify >Modify Infos</button>
        </form>
    
        <form method='post' action="/FORMPHPPROJECT/conixion.php" >
            <button class='delete' name= delete>Forget Infos</button>
        </form>
    </div>
  
    
   
</body>
</html>