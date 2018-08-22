<?php
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>The Writers Among Us - Sprints</title>
     <link rel="stylesheet" type="text/css" href="style.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

  <script>
  function createPublicSprint() {
    window.location.href='http://localhost:8888/Writer%20Among%20Us/createSprint.php?goal=' + document.getElementById('sprintGoal').value + '&type=2';
  }

  function createPrivateSprint() {
    window.location.href='http://localhost:8888/Writer%20Among%20Us/createSprint.php?goal=' + document.getElementById('sprintGoal').value + '&type=1';
  }
  </script>

<?php
if (!isset($_SESSION['user_id'])) {
  // Redirect to My Account page
  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
  header('Location: ' . $home_url);
}

require_once('navbar.php');

  ?>

  <!--Do something to make sure it's only a numeric-->
  <h1 style="text-align: center; color: #907558;">Create New Word Sprint</h1>
  <br />
  <h3 style="text-align: center; color: #907558;">How many words would you like to sprint to reach?</h3>
  <br />
  <input type="text" id="sprintGoal" style="width: 100%; border: 7px #907558 solid; padding: 0.4em; width: 30%; margin-left: 35%; margin-right: 35%;" />
  <br />
  <h3 style="text-align: center; color: gray;">Invite friends to join your sprint -- Coming Soon</h3>
  <br />
  <input type="text" disabled="disabled" style="width: 100%; border: 7px #907558 solid; padding: 0.4em; width: 30%; margin-left: 35%; margin-right: 35%;" />
  <br /><br /><br />
  <section style="margin-left: 27%; width: 46%;">
    <a href="index.php"><img src="images/cancelButton.png" style='height:auto; width: 31%;' alt="Cancel" /></a>
    <img src="images/createPublicButton.png" style='height:auto; width: 31%; margin-left: 2%; cursor: pointer;' alt="Create Public Sprint" onclick="createPublicSprint()" />
    <img src="images/createPrivateButton.png" style='height:auto; width: 31%; margin-left: 2%; cursor: pointer;' alt="Create Private Sprint" onclick="createPrivateSprint()" />
  </section>

<!-- On submition, send the word goal and flag for public or private as a GET variable. On the other end, check for them and, if they exist, create the sprint and grab the ID to send on to sprint.php -->

</body>
</html>
