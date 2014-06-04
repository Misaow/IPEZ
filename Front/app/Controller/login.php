<?php
$id = isset($_SESSION["id"]) ? $_SESSION["id"] : "";
$Login = isset($_POST["Login"]) ? $_POST["Login"] : "";
$Pwd = isset($_POST["Pwd"]) ? $_POST["Pwd"] : "";
if (isset($_GET["action"]))
{
    if ( $_GET["action"] == "logout"){
        
        session_destroy();
        header("Refresh: 3; URL=index.php");
        
    }else{
        
        header("Refresh: 3; URL=index.php"); 
    }
    // if action == logout
        
        // then destroy session
        // redirection index 
    // sinon 
    //  rien & redirection index
}
app\core\User::isAlreadyLogged($id);
if(!empty($Login))
{
    
    $user = new app\core\User();
    $userlogged = false;
    if($user->LogOn($Login, $Pwd))
    {
        $userlogged = true;
       // echo'<div class="form-group col-sm-12">';
       //     echo'<div class="alert alert-success" id="alertbox">Authentification réussie. Vous allez être redirigé...</div>';
       // echo'</div>';
        //header('Refresh: 10; URL='.WEBROOT.'http://yoursite.com/page.php');
       // header("Refresh: 3; URL=".WEBROOT."/admin/index.php");
       // exit();
    }
}
?>