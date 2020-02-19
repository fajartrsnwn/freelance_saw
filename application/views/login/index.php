<!DOCTYPE html>  
<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {
  $username = ($this->session->userdata['logged_in']['user_username']);
  $email = ($this->session->userdata['logged_in']['user_email']);

  $page = base_url();
  header("location: ".$page."dashboard"); 
}
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/admin/plugins/images/favicon.png">
	<title>Login Page Administrator</title>
	<!-- Bootstrap Core CSS -->
	<link href="<?php echo base_url(); ?>assets/admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- animation CSS -->
	<link href="<?php echo base_url(); ?>assets/admin/css/animate.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?php echo base_url(); ?>assets/admin/css/style.css" rel="stylesheet">
	<!-- color CSS -->
	<link href="<?php echo base_url(); ?>assets/admin/css/colors/blue.css" id="theme"  rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
	<style type="text/css">
	/* Login- register pages */
	.login-register {
		background: url(<?php echo base_url(); ?>assets/admin/plugins/images/login-register.jpg) no-repeat center center / cover !important;
		height: 100%;
		position: fixed;
	}
</style>
<!-- Preloader -->
<div class="preloader">
	<div class="cssload-speeding-wheel"></div>
</div>
 <section id="wrapper" class="login-register">
    <div class="login-box login-sidebar">
      <div >
        <div class="new-login-box">
          <div class="white-box">
            <h3 class="box-title m-b-0">Sign In to Admin Page</h3>
            <small>Enter your details below</small>

            <div class="form-horizontal new-lg-form" id="loginform">
              <?php echo form_open('login/process'); ?>
              
              <?php
              echo "<div class='error_msg'>";
                if (isset($error_message)) {
                echo $error_message;
              }
              echo validation_errors();
            echo "</div>";
            ?>  
            <div class="form-group  m-t-20">
              <div class="col-xs-12">
                <label>Username</label>
                <input class="form-control" type="text" required="" name="user_username" placeholder="Username">
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12">
                <label>Password</label>
                <input class="form-control" type="password" required="" name="user_password" placeholder="Password">
              </div>
            </div>
             <div class="form-group">
              <div class="col-xs-12">
                <label>Role</label>
                <select name="role" class="form-control">
                  <option value="1">Administrator</option>
                  <option value="2">Panitia</option>
                </select>
              </div>
            </div>
     
              <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                  <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" name="submit" type="submit">Log In</button>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                </div>
              </div>
              <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                  <p>Don't have an account? <a data-toggle="tooltip" data-placement="top" title="If you dont have an account, please contact the Administrator" href="#" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                </div>
              </div>
            </form>
            <form class="form-horizontal" id="recoverform" action="index.html">
              <div class="form-group ">
                <div class="col-xs-12">
                  <h3>Recover Password</h3>
                  <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                </div>
              </div>
              <div class="form-group ">
                <div class="col-xs-12">
                  <input class="form-control" type="text" required="" placeholder="Email">
                </div>
              </div>
              <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                  <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                </div>
              </div>
            </div>
          </div>
        </div>      
      </div>
    </section>
		<!-- jQuery -->
		<script src="<?php echo base_url(); ?>assets/admin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url(); ?>assets/admin/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- Menu Plugin JavaScript -->
		<script src="<?php echo base_url(); ?>assets/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

		<!--slimscroll JavaScript -->
		<script src="<?php echo base_url(); ?>assets/admin/js/jquery.slimscroll.js"></script>
		<!--Wave Effects -->
		<script src="<?php echo base_url(); ?>assets/admin/js/waves.js"></script>
		<!-- Custom Theme JavaScript -->
		<script src="<?php echo base_url(); ?>assets/admin/js/custom.min.js"></script>
		<!--Style Switcher -->
		<script src="<?php echo base_url(); ?>assets/admin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
	</body>
	</html>
