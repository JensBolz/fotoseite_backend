<?php 
session_start();

include './dbconnection.php';

if(isset($_GET['login'])) {
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    
    $statement = $dbh->prepare("SELECT * FROM admin WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();
 
    //Überprüfung des Passworts
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['id'];
        echo '<meta http-equiv="refresh" content="1; URL=dashboard.html">'; 
        
    } 
    else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";      
        
    }
}
?>
<!DOCTYPE html> 
<html> 
<head>
  <title>Login</title> 
  <link rel="stylesheet" href="css/style.css">
</head> 


<body>
 

 
<section class="container">
      <div class="headline">
     Adminbereich Fotoseite   
    </div>
      
      
    <div class="login">
      <h1>Login</h1>
      <form method="post" action="?login=1">
        <p><input type="email" size="40" maxlength="250" name="email"><br><br></p>
        <p><input type="password" size="40"  maxlength="250" name="passwort"><br></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me on this computer
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
        <div class="errormessage">
            <?php 
                if(isset($errorMessage)) {
                    echo $errorMessage;                    
                }
                ?>
        </div>
        
      </form>
    </div>

    <div class="login-help">
      <p>Forgot your password? <a href="index.html">Click here to reset it</a>.</p>
    </div>
    
  </section>
</body>
</html>