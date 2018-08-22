<?php
session_start();
require_once('connectvars.php');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>The Writers Among Us - My Writing</title>
     <link rel="stylesheet" type="text/css" href="style.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php
require_once('navbar.php');

$query = "SELECT sprint_id, sprint_text, creation_date FROM SPRINT_RECORD WHERE user_id = " . $_SESSION['user_id'] . " ORDER BY creation_date DESC";

$data = mysqli_query($dbc, $query);

while ($row = mysqli_fetch_array($data)) {
  echo "<article style='width: 100%; border: 10px solid #907558; padding-right: 3em; padding-left: 3em; padding-top: 1em; padding-bottom: 1em; overflow: auto; height: 10em;'>";
  echo $row['creation_date'];
  echo "<br />";
  echo $row['sprint_text'];
  echo "<br />";
  echo "<a href='sprint.php?id=" . $row['sprint_id'] . "'>Return to Sprint</a>";
  echo "</article>";
}
 ?>


<?php
mysqli_close($dbc);
?>
 </body>
 </html>
