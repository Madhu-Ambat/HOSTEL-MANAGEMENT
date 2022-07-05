<?php
if($_SERVER['REQUEST_METHOD']== "POST"){

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "Hostel";
  $checked = false;

  $userid ="";

  $userid= $_POST['userid'];
  $pwd = $_POST['password'];
  // $password = $_POST['password'];
  // $password=$_POST['password'];

  $conn = new mysqli($servername,$username,$password);

  $sql_getname = "select * from Hostel.admin";

  $result = $conn->query($sql_getname);

  if($result->num_rows > 0){

    while($row = $result->fetch_assoc())
    {

      if(($userid == $row['userid']) && ($pwd == $row['password']))
      {
        $checked = true;

        header('Location: admincontrol.php');
      }else{
        echo "<script>alert('No Access!!!!')</script>";
      }
    }
  }

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="admin.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin: 0 9%; ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">ADMIN</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.html">Home</a>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Login/Sign Up
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

              <li><a class="dropdown-item" href="studentLogin.php">STUDENT</a></li>
              <li>

              </li>
              <li><a class="dropdown-item" href="#">PARENTS/GUARDIAN</a></li>
            </ul>
          </li>

        </ul>

      </div>
    </div>
  </nav>
  <h1>Admin, please enter your credentials to gain access</h1>
  <div class="adminclass flex_container mx-auto  " style="width:50%;">
    <div class="login_container">
      <h2>Login Page</h2>
      <form class="" action="" method="post">
        <input type="text" name="userid" value="" placeholder="Enter admin user id"><br>
        <input type="password" name="password" value="" placeholder="Enter your password "><br>

        <input id="button" type="submit" name="submit" onclick="check()" placeholder="Login" >

      </form>
    </div>
  </div>



<script type="text/javascript">

function check(){
  document.forms[0].setAttribute("action","<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>")
  // document.forms[0].setAttribute("action","mailto:ambatom44@gmail.com");
}

</script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>
