<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{

  $servername = "localhost";
  $username = "root";
  $password = "";
  $conn = new mysqli($servername,$username, $password);

  $clgid = $_POST['clgid'];
  $fname = $_POST['fname'];
  $sname = $_POST['sname'];

  $_SESSION['regName'] = $clgid;

  if($clgid != "" && $fname != "" && $sname != "")
  {

    $sql = 'select clgid, fname, sname from Hostel.student';
    $result= $conn->query($sql);

      if($result->num_rows > 0)
      { $match_count = 0;
        while($row = $result->fetch_assoc())
        {
          if($row['clgid'] == $clgid){$match_count++;}
          if($row['fname'] == $fname){$match_count++;}
          if($row['sname'] == $sname){$match_count++;}
          if($match_count == 3){
            header('Location: studentPage.php');
            break;}
        }
      }


  }
  else{
    echo "<script>alert('All fields are mandatory')</script>";

  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Login </title>
  </head>
  <style type="text/css">
    body{
      text-align: center;
      background-image: url("rain.jpg");
      background-position: center;
      background-size: cover;
    }
    .login{
      background-color: rgba(0,0,0,0.3);
      border: 2px solid rgba(0,0,0,0.6);
      width:50%;
      margin: 10rem auto 3rem;
      padding: 6%;
    }
    label{
      color: antiquewhite;
    }
    td{
      font-size: 1.5rem;
    }
    input{
      padding: 0.5rem 1rem;
      margin-top: 0.5rem;
      background-color: rgba(0,0,0,0);
      border: none;
      border-bottom:2px solid white;
    }
    .lab{
      text-align: left;
    }
    #button{
      background-color: white;
      color:black;
      border: 1px solid white;
    }
    #button:hover{
      background-color: black;
      color:white;
      border: 1px solid white;

    }
  </style>
  <body>

    <div class="login">
      <h1 style="color:antiquewhite;">Student Login</h1>
      <form class="studentLogin" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <table>
          <tr>
            <td class="lab"><label for="fname">Student Name :</label></td><td><input type="text" name="fname" value = "" placeholder="First Name"> <input type="text" name="sname" value ="" placeholder="Second Name"></td>
          </tr>
          <tr>
            <td class="lab"><label for="clgid">College ID : </label></td><td><input type="text" name="clgid" value="" placeholder="Case-sensitive "></td>
          </tr>

          <input id="button" type="submit" name="login" value="LOGIN">
        </table>

    </form>

    </div>



  </body>
</html>
