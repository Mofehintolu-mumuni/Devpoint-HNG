<?php 
session_start();

include"controller_dependency.php";

//instantiate controller class and select apprioprate class
 $obj = factory::LoginController();
 
$token = $_SESSION['token'] = md5(rand(1,10000000));

if(!isset($_SESSION['ID'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href ="css/style.css" rel= "stylesheet"/>
    <title>Login</title>
</head>
<body>
    <div class="all">
        <div class="contender">
        <div class="images">
            <img src="https://res.cloudinary.com/dy18y8k1e/image/upload/v1568757822/Logo_sfirbx.png" alt="devpoint logo" width="120px" height="40px" class="top-margin first"/>
            <img src="https://res.cloudinary.com/adenijitomi/image/upload/v1568748449/Login_illustr_pfozv7.png" alt ="team illustration"  class="second-image top-margin" />
           
              
        </div>
        <div class="form-area">
            <h2>Welcome to <b>Devpoint HNG</b></h2>
            <p>We are a team of developers and products designers</p>

             

              <!----- START PHP CODE ----->

              <?php

    if(isset($_POST['user_login']))
        {
       if($_SERVER['REQUEST_METHOD'] == "POST")
       {
       if((isset($_POST['email'])) && (isset($_POST['password'])) && ($_POST['email'] != null) && ($_POST['password'] != null))
       {
           if($token == $_SESSION['token'])
           {
               
                //CALL UP LOGIN FUNCTION
                   $responseArray = $obj->Login($_POST['email'],$_POST['password']);
                   
                //GET VALUES FROM THE RESPONSE ARRAY 
               if(is_array($responseArray))
                   {
                    $login_status = $responseArray[0];

                   if($login_status == "SUCCESS")
                   {
                        echo'<script> window.location = "dashboard";
                        </script>';
   
                   }
                    elseif($login_status == "FAILURE")
                        {
                            if(isset($_SESSION['ID']))
                            {
                                session_destroy();
                            }
                                echo'<p style="color: red;">Error!</p>';
                                echo"<script> var password_wrong = setInterval(function(){generate_alert('Password or email is not valid', 'password-error', 'red');}, 1000); 
                                setTimeout(function(){cancel_timed_alert('password-error', password_wrong);}, 10000);</script>";
                    
            
                        }
                        else
                        {
                            if(isset($_SESSION['ID']))
                            {
                                session_destroy();
                            }
                            echo'<p style="color: red;">Error!</p>';
                            echo"<script> var password_wrong = setInterval(function(){generate_alert('Password or email is not valid', 'password-error', 'red');}, 1000); 
                            setTimeout(function(){cancel_timed_alert('password-error', password_wrong);}, 10000);</script>";
                   
                        }
                   
                   }
                
                        
                }
                else{
                    echo'<p style="color: red;">Error!</p>';
                    echo"<script> var email_var = setInterval(function(){generate_alert('Login not successful', 'info', 'red');}, 1000); 
                    setTimeout(function(){cancel_timed_alert('info', email_var);}, 10000);</script>";
                }

                }
                else{
                    echo'<p style="color: red;">Error!</p>';
                    echo"<script> var email_var = setInterval(function(){generate_alert('Login not successful check your inputs', 'info', 'red');}, 1000); 
                    setTimeout(function(){cancel_timed_alert('info', email_var);}, 10000);</script>";
                }

            }
            else{
                echo'<p style="color: red;">Error!</p>';
                echo"<script> var email_var = setInterval(function(){generate_alert('Login not successful', 'info', 'red');}, 1000); 
                setTimeout(function(){cancel_timed_alert('info', email_var);}, 10000);</script>";
            }

            }


            //Handle registeration success

            if(isset($_GET['login']) && isset($_GET['user']) && ($_GET['login'] === 'true') && ($_GET['user'] != null))
            {

                $fullname = (string) $_GET['user'];
                
                echo"<script> var email_var = setInterval(function(){generate_alert('$fullname your account registration was successful you can now login!', 'success', 'green');}, 1000); 
            setTimeout(function(){cancel_timed_alert('info', email_var);}, 10000);</script>"; 

            }


                ?>

        <!----- END PHP CODE ----->

                 <!--- ALERTS --->
              <h4><i style="color: #44E615; text-align: center; background-color: #EAF9EA;"><strong id="success"></strong></i></h4>
              <h4><i style="color: #1BCEDA; text-align: center; background-color: #EAF9EA;"><strong id="info"></strong></i></h4>
              <h4><i style="color: #DA381B; text-align: center; background-color: #EAF9EA;"><strong id="email-error"></strong></i></h4>
              <h4><i style="color: #DA381B; text-align: center; background-color: #EAF9EA;"><strong id="password-error"></strong></i></h4>
              <h4><i style="color: #DA381B; text-align: center; background-color: #EAF9EA;"><strong id="failure"></strong></i></h4>
              <!--- ALERTS --->


                <form action="" method="Post">
                        <div>
                                <label for="email">E-mail: </label>
                                <input type="email" 
                                name="email" id ="email" oninput="emailPart()" placeholder="Enter your E-mail"/>
                                <small><p id="validemail"></p></small>
                            </div>
                            <div>
                                <label for="password">Password: </label>
                                <input type="password" 
                                name="password" id = "pswrd" oninput="passWord()" placeholder="Enter your Password"/>
                                <small><p id="validPasswrd"></p></small>
                            </div>
                <!---<div class ="inline">
                 <input type="checkbox" class="checkbox"/>
                 <small class="tandc">Remember me
                     <a href ="#">Forgot password?</a></small>
                </div> --->
                <div>
                    <input type = "submit" name="user_login" class="submit" value="Login"/>
                </div>
                <div>
                    <small class="tandc">Don’t have an account? <a href="signup">Create Account here</a></small>
                </div>
                </form>
        </div>
        </div>
    </div>
    <script src="js/backend_alert_controls.js"></script>
  
    <script>
        
      
            function emailPart(){
                let email = document.querySelector("#email").value;
                let valid = document.querySelector("#validemail");
                let pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,15}$/;

                    if(pattern.test(String(email).toLowerCase()) == true){
                        text = "Valid Email input";
                    } else {
                        text = "Add a valid email";
                    }
                
                   document.getElementById("validemail").innerHTML = text;
                }

                function passWord(){
                let password = document.querySelector("#pswrd").value;
                let tpattern =  /^(?=[^\s]*?[0-9])(?=[^\s]*?[a-zA-Z])[a-zA-Z0-9]{2,20}$/;
              

                    if(tpattern.test(String(password))  == true  ){
                        ttext = "Valid Password input";
                    } else {
                        ttext = "Password must contain letters and numbers only (20 characters max)";
                    }
                
                   document.getElementById("validPasswrd").innerHTML = ttext;

            }

    </script>

<?php
}
else{
    echo("<script>location.href = 'dashboard';</script>");
    header("location: dashboard");
}
?>
</body>
</html>