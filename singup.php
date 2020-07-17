<?php
include("menu.php");
$msg = '';

if (isset($_POST['signup'])) {
    $fName = $_POST['field_username'];
    $fEmail        = $_POST['email']; 

    
    $json_string = file_get_contents('http://localhost:3000/users');
    $parsed_json = json_decode($json_string, true);

    $len = sizeof($parsed_json);

    foreach ($parsed_json as $value){         
        if ($fName == $value["Username"]){
                $msg="Username already exists";
                break;
            }  
        else if ($fEmail == $value["Email"]){
                    $msg="Email already exists";
                    break;
                }
       }   
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link href="css/register.css" rel="stylesheet">
    <script type="text/javascript" src="js/signup.js"></script>
</head>
<body>


<div class="position-relative overflow-hidden p-3 p-md-5   text-center bg-light">

<p id="demo"></p>

<section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="myForm">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="field_username" id="field_username" pattern="\w+" required placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" required placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pwd1" id="field_pwd1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="pwd2" id="field_pwd2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required placeholder="Repeat your password"/>
                            </div>

                            <div class="form-group">
                                <?php
                                    if($msg!=''){
                                        echo("<h5> ".$msg."</h5>");
                                    }
                                ?>
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" onclick="add_user(); " value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="img/singup.png" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>
        
</div>




    <script src="https://code.jquery.com/jquery-2.1.3.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

  <?php
include("footer.php");
?>
</body>
</html>