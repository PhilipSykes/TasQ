<?php 
include('header.php');
include_once('database_utilities.php');

$allFields = true;
$emailErr = $nameErr = $UserErr = $passwordErr = "";

if (isset($_POST['submit'])){
    if ($_POST['fname']=="")
    {
        $nameErr = "This field is required";
        $allFields = false;
    }
    if ($_POST['lname']=="")
    {
        $nameErr = "This field is required";
        $allFields = false;
    }
    if ($_POST['username']=="")
    {
        $UserErr = "Please Enter a Username";
        $allFields = false;
    }
    if ($_POST['email']=="")
    {
        $emailErr = "Please Enter an Email";
        $allFields = false;
    }
    if ($_POST['password']=="")
    {
        $passwordErr = "Please Enter a Password";
        $allFields = false;
    }
    if($allFields){
        $success = createUser();
    }
}

?>

<body class="bg-light">
    <div class="bg-light p-3 mx-auto my-5 p-5" style="max-width: 500px; border-radius: 10px;">
      <h3 class="text-center font-weight-bold font-italic">Create Account</h3>

      <form method="post">
        
        <label class="control-label mb-1 ps-1">Name</label>
        <div class="form-row d-flex">
          <div class="col me-1">
            <input type="text" class="form-control" name="fname" placeholder="First name">
          </div>
          <div class="col ms-1">
            <input type="text" class="form-control" name="lname" placeholder="Last name">
          </div>
        </div>
        <span class="text-danger mb-3 fw-light"><?php echo $nameErr;?></span>

        <div class="form-group mt-3">
          <label class="control-label mb-1 ps-1">Username</label>
          <input type="text" class="form-control" name="username">
          <span class="text-danger fw-light"><?php echo $UserErr;?></span>
        </div>

        <div class="form-group mt-3">
          <label class="control-label mb-1 ps-1">Email</label>
          <input type="text" class="form-control" name="email">
          <span class="text-danger fw-light"><?php echo $emailErr;?></span>
        </div>

        <div class="form-group mt-3">
          <label class="control-label mb-1 ps-1">Password</label>
          <input class="form-control" type="password" name="password">
          <span class="text-danger fw-light"><?php echo $passwordErr;?></span>
        </div>
        
        <div class="mt-3 mb-3">
          <input class="btn btn-primary w-100" type="submit" value="Sign Up" name="submit">
        </div>
      </form>
    </div>
  </body>
</html>
    

<?php 
include('footer.php');
?>