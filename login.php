<?php
    session_start();
    require_once('connectvars.php');
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


    if (isset($_SESSION['user_id'])) {
      // Redirect to My Account page
      $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/account.php';
      header('Location: ' . $home_url);
    }

    if (isset($_POST['submit'])) {
      $username = null;
      $password = null;
      $password2 = null;

      if (isset($_POST['lusername'])) {
        $username = mysqli_real_escape_string($dbc, trim($_POST['lusername']));
      }

      if (isset($_POST['lpassword'])) {
        $password = mysqli_real_escape_string($dbc, trim($_POST['lpassword']));
      }

      if (isset($_POST['susername'])) {
        $username = mysqli_real_escape_string($dbc, trim($_POST['susername']));
      }

      if (isset($_POST['spassword'])) {
        $password = mysqli_real_escape_string($dbc, trim($_POST['spassword']));
      }

      if (isset($_POST['spassword2'])) {
        $password2 = mysqli_real_escape_string($dbc, trim($_POST['spassword2']));
      }

      if (isset($_POST['lusername']) && isset($_POST['lpassword']) && !empty($username) && !empty($password)) {
        $query = "SELECT user_id, username FROM USER_DATA WHERE username = '$username' AND password = SHA('$password')";
        $data = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data) == 1) {
            $row = mysqli_fetch_array($data);

            // Set session variables
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];

            // Return user to index.php
            $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/account.php';
            header('Location: ' . $home_url);
        } else {
          // Error message or something
        }

      } else if (isset($_POST['susername']) && isset($_POST['spassword']) && isset($_POST['spassword2']) && !empty($username) && !empty($password) && !empty($password2)) {
        if ($password == $password2) {
          $query = "SELECT user_id FROM USER_DATA WHERE username = '$username'";
          $data = mysqli_query($dbc, $query);

          if (mysqli_num_rows($data) == 0) {
            $query = "INSERT INTO USER_DATA (username, password) VALUES ('$username', SHA('$password'))";
            mysqli_query($dbc, $query);

          } else {
            // Error message, account already exists
          }

        } else {
          // Error message, passwords do not match
        }


      } else {
        // Error message or something, IDK
      }

      mysqli_close($dbc);

    } else {

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>The Writers Among Us - Login</title>
     <link rel="stylesheet" type="text/css" href="style.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

  <section>
      <a href="index.php"><img src="images/homeButtonLarge.png" alt="Home" style="width: 14%; height: auto; margin-left: 43%; margin-right: 43%; margin-top: 2em;" /></a>
  </section>

  <section>
    <h1 style="text-align: center; color: #907558;">Login</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="width: 40%; margin-right: auto; margin-left: auto;">
    <input type="text" style="width: 100%; border: 7px #907558 solid; padding: 0.4em;" name="lusername" placeholder="Username" />
    <br /><br />
    <input type="password" style="width: 100%; border: 7px #907558 solid; padding: 0.4em;" name="lpassword" placeholder="Password" />
    <br /><br />
    <input type="submit" name="submit" style="width: 30%; margin-right: 35%; margin-left: 35%;" />
    </form>
  </section>

  <section>
    <h1 style="text-align: center; color: #907558;">Sign Up</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="width: 40%; margin-right: auto; margin-left: auto;">
    <input type="text" style="width: 100%; border: 7px #907558 solid; padding: 0.4em;" name="susername" placeholder="Username" />
    <br /><br />
    <input type="password" style="width: 100%; border: 7px #907558 solid; padding: 0.4em;" name="spassword" placeholder="Password" />
    <br /><br />
    <input type="password" style="width: 100%; border: 7px #907558 solid; padding: 0.4em;" name="spassword2" placeholder="Retype Password" />
    <br /><br />
    <input type="submit" name="submit" style="width: 30%; margin-right: 35%; margin-left: 35%;" />
      </form>
  </section>

</body>
</html>

<?php
}
 ?>
