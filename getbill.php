<?php

 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
   $servername = "localhost";
   $username = "root";
   $password = "";
   $flag = true;

   $conn = new mysqli($servername,$username,$password);
   $clgid = $_POST["clgid"];
   $itemFood = $_POST["itemFood"];
   $itemWater = $_POST["itemWater"];
   $itemElectricity = $_POST["itemElectricity"];
   $itemSecurity = $_POST["itemSecurity"];
   $itemM = $_POST["itemM"];
   $total =$itemFood+$itemWater+$itemElectricity+$itemSecurity+$itemM;

   $sqlcheck = "select clgid from Hostel.BillAccount";
   $res = $conn->query($sqlcheck);
   if($res->num_rows >0)
   {
     while($row = $res->fetch_assoc())
     {
       if($row['clgid'] == $clgid){$flag = false;}
     }
   }
   if($flag){
     $sqlbill = "insert into Hostel.BillAccount values ('$clgid','$itemFood','$itemWater','$itemElectricity','$itemSecurity','$itemM','$total')";
     $conn->query($sqlbill);

   }


 }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bill</title>
    <style type="text/css">
      .bill{

        width:50%;
        padding:2% 4%;
        text-align: center;
        margin:1rem auto;
        background-color: rgba(0,0,0,0.7);

      }
      .to{

        width:50%;
        padding:2% 4%;
        text-align: left;
        margin:1rem auto;
        border: 1px sold black;
        font-size: 1.5rem;

      }
    </style>
  </head>
  <body>
    <div class="bill">
          <h1> THE HOSTEL IN VOICE </h1>
    </div>
    <div class="to">
      <?php
      if($flag){
      $sql = "select s.clgid, r.room, s.fname,s.sname,s.college,s.branch,s.mobile,s.email from Hostel.student s left outer join Hostel.rooms r on s.clgid = r.clgid "."where s.clgid = "."\"$clgid\""." ORDER BY r.room asc";

      $result = $conn->query($sql);

      $row = $result->fetch_assoc();

      echo "To,<br>".$row['fname']." ".$row['sname']."<br>".$row['clgid'].", ".$row['college']."<br>".$row['mobile'];
      echo "<br />".$row['email'];

      echo "<br> <h3><hr />Billing<hr /></h3>";
      echo "<table>";
      echo "<tr> <th>Item</th> <th> Amount</th></tr>";
      echo "<tr> <td>Food</td> <td>".$itemFood."</td></tr>";
      echo "<tr> <td>Water</td> <td>".$itemWater."</td></tr>";
      echo "<tr> <td>Electricity</td> <td>".$itemElectricity."</td></tr>";
      echo "<tr> <td>Security</td> <td>".$itemSecurity."</td></tr>";
      echo "<tr> <td>Miscellaneous</td> <td>".$itemM."</td></tr>";
      echo "<tr><th>Total</th> <th>".$total."</th><tr>";

      echo "</table>";
      $conn->close();
    }
       ?>

    </div>



  </body>
</html>
