<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <style>
        
        body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(to right, #4a0072,rgb(219, 142, 115)); 
    color: white;
    font-family: Arial, sans-serif;
}

form {
    background: rgba(0, 0, 0, 0.3);
    box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.5);
    width: 350px;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    
}
form:hover{
    transition:ease-in 2s;
    transform:scale(0.9);
    cursor: pointer;
}

input, option {
    width: 90%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 25px;
    border: none;
    background: rgba(255, 255, 255, 0.2);
    color:  #9000ff;
    text-align: center;
}
input{
    color:white;
}
select{
    background-color: transparent;
    border:none;
    color:white;
}
select:hover{
    background-color: rgba(255, 255, 255, 0.2);
}

#radio{
    width: auto;
}

button {
    font-size: 16px;
    font-weight: bold;
    background-color: purple;
    width: 120px;
    height: 40px;
    border-radius: 500px 1000px;
    color: white;
    cursor: pointer;
    border:rgb(141, 111, 164) solid;
    border-style:outset;
    margin-top: 15px;
}

button:hover {
    background-color:rgb(152, 105, 188);
    transform: scale(1.1);
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
}

.Erreur,.verification{
    color: red;
    font-size: 12px;
    margin-top: 5px;
}

    </style>
</head>
<body>

<?php
$nom = $prenom = $radio = $select = $email = $tel = $password = "";
$valid = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['nom'])) {
        $nom = '<p class="Erreur">Remplir le champ</p>';
    }elseif(!preg_match('/^[a-zA-Z]{3,15}$/',$_POST['nom'])){
        $nom = '<p class="verification">Syntax Erreur</p>';
    }
    if (empty($_POST['prenom'])) {
        $prenom = '<p class="Erreur">Remplir le champ</p>';
        
    }elseif(!preg_match('/^[a-zA-Z]{3,15}$/',$_POST['prenom'])){
        $prenom = '<p class="verification">Syntax Erreur</p>';
    }
    if (empty($_POST['type'])) {
        $radio = '<p class="Erreur">Choisissez au moins une option</p>';
    }
    if (empty($_POST['choix'])) {
        $select = '<p class="Erreur">Choisissez une option</p>';
    }
    if (empty($_POST['email'])) {
        $email = '<p class="Erreur">entrez votre email</p>';
    }elseif(!preg_match('/^[a-zA-Z0-9._-]+@gmail\.com$/',$_POST['email'])){
        $email = '<p class="verification">Syntax Erreur</p>';
    }
    if (empty($_POST['password'])) {
        $password = '<p class="Erreur">entrez votre mot de passe</p>';
    }elseif(!preg_match('/^[a-zA-Z0-9]{8,}$/',$_POST['password'])){
        $password = '<p class="verification">Syntax Erreur</p>';
    }
    if (empty($_POST['tel'])) {
        $tel = '<p class="Erreur">entrez votre telephone</p>';
    }elseif(!preg_match('/^0[675][0-9]{8}$/',$_POST['tel'])){
        $tel = '<p class="verification">Syntax Erreur</p>';
    }
    if ((!$nom && !$prenom && !$radio && !$select && !$email && !$tel && !$password)){
        $valid = true ;
    }else {
        $valid = false ;
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
    if (isset($_POST['check'])) {
        setcookie('nom',$_POST['nom'],time() + 3600) ;
        setcookie('prenom',$_POST['prenom'],time() + 3600) ;
        setcookie('type',$_POST['type'],time() + 3600) ;
        setcookie('choix',$_POST['choix'],time() + 3600) ;
        setcookie('email',$_POST['email'],time() + 3600) ;
        setcookie('tel',$_POST['tel'],time() + 3600) ;
        setcookie('password',$_POST['password'],time() + 3600) ;
    }
header('location:/FORMPHPPROJECT/conixion.php');
}
?>

<form method="POST"> 
    
        <label for="nom">Entrez votre nom: </label>
        <input type="text" id="nom" name="nom" value='<?php if(isset($_COOKIE['nom'])) echo $_COOKIE['nom'] ?>'>
        <?php echo $nom; ?>
    
    
    
        <label for="prenom">Entrez votre prénom:</label>
        <input type="text" id="prenom" name="prenom" value = '<?php if(isset($_COOKIE['prenom'])) echo $_COOKIE['prenom'] ?>'>
        <?php echo $prenom; ?>
        
        <label for="mail">Entrez votre email:</label>
        <input type="email" id="mail" name="email" value='<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email'] ?>'>
        <?php echo $email; ?>

        <label for="pass">Entrez votre mot de passe:</label>
        <input type="password" id="pass" name="password" value='<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'] ?>'>
        <?php echo $password; ?>

        <label for="num">Entrez votre telephone:</label>
        <input type="tel" id="num" name="tel" value = '<?php if(isset($_COOKIE['tel'])) echo $_COOKIE['tel'] ?>'>
        <?php echo $tel; ?>

    
        <label>Choisir une option:
        <input id="radio" type="radio" name="type" value="type1"> Type 1
        <input id="radio" type="radio" name="type" value="type2"> Type 2</label>
        <?php echo $radio; ?>
    

    
        <label for="choix">
        <select name="choix" id="choix">
            <option value="">Sélectionnez une option</option>
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
        </select></label>
        <?php echo $select; ?>

        <div>
            <input type="checkbox" name="check" id="check" style='width:fit-content;'>
            <label for="check">Remember me!</label>
        </div>
    <button type="submit" name = 'submit'>Soumettre</button> 
    <h6> <?php  echo  date('d/m/y'); ?> </h6>
</form>
</body>
</html>