<?php

$server = "localhost";
$username="root";
$password="";
if($_SERVER["REQUEST_METHOD"]=="POST" )
{

  $conn = new mysqli($server,$username,$passord);


  $stayerid = $room = $key="" ;

  $key = $_POST['submit'];
  $stayerid = $_POST['stayer'];
  $room =$_POST['room'];


  if($key == "in" && $stayerid != "" && $room !="")
  {
    $sqlin = "insert into Hostel.rooms values('$stayerid','$room',CURRENT_TIMESTAMP)";
    if($conn->query($sqlin)){
      echo "<script>alert('Room Allocated');</script>";
    }

  }
  if($key == "out" && $stayerid !="" && $room !="")
  {
    $sqlout = "delete from Hostel.rooms where clgid ="."\"$stayerid\"";
    if($conn->query($sqlout)){
      echo "<script>alert('Room Freed');</script>";
    }

  }

  $conn->close();

}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Rooms Allocation</title>
    <style type="text/css">
    body{
      margin:0;
    }

    .header{

      border: 2px solid black;
      background-color: rgba(0,0,0,1);
      border-bottom-left-radius: 1%;
      border-bottom-right-radius: 1%;

    }
    .pageTag{
      color:rgba(255,255,255,0.8);
      margin-left: 0.5rem;
      display: inline-block;
    }
    .back{
      text-decoration: none;
      color:rgba(255,255,255,0.8);
      float: right;
      margin-top: 1.5%;
      margin-right: 2%;
      padding:0.5% 1%;
      border: 1px solid white;
      border-radius: 5%;

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
    input{
      margin: 1rem 0.5rem;
      padding:0.5rem 1rem 0.5rem 0;
      background-color: rgba(0,0,0,0);
      border:none;
      border-bottom: solid 2px white;
      color:white;
      border-right: solid 2px white;
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


    </style>
  </head>
  <body>

    <div class="header">

      <h1 class="pageTag">ROOM ALLOCATION</h1>
      <a  class = "back" href="admincontrol.php"><=Back To Panel</a>

    </div>
    <div class="content">
      <div class="allocated">
         <table><tr> <th> COLLEGE ID</th> <th>ROOM</th> <th>DATE & TIME</th></tr>

           <?php

           $conn = new mysqli($server,$username,$password);
           // if($conn->connect_error){echo "NO Connection";}
           // else{echo "Connection OK";}
           $sqltb = "select * from Hostel.rooms";
           $result = $conn->query($sqltb);
           if($result->num_rows>0){
             while($row = $result->fetch_assoc()){
               echo "<tr> <td>".$row['clgid']."</td><td>".$row['room']."</td><td>".$row['date_and_time']."</td> </tr>";
             }
           }
            ?>

       </table>

      </div>
      <div class="register">

        <form class="" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
          <h1 style="color:white;">Allocate Room:</h1><br>
          <input  type="text" name="stayer" value="" placeholder="Student's College ID">
          <input  type="text" name="room" value="" placeholder="Room Number">
          <input type="submit" name="submit"value="in" formmethod="post">
        </form>

        <form class="" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
          <h1 style="color:white;">Free Room:</h1><br>
          <input  type="text" name="stayer" value="" placeholder="Student's College ID">
          <input  type="text" name="room" value="" placeholder="Room Number" >
          <input type="submit" name="submit" value = "out" formmethod="post">
        </form>

      </div>

    </div>

  </body>
</html>
