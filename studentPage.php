<?php
session_start();


  $servername = "localhost";
  $username = "root";
  $password = "";
  $complaint = $_POST['message'];
  $conn = new mysqli($servername,$username, $password);
  $clgid = $_SESSION['regName'];
  $row="";
  $sqlOne = "select s.clgid, s.fname,s.sname,s.father,s.mother,s.college, s.branch, s.mobile, s.email, r.room, r.date_and_time from Hostel.student as s inner join Hostel.rooms as r
   where s.clgid="."\"$clgid\"".";";
   $result = $conn->query($sqlOne);

   $row = $result->fetch_assoc();
   $fname = $row['fname'];
   $sname = $row['sname'];
   $mobile = $row['mobile'];
   if($_SERVER['REQUEST_METHOD'] == "POST" && $complaint != 0 )
   {
     $sqlThree = "insert into Hostel.ComplaintBox values('$clgid','$fname','$sname','$mobile','$complaint',CURRENT_TIMESTAMP)".";";
     echo $sqlThree;

     $result= $conn->query($sqlThree);
     echo "$result";
   }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student</title>
    <style type="text/css">
    body{
      margin: 0 5rem;
    }
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
    <h1 style="text-align:center;">Student Page</h1>
    <div class="stdinfo">
      <fieldset>
        <legend>Student's Personal Information</legend>
        <table class="studentDetails">
          <tr>
            <td>COLLEGE ID </td><td>:- <span id= "clgID"></span> <?php echo $row['clgid']; ?> </td>
          </tr>
          <tr>
            <td>NAME </td><td>:- <span id= "IDname"> <?php echo $row['fname'].$row['sname']; ?>  </span></td>
          </tr>
          <tr>
            <td>FATHER </td><td>:- <span id= "IDfather"><?php echo $row['father']; ?> </span></td>
          </tr>
          <tr>
            <td>MOTHER </td><td>:- <span id= "IDmother"><?php echo $row['mother']; ?> </span></td>
          </tr>
          <tr>
            <td>COLLEGE </td><td>:- <span id= "IDclg"><?php echo $row['college']; ?> </span></td>
          </tr>
          <tr>
            <td>Branch </td><td>:- <span id= "IDbranch"><?php echo $row['branch']; ?> </span></td>
          </tr>
          <tr>
            <td>MOBILE </td><td>:- <span id= "IDmob"><?php echo $row['mobile']; ?> </span></td>
          </tr>
          <tr>
            <td>EMAIL </td><td>:- <span id= "IDmail"><?php echo $row['email']; ?> </span></td>
          </tr>
        </table>
      </fieldset>
    </div>
    <div class="Room Alloted">
      <fieldset>
        <legend>Room</legend>
        <table class="Room">
          <tr>
            <td>Room Number</td> <td>:<span id ="IDroom"><?php echo $row['room']; ?></span>  </td><td><?php echo $row['date_and_time']; ?></td>
          </tr>
        </table>
      </fieldset>
    </div>
    <div class="Due BillS">
      <fieldset>
        <legend>Bills</legend>
        <?php
        $sqlTwo = "select Food,Water,Electricity,Security,Miscellaneous,Total from Hostel.BillAccount  WHERE clgid = "."\"$clgid\"";
        $result = $conn->query($sqlTwo);

         if ($result->num_rows > 0) {
           echo "<table >";
           echo "<tr> <th> FOOD </th><th> WATER </th><th>ELECTRICITY</th><th>SECURITY</th><th>MISCELLANEOUS</th><th>TOTAL</th>  </tr>";
           while($row = $result->fetch_assoc()) {
             echo "<tr><td>".$row['Food']."</td><td>".$row['Water']."</td><td>".$row['Electricity']."</td>
             <td>".$row['Security']."</td><td>".$row['Miscellaneous']."</td><td>".$row['Total']."</td></tr>";
           }
           echo "</table>";
         }

         ?>
      </fieldset>
    </div>
    <div class="">
      <fieldset>
        <legend>Complaint Box</legend>
        <form class="" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
          <label for="complaint"> Write your complaint here......</label><br>

          <textarea name="message" rows="8" cols="80" ></textarea>
          <input type="submit" name="submit" value="Log complaint" placeholder="WRITE HERE in PLAIN  AND SIMLE ENGLISH....................">
        </form>
      </fieldset>
    </div>

  </body>
</html>
