<?php 
session_start();

include"controller_dependency.php";

//instantiate controller class and select apprioprate class
 $obj = factory::RegisterController();
 
$token = $_SESSION['token'] = md5(rand(1,10000000));

if(!isset($_SESSION['ID'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href ="css/devpoint.css" rel= "stylesheet"/>
    <title>Signup</title>
</head>
<body>
    <div class="all">
        <div class="contender">
        <div class="images">
            <img src="https://res.cloudinary.com/matsxript/image/upload/v1568756243/Devpoint/Logo_vkvkox.png" alt="devpoint" width="120px" height="40px" class="top-margin first"/>
            <img src="https://res.cloudinary.com/matsxript/image/upload/v1568756300/Devpoint/Team_illus_mz0par.svg" alt ="team illustration"  class="second-image top-margin" />
            <blockquote class="top-margin"><em><b>"Alone we can do so little; 
                together we can do so much"</b></em>
                    <legend>-<em><b> Helen Keller</b></em></legend></blockquote>
              
        </div>
        <div class="form-area">
            <h2>Welcome to <b>Devpoint HNG</b></h2>
            <p>New to devpoint? create an account 
                and be on the path of creating history</p>


                <!----- START PHP CODE ----->

              <?php

if(isset($_POST['user_signup']))
    {
   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
        if((isset($_POST['email'])) && (isset($_POST['password'])) && ($_POST['email'] != null) && ($_POST['password'] != null) && (isset($_POST['firstname'])) && (isset($_POST['middlename'])) && ($_POST['firstname'] != null) && ($_POST['middlename'] != null) && (isset($_POST['lastname'])) && (isset($_POST['passwordConfirm'])) && ($_POST['lastname'] != null) && ($_POST['passwordConfirm'] != null) && (isset($_POST['terms'])) && ($_POST['terms'] != null))
        {
            if(($token == $_SESSION['token']) && ($_POST['passwordConfirm'] === $_POST['password']))
            {

                    //CALL UP REGISTER FUNCTION
                $obj->Register($_POST['firstname'],$_POST['lastname'],$_POST['middlename'],$_POST['email'],$_POST['password']);
        
            }
            else{
                echo'<p style="color: red;">Error!</p>';
                echo"<script> var email_var = setInterval(function(){generate_alert('Registration not successful, password missmatch!', 'info', 'red');}, 1000); 
                setTimeout(function(){cancel_timed_alert('info', email_var);}, 10000);</script>";
            }

        }
        else{
                if(!isset($_POST['terms']))
                {
                    echo'<p style="color: red;">Error!</p>';
                    echo"<script> var email_var = setInterval(function(){generate_alert('Registration not successful check your inputs and accept terms and conditions.', 'info', 'red');}, 1000); 
                    setTimeout(function(){cancel_timed_alert('info', email_var);}, 10000);</script>";
                }
                else
                {
                    echo'<p style="color: red;">Error!</p>';
                    echo"<script> var email_var = setInterval(function(){generate_alert('Registration not successful check your inputs', 'info', 'red');}, 1000); 
                    setTimeout(function(){cancel_timed_alert('info', email_var);}, 10000);</script>";
                }
                
            }

    }
    else{
        echo'<p style="color: red;">Error!</p>';
        echo"<script> var email_var = setInterval(function(){generate_alert('Registration not successful', 'info', 'red');}, 1000); 
        setTimeout(function(){cancel_timed_alert('info', email_var);}, 10000);</script>";
    }

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

                   
                  
                  <form action="" method="POST">
                    <div>
                    <label for="firstname">First Name: </label>
                    <input type="text" 
                    name="firstname" id ="fname" oninput="firstName()" placeholder="Enter your First Name"/>
                    <small><p id="validfname"></p></small>
                </div>
                <div>
                    <label for="middlename">Middle Name: </label>
                    <input type="text" 
                    name="middlename" id ="mname" oninput="middleName()" placeholder="Enter your Middle Name"/>
                    <small><p id="validmname"></p></small>
                </div>
                 <div>
                    <label for="lastname">Last Name: </label>
                    <input type="text" 
                    name="lastname" id ="lname" oninput="lastName()" placeholder="Enter your Last Name"/>
                    <small><p id="validlname"></p></small>
                </div>
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
                <div>
                    <label for="passwordConfirm">Confirm Password: </label>
                    <input type="password" 
                    name="passwordConfirm" id = "pswrdConf" oninput="passWordConfirm()" placeholder="Confirm your Password"/>
                    <small><p id="validPasswrdConfirm"></p></small>
                </div>
                <div class ="inline">
                 <input type="checkbox" name="terms" class="checkbox"/>
                 <small class="tandc">By signing I agree to
                     <a href ="#">Terms and Conditions</a></small>
                </div>
                <div>
                    <input type = "submit" name="user_signup" class="submit" value="Sign Up"/>
                </div>
                <div>
                    <small class="tandc">Already have an account? <a href="index">Sign in here</a></small>
                </div>
                </form>
        </div>
        </div>
    </div>
    <script src="js/backend_alert_controls.js"></script>

    <script>

        function firstName(){
                let fname = document.querySelector("#fname").value;
                let fpattern =   /^[a-zA-Z]{2,20}$/;

                    if(fpattern.test(String(fname).toUpperCase())  == true && !fname.length < 4   ){
                        ftext = "Valid First Name input";
                    } else {
                        ftext = "Input not valid";
                    }
                
                   document.getElementById("validfname").innerHTML = ftext;

            }

             function middleName(){
                let mname = document.querySelector("#mname").value;
                let fpattern =     /^[a-zA-Z]{2,20}$/;

                    if(fpattern.test(String(mname).toUpperCase())  == true && !fname.length < 4   ){
                        ftext = "Valid Middle Name input";
                    } else {
                        ftext = "Input not valid";
                    }
                
                   document.getElementById("validmname").innerHTML = ftext;

            }

            function lastName(){
                let lname = document.querySelector("#lname").value;
                let fpattern =     /^[a-zA-Z]{2,20}$/;

                    if(fpattern.test(String(lname).toUpperCase())  == true && !fname.length < 4   ){
                        ftext = "Valid Last Name input";
                    } else {
                        ftext = "Input not valid";
                    }
                
                   document.getElementById("validlname").innerHTML = ftext;

            }

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

            function passWordConfirm(){
                let password = document.querySelector("#pswrdConf").value;
                let passwordMain = document.querySelector("#pswrd").value;
                let tpattern =  /^(?=[^\s]*?[0-9])(?=[^\s]*?[a-zA-Z])[a-zA-Z0-9]{2,20}$/;
              

                    if(tpattern.test(String(password))  == true  && (passwordMain === password) ){
                        ttext = "Password match";
                    } else {
                            if(tpattern.test(String(password))  != true  && (passwordMain != password) )
                            {
                                ttext = "Password must contain letters and numbers only (20 characters max) and must match Password above";
                   
                            }
                           else if(tpattern.test(String(password))  != true)
                            {
                                ttext = "Password must contain letters and numbers only (20 characters max)";
                            }
                            else if(passwordMain != password)
                            {
                                ttext = "Password Missmatch";
                            }
     
                    }
                
                   document.getElementById("validPasswrdConfirm").innerHTML = ttext;

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
