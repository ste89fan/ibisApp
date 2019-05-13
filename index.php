<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ibis Graphicon</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel="stylesheet" href="path/to/easy-autocomplete.min.css">  -->
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css" />
    
</head>
<body>
    
    <?php

        if(session_id()==="" ) {
            session_start();
        }

        include_once("users_model/userLogin.php");

        $userValidate = new UserLog();
        $userValidate->CheckUserSessionData();

        if(ISSET($_POST["username"],$_POST["password"])) {

                $userValidate->Login();    
        }
        
        ?>

        <div class="form-wraper d-flex justify-content-center align-items-center">
            <form action="" method="POST">       
                <div class="mb-3">
                    <input type="text" name="username" id="username" placeholder="Username" class="log-field text-center" required>
                </div>        
                <div class="mb-3 form-group-pass">
                    <input type="password" name="password" id="password" placeholder="Password" class="log-field text-center" required><i class="fas fa-eye"></i>
                </div>
                <div class="text-center">
                    <button type="submit" id="login-button" class="btn btn-sm login-button w-100">Login</button>
                </div>                                          
            </form>
        </div>

        <!-- <script src="path/to/jquery.easy-autocomplete.min.js"></script> -->
    <script src="node_modules/jquery/jquery.min.js"></script> 
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src='js/main.js'></script>
</body>
</html>