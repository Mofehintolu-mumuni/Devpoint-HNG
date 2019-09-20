<?php 
session_start();

include"controller_dependency.php";

//instantiate controller class and select apprioprate class
 $obj = factory::DashboardController();

if(isset($_SESSION['ID'])){

  $userData = $obj->GetUserDetails($_SESSION['ID']);

  if($userData['STATUS'] === 'SUCCESS')
  {
    $firstname = $userData['DATA'][0]['FIRSTNAME'];
    $lastname = $userData['DATA'][0]['LASTNAME'];
    $middlename = $userData['DATA'][0]['MIDDLENAME'];
    $email = $userData['DATA'][0]['EMAIL'];
    $regDate = $userData['DATA'][0]['REGDATE'];

    $fullname = $firstname." ".$middlename." ".$lastname;
  }

  if($userData['STATUS'] === 'FAILURE')
  {
   //redirect to login page
   echo("<script>location.href = 'index';</script>");
    header("location: index");
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Landing Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
            <nav class="navbar sticky-top navbar-light bg-light navbar-expand-lg scrolling-navbar justify-content-between">
                    <a class="navbar-brand" href="#"><img src="https://res.cloudinary.com/dy18y8k1e/image/upload/v1568757822/Logo_sfirbx.png" class="mg"></a>
                    <button class="btn btn-primary btn-sm my-0" onclick="logout()" id="logout">Logout</button>
            </nav>
        
        
            <div class="container d-flex flex-column justify-content-center align-items-center">
                <div class="row wow fadeIn devp jumbotron bg-light">
                    <div class="col-md-12 text-center align-items-center">
                        <div class="pic"><img src="https://res.cloudinary.com/dy18y8k1e/image/upload/v1568757798/Welcome_festivity_kvftvk.png"class="img"></div>
                        <h1 class="display-4 font-weight-bold mb-0 pt-md-5 pt-5 ">Welcome to <span class="txt">DevPoint HNG</span></h1>
                        <h3 class="pt-md-5  "><?php echo $fullname; ?></h3>
                        <p class="pt-md-5 pt-sm-2 pt-5 pb-md-5 pb-sm-3 pb-5 ">Your email address is: <?php echo $email; ?></p>
                        <p class="pt-md-5 pt-sm-2 pt-5 pb-md-5 pb-sm-3 pb-5 ">Your date of registration is: <?php echo $regDate; ?></p>
                        <div>
                            <button class="btn btn-primary btn-lg" >Continue to explore DevPoint</button>
                        </div>

                    </div>
                </div>
            </div>
             
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
  function logout()
  {
    window.location = "logout";
        
  }
  </script>
  <?php
    }
    else{
        echo("<script>location.href = 'index';</script>");
        header("location: index");
    }
    ?>
  </body>
</html>