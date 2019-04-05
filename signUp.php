<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<?php 
	session_start();
    if(isset($_POST["username"]) and isset($_POST["pass"]) and isset($_POST["fname"])  and isset($_POST["lname"]) and isset($_POST["dob"]) and isset($_POST["city"]) and isset($_POST["email"]))
	{
        
    
        if (isValidEmail($_POST["email"]))
        {
            $_SESSION["username"]=$_POST["username"];
            $_SESSION["pass"]=$_POST["pass"];
            $_SESSION["fname"]=$_POST["fname"];
            $_SESSION["lname"]=$_POST["lname"];
            $_SESSION["dob"]=$_POST["dob"];
            $_SESSION["city"]=$_POST["city"];
            $_SESSION["email"]=$_POST["email"];
            include "signupquery.php"; 
        }
        else
        {
            echo "<script>alert('Please enter a proper email!!');</script>";
        }
		 
	}

    function isValidEmail($email)
    {
           //Perform a basic syntax-Check
           //If this check fails, there's no need to continue
           if(!filter_var($email, FILTER_VALIDATE_EMAIL))
           {
                   return false;
           }
    
           //extract host
           list($user, $host) = explode("@", $email);
           //check, if host is accessible
           if (!checkdnsrr($host, "MX") && !checkdnsrr($host, "A"))
           {
                   return false;
           }
    
           return true;
    }

	?>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('image/chatri.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50" >
				<span class="login100-form-title p-b-41">
					Account Sign Up
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="wrap-input100 validate-input" data-validate = "Enter first name">
						<input class="input100" type="text" name="fname" placeholder="First Name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Enter last name">
						<input class="input100" type="text" name="lname" placeholder="Last Name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter city">
						<input class="input100" type="text" name="city" placeholder="City">
						<span class="focus-input100" data-placeholder="&#127968;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter date of birth">
						<input class="input100" type="date" name="dob" placeholder="Date Of Birth">
						<span class="focus-input100" data-placeholder="&#x1F4C6;"></span>
					</div>
                    
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input" data-validate="Enter proper email">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="@"></span>
					</div>
					<div class="container-login100-form-btn m-t-32">
						<input type="submit" id="submit" name="submit" value="Sign Up" class="login100-form-btn">  
					</div>
	

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!-- <script src="js/main.js"></script> -->
	<script>


	$('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })

    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).addClass('active');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).removeClass('active');
            showPass = 0;
        }
        
    });

	
	
	</script>

</body>
</html>