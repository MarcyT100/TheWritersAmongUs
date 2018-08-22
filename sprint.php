<?php
session_start();
require_once('connectvars.php');

if (!isset($_SESSION['user_id'])) {
  // Redirect to My Account page
  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
  header('Location: ' . $home_url);
}
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

<?php
require_once('navbar.php');



  if (isset($_GET['id'])) {
    $sprintId = $_GET['id'];
  } else if (isset($_POST['sprintId'])) {
    $sprintId = $_POST['sprintId'];
  } else {
    // Error message
  }

  if (isset($_POST['sprintText'])) {
    $newText = str_replace("'", "\'", $_POST['sprintText']);
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $newWordcount = str_word_count($newText);

    $sql = "UPDATE SPRINT_RECORD SET word_count = " . $newWordcount . ", sprint_text = '" . $newText . "' WHERE sprint_id = " . $sprintId . " AND user_id = " . $_SESSION['user_id'];
    mysqli_query($dbc, $sql);

    // Add code that places the cursor at the end of the box
  }

  $sprintGoal = null;
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $sql = "SELECT goal, owner_id, status, winner_id, sprint_start FROM SPRINT_DATA WHERE sprint_id = $sprintId";
  $data = mysqli_query($dbc, $sql);

  if (mysqli_num_rows($data) == 1) {
      $row = mysqli_fetch_array($data);

      $sprintGoal = $row['goal'];
      $ownerId = $row['owner_id'];
      $status = $row['status'];
      $winnerId = $row['winner_id'];
      $sprintStart = $row['sprint_start'];

      $winnerFlag = false;

      if (isset($winnerId)) {
        $winnerFlag = true;
      }

    } else {
      // Error message
    }

    ?>

<section>
<article style="width: 26%; float: left;">
  <br/ >

<?php

    $userId = $_SESSION['user_id'];
    $sprintRecord = false;

    // Search for record
    $sql = "SELECT sprint_id FROM SPRINT_RECORD WHERE sprint_id = $sprintId AND user_id = $userId";
    $data = mysqli_query($dbc, $sql);

    if (mysqli_num_rows($data) != 0) {
      $sprintRecord = true;
    }

    if ($sprintRecord == false) {
      echo '<a href="createSprintRecord.php?id=' . $sprintId . '"><img src="images/joinButton.png" <img style="width: 60%; margin-left: 20%;" alt="Join Sprint" /></a><br /><br />';
    }

    if ($status == "N" && $ownerId == $userId && $sprintRecord == true) {
        echo '<a href="startSprint.php?id=' . $sprintId . '"><img src="images/startButton.png" alt="Start Sprint" <img style="width: 60%; margin-left: 20%;" /></a><br /><br />';
    }

    if ($sprintRecord = true && (status != "N" || $ownerId != $userId)) {
      echo '<img style="width: 60%; margin-left: 20%;" src="images/blankButton.png" /><br /><br />';
    }

    echo "</article>";

    echo "<h1 style=' width: 70%; float: left; color: #907558;'>$sprintGoal Word Sprint</h1>";

    echo "</section><section>";

    echo '<article style="width: 26%; float: left; border: 10px solid #907558; clear: left;">';

    $sql = "SELECT username, sprint_text, word_count FROM SPRINT_RECORD WHERE user_id = " . $userId . " AND sprint_id = " . $sprintId;
    $data = mysqli_query($dbc, $sql);
    if (mysqli_num_rows($data) == 1) {

        $row = mysqli_fetch_array($data);
        $currentUsername = $row['username'];
        $currentText = $row['sprint_text'];
        $currentWordcount = $row['word_count'];

        $currentPercentage = $currentWordcount / $sprintGoal * 100;

        if ($currentWordcount >= $sprintGoal && $winnerFlag == false) {
          $sql = "UPDATE SPRINT_DATA SET winner_id = " . $_SESSION['user_id'] . " WHERE sprint_id = " . $sprintId;
          mysqli_query($dbc, $sql);
        }

        echo $currentUsername . " -- " . $currentPercentage . "%";
        echo "<br />Progress Bar Coming Soon<br />";
      }

      $sql = "SELECT username, word_count FROM SPRINT_RECORD WHERE sprint_id = " . $sprintId . " AND user_id != " . $userId . " ORDER BY word_count DESC";
      $data = mysqli_query($dbc, $sql);

      while ($row = mysqli_fetch_array($data)) {
        $competitorUsername = $row['username'];
        $competitorWordcount = $row['word_count'];
        $competitorPercentage = $competitorWordcount / $sprintGoal * 100;

        echo "<br />";
        echo $competitorUsername . " -- " . $competitorPercentage . "%";
        echo "<br />Progress Bar Coming Soon<br />";

      }

      echo "<br /><br /><br />Hide Button Coming Soon";


?>
</article>

<?php

if ($winnerFlag == true) {
  if ($winnerId == $_SESSION['user_id']) {
    echo "<h1 style='text-align: center;'>Congrats! You won!</h1>";
    $sql = "UPDATE `SPRINT_DATA` SET `status` = 'C' WHERE `sprint_id` = " . $sprintId;
    mysqli_query($dbc, $sql);

  } else {
    echo "<h1 style='text-align: center;'>I'm sorry, you lost.</h1>";
    $sql = "UPDATE `SPRINT_DATA` SET `status` = 'C' WHERE `sprint_id` = " . $sprintId;
    mysqli_query($dbc, $sql);

  }
} else {
  // test for timeout
  if (isset($sprintStart)) {
  if ($sprintStart < date("Y-m-d H:i:s", strtotime('-8 hours'))) {
    echo "<h1 style='text-align: center;'>Sprint has timed out</h1>";
    $sql = "UPDATE `SPRINT_DATA` SET `status` = 'T' WHERE `sprint_id` = " . $sprintId;
    mysqli_query($dbc, $sql);
  }
  }
}

 ?>

<form method="post" id="sprintBox" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="width: 70%; float: left;">
<input type="hidden" name="sprintId" value="<?php echo $sprintId; ?>" />
<?php
  if ($status == "N") {
    ?>
    <!-- <textarea disabled style="width: 100%; height: 40em; overflow: auto; padding: 1em; margin: 1em; border: 10px solid #907558;"> -->
      <?php
  } else {
 ?>
<textarea name="sprintText" id="sprintText" style="width: 100%; height: 40em; overflow: auto; padding: 1em; margin: 1em; border: 10px solid #907558;">
<?php


  if (isset($currentText)) {
    echo $currentText;
  }
 ?>
</textarea>

<?php
}
 ?>
</form>
</section>

<script>

var myVar = setInterval(myTimer, 1000);

SetCaretAtEnd(document.getElementById('sprintText'));

function myTimer() {
  document.getElementById("sprintBox").submit();
}


function SetCaretAtEnd(elem) {
         var elemLen = elem.value.length;
         // For IE Only
         if (document.selection) {
             // Set focus
             elem.focus();
             // Use IE Ranges
             var oSel = document.selection.createRange();
             // Reset position to 0 & then set at end
             oSel.moveStart('character', -elemLen);
             oSel.moveStart('character', elemLen);
             oSel.moveEnd('character', 0);
             oSel.select();
         }
         else if (elem.selectionStart || elem.selectionStart == '0') {
             // Firefox/Chrome
             elem.selectionStart = elemLen;
             elem.selectionEnd = elemLen;
             elem.focus();
         } // if

     } // SetCaretAtEnd()
</script>



 <?php
 mysqli_close($dbc);
  ?>

</html>
</body>
