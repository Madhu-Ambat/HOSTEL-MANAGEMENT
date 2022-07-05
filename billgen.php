
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bill Generator</title>
  </head>
  <style type="text/css">
    body{
      text-align: center;
      padding:1% 10%;
    }

    .novice{
      background-color: rgba(0,0,0,0.8);
      padding: 1rem 2rem;
      color:white;
    }

    .stdSearch{
      margin-top: 0.5rem;
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
        width:50%;
      }
      .writing{
        height:600px;
        width:100%;
        background-color: #D3EBCD;
        text-align: center;
        padding: 1%;
        box-sizing: border-box;

      }
  </style>
  <body>
<div class="novice">
  <h1>HOSTEL INVOICE GENERATOR </h1>
  <button type="button" name="Pannel"><a href="admincontrol.php">Pannel</a> </button>
</div>
<div class="billing">
  <hr>
  <hr>
  <form class="stdSearch" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <label for="clgid"> Student ID :</label>
    <input type="text" name="clgid" value="" placeholder="Enter student ID">
    <input type="submit" name="stdin" value="stdin">
  </form>
  <hr>
  <hr>
</div>
<div class="writing">

  <?php

  if($_SERVER["REQUEST_METHOD"]=="POST")
  {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $student = "";

    $billroom = $billfname = $billsname = $billcollege = $billbranch=$billmobile=$billemail="";

    $conn = new mysqli($servername,$username,$password);
    $key =$_POST["clgid"];
    if($key  !== "")
    {
      $student = $_POST['clgid'];
      $sql = "select s.clgid, r.room, s.fname,s.sname,s.college,s.branch,s.mobile,s.email from Hostel.student s left outer join Hostel.rooms r on s.clgid = r.clgid "."where s.clgid = "."\"$student\""." ORDER BY r.room asc";
      $result = $conn->query($sql);

      $row = $result->fetch_assoc();

      $billroom = $row['room'];
      $billfname = $row['fname'];
      $billsname = $row['sname'];
      $billcollege = $row['college'];
      $billbranch = $row['branch'];
      $billmobile = $row['mobile'];
      $billemail = $row['email'];

      echo "<table>";
      echo "<tr>
        <td>College ID</td><td>$student</td>
      </tr>";
      echo "<tr>
        <td>Name</td><td>$billfname $billsname</td>
      </tr>";
      echo "<tr>
        <td>Room</td><td>$billroom</td>
      </tr>";
      echo "<tr>
        <td>College</td><td>$billcollege</td>
      </tr>";
      echo "<tr>
        <td>Branch</td><td>$billbranch</td>
      </tr>";
      echo "<tr>
        <td>Mobile</td><td>$billmobile</td>
      </tr>";
      echo "<tr>
        <td>Email</td><td>$billemail</td>
      </tr>";

      echo "</table>";
      $conn->close();
    }
  }
   ?>
  <fieldset>
    <legend>Billing</legend>
    <form class="billamount" action="getbill.php" method="post">

      <table>
        <input type="text" id = "who" name="clgid" value="">
        <tr>
          <td>  <label for="iteFood">Food : </label></td> <td><input type="text" name="itemFood" value="" placeholder="Amount"></td>
        </tr>
        <tr>
          <td><label for="iteWater">Water : </label></td><td><input type="text" name="itemWater" value="" placeholder="Amount"> </td>
        </tr>
        <tr>
          <td><label for="iteElectricity">Electricity : </label></td><td><input type="text" name="itemElectricity" value="" placeholder="Amount"></td>
        </tr>
        <tr>
          <td><label for="iteSecurity">Security : </label></td><td><input type="text" name="itemSecurity" value="" placeholder="Amount"> </td>
        </tr>
        <tr>
          <td><label for="iteM">Extraa : </label></td><td><input type="text" name="itemM" value="" placeholder="Amount"> </td>
        </tr>
      </table>
      <input type="submit" name="submit" value="Billapproved">

    </form>
  </fieldset>


</div>
<script type="text/javascript">
var towhom = "<?php echo $student; ?>";

document.getElementById("who").setAttribute('value',towhom);

</script>
  </body>
</html>
