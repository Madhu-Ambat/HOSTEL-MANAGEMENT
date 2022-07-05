
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style type="text/css">
    .heading{
      background-color: black;
      color: white;
      text-align: center;
      padding:1.5rem;
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

    </style>
  </head>
  <body>
    <div class="heading">
      <h1>Complaints</h1>

    </div>
      <div class="list">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new mysqli($servername,$username,$password);
        $sql = "select * from Hostel.ComplaintBox";
        $result = $conn->query($sql);

        if($result->num_rows>0)
        { echo "<table><tr><th>College ID</th><th>First Name</th><th>Seccond Name</th><th>Mobile</th><th>Complaint</th><th>Date and Time of Complaint</th></tr>";
          while($rows = $result->fetch_assoc()){
            echo "<tr><td>".$rows['clgid']."</td><td>".$rows['fname']."</td><td>".$rows['sname']."</td><td>".$rows['mobile']."</td>
            <td>".$rows['Complaint']."</td><td>".$rows['date_and_time']."</td></tr>";

          }
          echo "</table>";
        }

         ?>

      </div>


  </body>
</html>
