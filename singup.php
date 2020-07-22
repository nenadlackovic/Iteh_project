<?php
include("menu.php");
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
</head>
<body>


<div class="position-relative overflow-hidden p-3 p-md-5   text-center bg-light">


<section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" pattern="\w+" required placeholder="Your Name"/>
                            </div>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Password"/>
                            </div>

                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass"  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Repeat your password"/> 
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

<script>
function add_user(){
  var name = document.getElementById("register-form").elements[0].value;
  var email = document.getElementById("register-form").elements[1].value;
  var pass = document.getElementById("register-form").elements[2].value;
  var pass2 = document.getElementById("re_pass").value;

  if(pass != pass2){
    alert("Password don't match!");
    return;
  }

fetch('http://localhost:3000/users', { 
  method: 'GET'
})
.then(function(response) { return response.json(); })
.then(function(json) {
    
    var userStr = JSON.stringify(json);
    
    JSON.parse(userStr, (key, value) => {
    if (key == 'Username') {
        if(value == name){
            alert("Username already exists!");
            return;
        }
  }
    if (key == "Email"){
      if(value == email){
        alert("Email already exists!");
        return;
      }
  }
});

});


fetch(`http://localhost:3000/users`, {
  method: 'post',
  headers: {
    "Content-type": "application/json"
  },
  body: JSON.stringify({ "Username": name, "Password": pass ,"Email":email, Uloga:"Korisnik" }) 
})
.then(res => res.json())
.then(data => obj = data)
.then( function asd(){
    if (obj.statusCode){
        alert("Error!");
    }else{
        alert("Registration successful!");
    }
} );



}



</script>



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