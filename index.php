<!-- register -->

<?php
    $test = '';
    require('connect.php');
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $query = "INSERT INTO `user` (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($connection, $query);
        if($result){
            $smsg = "User Created Succesfully.";
        }else{
            $fmsg = "User Registration Failed";
        }
    }

?>

<!-- Login -->

<?php
session_start();
require('connect.php');
if(isset($_POST) & !empty($_POST)){
    $usernameLogin = mysqli_real_escape_string($connection, $_POST['usernameLogin']);
    $passwordLogin = md5($_POST['passwordLogin']);
    $sql = "SELECT * FROM `user` WHERE ";
    if(filter_var($usernameLogin, FILTER_VALIDATE_EMAIL)){
      $sql .= "email='$usernameLogin'";
    }else{
      $sql .= "username='$usernameLogin'";
    }
    $sql .= " AND password='$passwordLogin' AND active=1";
    $sql;
    $res = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($res);
  
    if($count == 1){
      $_SESSION['username'] = $usernameLogin;
        $test = $_SESSION['username'];
    }else{ 
      $fmsg = "User does not exist";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <script type = "text/javascript" src = "main.js" ></script>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login and Register</title>
</head>
<body>
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
        
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php 
            if($test == ''){echo'
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li id="register" class="nav-item" onclick="register()">
                        <a class="nav-link" href="#">Zarejestruj</a>
                    </li>
                    <li id="login" class="nav-item" onclick="login()">
                        <a class="nav-link" href="#">Zaloguj</a>
                    </li>
                </ul>
            </div>';} else{
                echo'
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li id="user" class="nav-item">
                        <a href="#" class="nav-link">User</a>
                    </li>
                    <li class="nav-item" style="float="right" onclick="changePassword()">
                        <a href="#" class="nav-link">Change Password</a>
                    </li>
                    <li class="nav-item" style="float="right";>
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
                ';
            }
            
            ?>
        </nav>

        <form class="user-panel" id="reg" method="post">
        <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
        <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>

            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email Addres" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>

        <form class="user-panel" id="log" action="" method="post" onsubmit="clear()">
            <input type="text" name="usernameLogin" placeholder="Username or Email Addres" required>
            <input type="password" name="passwordLogin" placeholder="Password" required>
            <button type="submit">Loginn</button>
        </form>
        
        <form class="user-panel" id="changePassword" action="" method="post">
            <input type="password" name="oldPasswordChange" placeholder="Old Password" required>
            <input type="password" name="newPasswordChange" placeholder="New Password" required>
            <button type="submit">Change Password</button>
        </form>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>