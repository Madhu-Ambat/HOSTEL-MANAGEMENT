<?php


$servername= "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername,$username,$password);

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $idtoremove =$_POST["clgid"];
  $rmsql = "delete from Hostel.student where clgid ="."\"$idtoremove\"";


  if($conn->query($rmsql)){
    echo "<script>alert('Record deleted successfully');</script>";
  }


}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Adim:pannel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style type="text/css">

    th{
      border:2px solid black;
      background-color: rgba(0,0,0,0.7);
      color: white;
    }
      td{
        border:2px solid black;
        background-color: rgba(0,0,0,0.4);
        color: white;
      }
      table{
        margin:1rem auto;
        width:70%;
      }
      .stdclist{
        width:100%;

      }

    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin: 0; ">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">ADMIN PANNEL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">Home</a>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Controls
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="register.php">REGISTER STUDENT</a></li>
                <li><a class="dropdown-item" href="roomControl.php">ROOM ALLOCATION</a></li>
                <li><a class="dropdown-item" href="viewComplaint.php">VIEW COMPLAINTS</a></li>
                <li><a class="dropdown-item" href="checkouts.php">PERMISSION BLOCK</a></li>
                <li><a class="dropdown-item" href="billgen.php">PROVIDE MENUBILL</a></li>
                <li><a class="dropdown-item" href="admin.php">LOGOUT...</a></li>

              </ul>
            </li>

          </ul>

        </div>
      </div>
    </nav>

    <div class="">

    </div>
    <div class="viewStudents mx-auto" style="width:90%; text-align:center;">
      <h1>Students in your hostel</h1>
      <?php
      $sql = "select * from Hostel.student";
      $result = $conn->query($sql);
        if($result->num_rows > 0){

          echo "<table class='stdlist' ><tr> <th>COLLEGE ID</th> <th>First Name</th> <th>Second Name</th> </tr>";

          while($row = $result->fetch_assoc() ){
            echo "<tr> <td>".$row['clgid']."</td> <td>".$row['fname']."</td> <td>".$row['sname'] ."</td> </tr>";
          }
          echo "</table>";
        }

       ?>

    </div>
    <div class="viewtable mx-auto" style="width:100%; text-align:center;">
      <h1>Table of students info</h1>
      <?php
      $sql = "select * from Hostel.student";
      $result = $conn->query($sql);
        if($result->num_rows > 0){

          echo "<table class='stdclist' ><tr>  <th>First Name</th> <th>Second Name</th>
          <th>Father Name</th> <th>Mother Name</th> <th>College</th> <th>Branch</th> <th>AADHAR </th> <th>Caste</th>
          <th>Mobile</th> <th>Email</th> <th>Address</th>   </tr>";

          while($row = $result->fetch_assoc() ){
            echo "<tr>  <td>".$row['fname']."</td> <td>".$row['sname'] ."</td>
            <td>".$row['father'] ."</td> <td>".$row['mother'] ."</td> <td>".$row['college'] ."</td> <td>".$row['branch'] ."</td>
            <td>".$row['aadhar'] ."</td> <td>".$row['caste'] ."</td> <td>".$row['mobile'] ."</td> <td>".$row['email'] ."</td>
            <td>".$row['address'] ."</td>  </tr>";
          }
          echo "</table>";
        }

       ?>
    </div
    <div class="removestudents " style="width:90%; text-align:center;">
      <h1>Remove Student</h1>

      <form class="remove" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <input type="submit" name="remove_btn" value="remove" >
        <input type="text" name="clgid" value=""  placeholder="Enter the ID ">

      </form>

    </div>
    <script type="text/javascript">

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
