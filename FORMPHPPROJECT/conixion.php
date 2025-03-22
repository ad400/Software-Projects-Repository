<?php  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        if ( isset($_POST['delete'])) {
            setcookie('nom',$_POST['nom'], time()) ;
            setcookie('prenom',$_POST['prenom'], time()) ;
            setcookie('type',$_POST['type'], time()) ;
            setcookie('choix',$_POST['choix'], time()) ;
            setcookie('email',$_POST['tel'],time() + 3600) ;
            setcookie('tel',$_POST['tel'], time()) ;
            setcookie('password',$_POST['password'], time()) ;
        }
        if (isset($_POST['logout'])) {
            session_start();
            session_unset();
            session_destroy();  
        }
    }
    header('location:/FORMPHPPROJECT/home.php');
?>
   

    
