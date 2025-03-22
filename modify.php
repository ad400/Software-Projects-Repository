<?php
$nom = $prenom = $radio = $select = $email = $tel = $password = "";
$valid = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modify'])) {
    
    if(!preg_match('/^[a-zA-Z]{3,15}$/',$_POST['nom'])){
        $nom = '<p class="verification">Syntax Erreur</p>';
    }
    if(!preg_match('/^[a-zA-Z]{3,15}$/',$_POST['prenom'])){
        $prenom = '<p class="verification">Syntax Erreur</p>';
    }
    if(!preg_match('/^[a-zA-Z0-9._-]+@gmail\.com$/',$_POST['email'])){
        $email = '<p class="verification">Syntax Erreur</p>';
    }
    if(!preg_match('/^[a-zA-Z0-9]{8,}$/',$_POST['password'])){
        $password = '<p class="verification">Syntax Erreur</p>';
    }
    if(!preg_match('/^0[675][0-9]{8}$/',$_POST['tel'])){
        $tel = '<p class="verification">Syntax Erreur</p>';
    }
    if ((!preg_match('/^0[675][0-9]{8}$/',$_POST['tel'])) 
    || !preg_match('/^[a-zA-Z0-9]{8,}$/',$_POST['password'])
    || !preg_match('/^[a-zA-Z0-9._-]+@gmail\.com$/',$_POST['email'])
    || !preg_match('/^[a-zA-Z]{3,15}$/',$_POST['prenom'])
    || !preg_match('/^[a-zA-Z]{3,15}$/',$_POST['nom']))
    {
        $valid = false ;
    }else {
        $valid = true ;
    }
}
if ($valid === true) {
    $_SESSION['nom']= $_POST['nom'];
    $_SESSION['prenom']= $_POST['prenom'];
    $_SESSION['type']= $_POST['type'];
    $_SESSION['choix']= $_POST['choix'];
    $_SESSION['email']= $_POST['email'];
    $_SESSION['tel']= $_POST['tel'];
    $_SESSION['password']= $_POST['password'];
     $time = "" ;
    if(isset($_POST['newCheck'])){
        $time = time() + 3600;
    }else{
        $time = time() - 3600;
    }
        setcookie('nom',$_POST['nom'],$time) ;
        setcookie('prenom',$_POST['prenom'],$time) ;
        setcookie('type',$_POST['type'],$time) ;
        setcookie('choix',$_POST['choix'],$time) ;
        setcookie('email',$_POST['tel'],$time) ;
        setcookie('tel',$_POST['tel'],$time) ;
        setcookie('password',$_POST['password'],$time) ;
  
header('location:/FORMPHPPROJECT/home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" action = "">
    <meta nom="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        :root {
            height:100%
        }
        body {
            height : 100%
        }
        form {
            height:100% ;
            display: flex;
            align-items: center;
            justify-content: center;
        }
          .form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            border: solid 1px;
            padding: 20px;
            border-radius: 5px;
        }
        button {
            background-color : green;
            color: #ddd;
            border : none;
            border-radius : 5px;
        }
        label[for = check] {
            font-family:monospace;
            white-space: nowrap;
            display: inline-block;
            overflow:hidden;
            animation: typing 2s steps(11)  ;
        }
        @keyframes typing {
            from {
                width: 0ch;
            }
            to {
                width: 11ch;
            }
        }
        .Erreur,.verification{
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <form method='post'>
        <div class="form">
            <div class="groupe-champ">
                <label for="nom">Name:</label><br>
                <input type="text" id="nom" name='nom' >
                <?php echo $nom; ?>
            </div>

            <div class="groupe-champ">
                <label for="prenom">Entrez votre prénom:</label><br>
                <input type="text" id="prenom" name="prenom">
                <?php echo $prenom; ?>
            </div>

            <div class="groupe-champ">
                <label for="mail">Entrez votre email:</label><br>
                <input type="email" id="mail" name="email">
                <?php echo $email; ?>
            </div>

            <div class="groupe-champ">
                <label for="pass">Entrez votre mot de passe:</label><br>
                <input type="password" id="pass" name="password">
                <?php echo $password; ?>
            </div>

            <div class="groupe-champ">
                <label for="num">Entrez votre telephone:</label><br>
                <input type="tel" id="num" name="tel">
                <?php echo $tel; ?>
            </div>
            <div>
                <input type="checkbox" name="newCheck" id="check">
                <label for="check">Remember me again!</label>
            </div>
            <button name = modify>Modify</button>
        </div>
    </form>
</body>
</html>