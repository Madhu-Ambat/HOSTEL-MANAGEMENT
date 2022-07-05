<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){


  $servername = "localhost";
  $username = "root";
  $password = "";

  $clgid  = $_POST['clgid'];
  $fname = $_POST['fname'];
  $sname = $_POST['sname'];
  $father =$_POST['father'];
  $mother = $_POST['mother'];
  $college = $_POST['college'];
  $branch = $_POST['branch'];
  $adhar =$_POST['adhar'];
  $caste = $_POST['caste'];
  $phone = $_POST['phone'];
  $email =$_POST['email'];
  $address= $_POST['address'];

$conn = new mysqli($servername,$username,$password);

$sql = "INSERT INTO Hostel.student VALUES (NULL, '$clgid', '$fname', '$sname', '$father', '$mother', '$college', '$branch', '$adhar', '$caste', '$phone', '$email', '$address');";

$result = $conn->query($sql);
if($result == true){

  echo "row addes successfully";
}
else{
echo $result->connect_error;

}








}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="register.css">
  </head>
  <body>

    <h1>Registration Form</h1>
    <div class="form_container">
      <form class="" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <table>
          <tr>
            <td><span>College id :</span></td><td><input type="text" id="clgid"  onblur="checkid()" name="clgid" value="" placeholder="Enter your college id"> </td>
          </tr>
          <tr>
            <td>  <span>First Name :</span></td><td><input type="text" name="fname" value="" placeholder="Enter your first name"></td>
          </tr>
          <tr>
            <td><span>Second Name :</span></td><td><input type="text" name="sname" value=""placeholder="Enter your second name"></td>
          </tr>
          <tr>
            <td> <span>Father Name :</span></td><td><input type="text" name="father" value="" placeholder="Father name"></td>
          </tr>
          <tr>
            <td><span>Mother Name:</span></td><td>  <input type="text" name="mother" value="" placeholder="Mother name"></td>
          </tr>
          <tr>
            <td><span>College:</span></td><td>
              <select class="college_list" name="college"><br>
                <option value="">Select College</option>
                <option value="Yuvaraja's college">Yuvaraja's college</option>
                <option value="Maharani College">Maharani College</option>
                <option value="Manasagangotri">Manasagangotri</option>
                <option value="Mahajanas">Mahajanas</option>
                <option value="St.Peter">St.Peter</option>
                <option value="Govt PU College Mysore">Govt PU College Mysore</option>
                <option value="JC Mysore">JC Mysore</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><span>Branch :</span> </td><td>
              <select class="branch_list" name="branch"><br>
                 <option value="">Select branch name</option>
                 <option value="BE">BE</option>
                 <option value="BSC">BSc</option>
                 <option value="MBA">MBA</option>
                 <option value="MBBS">MBBS</option>
                 <option value="ARTS">ARTS</option>
                 <option value="COM">COM</option>
                 <option value="DIPLOMA">DIPLOMA</option>
               </select>
            </td>
          </tr>
          <tr>
            <td><span>AADHAR No :</span> </td><td><input type="number" name="adhar" value=""placeholder="adhar number"></td>
          </tr>
          <tr>
            <td><span>CASTE No :</span></td><td><input type="text" name="caste" value="" placeholder="caste certificate number"></td>
          </tr>
          <tr>
            <td><span>Mobile :</span></td><td><input type="number" name="phone" value=""placeholder="Phone Number"></td>
          </tr>
          <tr>
            <td><span>Email ID :</span> </td><td><input type="email" name="email" value="" placeholder="Email ID"></td>
          </tr>
          <tr>
            <td><span>Address :</span></td><td><textarea name="address" rows="8" cols="50">Residential address:</textarea></td>
          </tr>
        </table>
        <input class="button" type="submit" name="register">
      </form>

    </div>

    <script type="text/javascript">


    </script>

  </body>
</html>
