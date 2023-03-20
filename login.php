<?php 
include('header.php');
include_once('database_utilities.php');

$allFields = true;
$UserErr = $passwordErr = "";

if (isset($_POST['submit'])){
  if ($_POST['username']=="")
  {
    $UserErr = "Please Enter a Username";
    $allFields = false;
  }
  if ($_POST['password']=="")
  {
    $passwordErr = "Please Enter a Password"; 
    $allFields = false;
  }
  if($allFields){
    $success = LogIn();
    if($success){
      echo "yay";
    }
    if(!$success){
      echo "noooo";
    }
  }
}
?>

<body class="bg-light">
    <div class="bg-light p-3 mx-auto my-5 p-5" style="max-width: 500px; border-radius: 10px;">
      <h3 class="text-center font-weight-bold font-italic">Login</h3>
      <form method="post">
        <div class="form-group mt-3">
          <label class="control-label mb-1 ps-1">Username</label>
          <input type="text" class="form-control" name="username">
          <span class="text-danger fw-light"><?php echo $UserErr;?></span>
        </div>

        <div class="form-group mt-3">
          <label class="control-label mb-1 ps-1">Password</label>
          <input class="form-control" type="password" name="password">
          <span class="text-danger fw-light"><?php echo $passwordErr;?></span>
        </div>
        
        <div class="mt-3 mb-3">
          <input class="btn btn-primary w-100" type="submit" value="Login" name="submit">
        </div>

      </form>
    </div>
  </body>
</html>
    

<?php 
include('footer.php');
?>