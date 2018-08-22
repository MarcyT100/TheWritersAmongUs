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
  <title>The Writers Among Us - Create Sprint</title>
     <link rel="stylesheet" type="text/css" href="style.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php

if (!isset($_SESSION['user_id'])) {
    // Redirect to My Account page
    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
    header('Location: ' . $home_url);
  } else {

  $goal = $_GET['goal'];
  $status = $_GET['type'];
  $owner = $_SESSION['user_id'];

  $query = "INSERT INTO SPRINT_DATA (`goal`, `owner_id`, `public`) VALUES ($goal, $owner, $status)";
  echo $query;
  mysqli_query($dbc, $query);

  $query = "SELECT sprint_id FROM SPRINT_DATA WHERE goal = $goal AND owner_id = $owner AND public = $status ORDER BY creation_date DESC LIMIT 1";
  $data = mysqli_query($dbc, $query);

  if (mysqli_num_rows($data) == 1) {
      $row = mysqli_fetch_array($data);
      $sprintId = $row['sprint_id'];
  }

  mysqli_close($dbc);

  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/sprint.php?id=' . $sprintId;

}

?>

<script>
   window.location.href = "<?php echo $home_url; ?>";
</script>

</body>
</html>
