<?php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername,$username,$password);
$clgid = $reason = "";


if($_SERVER['REQUEST_METHOD'] == 'POST' )
{
  $clgid = $_POST['clgid'];
  $reason = $_POST['reason'];
  if($clgid != "" && $reason != "")
  {
    $sqlout = "insert into Hostel.CheckOut values('$clgid',CURRENT_DATE,CURRENT_TIME,'$reason')";
    if($conn->query($sqlout))
    {echo "<script>alert('Checked Out')</script>";}


  }

  if($clgid != "" && $reason == "")
  {
    $sqlin = "insert into Hostel.CheckIn values('$clgid',CURRENT_DATE,CURRENT_TIME)";
    if($conn->query($sqlin))
    {echo "<script>alert('Checked In')</script>";}
  }


}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LOG BOOK</title>
    <style type="text/css">
      .header{
        background-color: black;
        color:white;
        text-align: center;
        padding:2%;
        width:90%;
        margin-left:auto;
        margin-right:auto;

      }
      body{
        background-color: rgba(0,0,0,0.4);
      }
      .content{
        display:flex;
      }
      .allocated{
        width:45%;
        height:500px;
        border: 2px solid black;
        background-color: rgba(255,255,255,0.7);
        margin:2%;
        overflow: scroll;
        box-sizing:border-box;


      }
      .register{
        width:45%;
        height: 500px;
        border: 2px solid black;
        background-color: rgba(0,0,0,0.8);
        display: inline-block;
        margin: 2%;
        box-sizing:border-box;
        padding:2rem;
      }

      th{
        border:2px solid black;
        background-color: rgba(0,0,0,0.9);
        color: white;
      }
        td{
          border:2px solid black;
          background-color: rgba(0,0,0,0.6);
          color: white;
        }
        table{
          margin:1rem auto;
          width:70%;
        }
        .container{
          margin:2.5rem;
          text-align: center;
        }
        input{
          margin-top: 0.5rem;
          margin-bottom:0.5rem;
        }


    </style>
  </head>
  <body>

    <div class="header">
      <h1>LOG BOOK</h1>

    </div>
    <div class="container">
      <div class="">
        <form class="" action=" <?php htmlspecialchars($_SERVER["PHP_SELF"]) ?> ">
          <label for="clgid"></label> <input type="text" name="clgid" value="" placeholder="Student ID"><br>
          <label for="reason"></label> <input type="text" name="reason" value="" placeholder="WHY ?"><br>
          <input style="background-color:red; color:white; padding:1%; margin-right:2rem;" type="submit" name="checkout" value="CheckOut" formmethod="post" >
          <input style="background-color:green; color:white; padding:1%; margin-left:2rem;" type="submit" name="checkin" value="CheckIn" formmethod="post">
        </form>
      </div>
      <div class="table">
        <a  class = "back" href="admincontrol.php"><=Back To Panel</a>
        <?php

        $sqltab = "select o.clgid, o.doi, o.tol,o.reason, i.toe from Hostel.CheckOut as o left outer join Hostel.CheckIn as i on o.clgid = i.clgid";
        $result = $conn->query($sqltab);
        if($result->num_rows>0)
        {
          echo "<table><tr> <th>College ID</th><th> Date of Incident</th><th> Time of Leaving</th><th> Reason</th><th> Time of Entry</th> </tr>";
          while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row['clgid']."</td><td>".$row['doi']."</td><td>".$row['tol']."</td>
            <td>".$row['reason']."</td><td>".$row['toe']."</td></tr>";
          }
          echo "</table>";
        }

         ?>
      </div>

    </div>

  </body>
</html>
