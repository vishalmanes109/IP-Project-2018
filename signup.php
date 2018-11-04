

<!DOCTYPE html>
<html lang="en">
<head>
  <title> RoadSide-Assistant</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
     <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <!-- onlinefonts -->
    <link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
    
    
    <!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

 <link href="https://fonts.googleapis.com/css?family=Raleway:400,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700&amp;subset=latin-ext,vietnamese" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<style>
    
    .bg{
        
        background: url(image/coffee-3047385_1920.jpg);
        background-repeat: no-repeat;
        width: 100%;
        height: 100vh;
          background-size: cover;
    background-position: center;
        filter:blur(5px);
    }
    </style>
    
  
</head>
<body>

    <div class="container-fluid  ">
        <div class="row">        
        <div class="col-md-12 col-sm-12 col-12  ">                   
           <section class="login-wrap">
        <div class="main_w3agile">
            <label  class="tab">Sign Up</label>
            <div class="login-form">
                <!-- signup form -->
                <div class="">
                    <form method="post" action="account.php">
                        <div class="group">
                            <label for="user1" class="label">Username</label>
                            <input  name="username1" id="user1" type="text" class="input" required>
                        </div>
                          <div class="group">
                            <label for="email" class="label">Email Address</label>
                            <input  name="email1" id="email" type="email" class="input" required>
                        </div>
                        <div class="group">
                            <label for="password1" class="label">Password</label>
                            <input  name="password1" id="password1" type="password" class="input" data-type="password" required>
                        </div>
                        <div class="group">
                            <label for="password2" class="label">Re-Enter Password</label>
                            <input id="password2" type="password" class="input" data-type="password" required>
                        </div>
                        <div class="group ">
                            <input type="submit" class="button" value="Sign Up">
                        </div>
                        <div style="text-align:center;">
                        <a href="signin.php">Already Member?</a>
                        </div>
                        <div class="hr"></div>
                    </form>
                </div>
                <!-- //signup form -->
            </div>
        </div>
    </section>
                </div>
            
            </div>    
        </div>
     <script>
        window.onload = function () {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
   
</body>
</html>
