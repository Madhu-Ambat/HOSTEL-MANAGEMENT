<?php

session_start();

$_SESSION['username']= 'vinod';

$_SESSION['authuser']= 1;

?>

<html>

<head><title></title>

</head>

<body>

<?php

$my = urlencode('MCN solution');

echo "<a href=\"session2.php?name=$my\">";

echo 'click here to see my company nam';

echo '</a>'

?>

</body>

</html>
