<?php
$levels = 0;
$filepath = realpath(dirname(__FILE__));
include_once "models/Session.php";
Session::init();
spl_autoload_register(function($models){

  include 'models/'.$models.".php";

});
Session::CheckLogin();
$users = new Users();
?>


<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
   $userLog = $users->userLogin($_POST);
}
if (isset($userLog)) {
  echo $userLog;
}

$logout = Session::get('logout');
if (isset($logout)) {
  echo $logout;
}



 ?>

<div class="card ">
  <div class="card-header">
          <h3 class='text-center'><i class="fas fa-sign-in-alt mr-2"></i>User login</h3>
        </div>
        <div class="card-body">
            <div style="width:450px; margin:0px auto">
            <form action="" method="post">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email"  class="form-control">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password"  class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" name="login" class="btn btn-success">Login</button>
                </div>
            </form>
          </div>


        </div>
      </div>



  <?php
  include 'include/footer.php';

  ?>
