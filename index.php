<?php session_start();  
 require_once("configs/db_config.php");
 // require_once("configs/db_config.php");
  $base_url="cpanel";
  //require_once("library/classes/system_log.class.php");
  
  if(isset($_POST["btnSignIn"])){
    
     $username=trim($_POST["txtUsername"]);
     $password=trim($_POST["txtPassword"]);
     //echo $username," ",$password;
     //$result=$db->query("select u.id,u.username,r.name from {$tx}users u,{$tx}roles r where r.id=u.role_id and u.username='$username' and u.password='$password'");
     $result=$db->query("select u.id,u.full_name,u.password,u.email,u.photo,u.mobile,u.role_id,r.name role from {$tx}users u,{$tx}roles r where r.id=u.role_id and u.name='$username' and u.inactive=0");
      
         
      $user=$result->fetch_object();

      $error_login="";

      if($user && password_verify($password,$user->password)){
        
        $_SESSION["uid"]=$user->id;
        $_SESSION["uname"]=$user->full_name;
        $_SESSION["uphoto"]=$user->photo;
        $_SESSION["email"]=$user->email;
        $_SESSION["mobile"]=$user->mobile; 
        $_SESSION["role_id"]=$user->role_id;
        $_SESSION["urole"]=$user->role;

        header("location:home");
      }else{
        $error_login= "<div style='background-color:azure; text-align:center;'><h1 style='color:red'>Incorrect username or password</h1></div>";
      }
        
        
        
         //  $now=date("Y-m-d H:i:s");
        //  $log=new System_log("","LOGIN","Successfully logged in user : $uid-$_username",$now);
        //  $log->save();

               
  
    }

?>

<!-- <div style='background-color:azure; text-align:center;'><h1 style="color:red">Incorrect username or password</h1></div> -->


<!doctype html>
<html lang="en">

    

<head>

        <meta charset="utf-8" />
        <title>Login | Fahad Medical Store - Admin & Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/Raqeebul Fahim.png"> 
        
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body style="background-color:bisque; background-image: url('Fahad Medical Store.jpg'); backdrop-filter: blur(8px);">
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="card-body pt-0">

                                <h3 class="text-center mt-5 mb-4">
                                    <a href="<?php global   $base_url; echo $base_url?>/home" class="d-block auth-logo">
                                        <img src="assets/images/Raqeebul Fahim.png" alt="" height="80" class="auth-logo-dark">
                                        <img src="assets/images/Raqeebul Fahim.png" alt="" height="80" class="auth-logo-light">
                                    </a>
                                </h3>

                                <div class="p-3">
                                    <h4 class="text-muted font-size-18 mb-1 text-center">Welcome Back !</h4>
                                    <p class="text-muted text-center"> <b>Sign in to continue to Pharmacy Management ERP.</b></p>
                                    <form class="form-horizontal mt-4" action="#" method="post">
                                        <div class="mb-3">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="txtUsername" id="txtUsername" placeholder="Enter username">
                                        </div>
                                        <div class="mb-3">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control"  name="txtPassword" id="txtPassword" placeholder="Enter password">
                                        </div>
                                        <div class="mb-3 row mt-4">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customControlInline">
                                                    <label class="form-check-label" for="customControlInline">Remember me
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button class="btn btn-primary w-md waves-effect waves-light" name="btnSignIn" type="submit">Log In</button>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 row">
                                            <div class="col-12 mt-4">
                                                <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                    echo  $error_login ?? "";
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>Don't have an account ? <a href="pages-register.html" class="text-primary"> Signup Now </a></p>
                            © <script>document.write(new Date().getFullYear())</script> Fahad Medical Store <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Raqeebul Hasan Fahim.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <!-- App js -->
        <script src="assets/js/app.js"></script>
    </body>



</html>