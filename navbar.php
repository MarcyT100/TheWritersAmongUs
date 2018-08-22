<?php
    $currentPage = pathinfo($_SERVER['REQUEST_URI'])['basename'];
    echo "<section>";

    switch ($currentPage) {
      case 'index.php':
      echo "<span><a href='sprints.php'><img src='images/sprintButton.png' style='height:auto; width: 14%; margin-left: 12%; margin-top: 1em;' alt='Sprints' /></a></span>";
      echo "<span><a href='wars.php'><img src='images/warButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Wars' /></a></span>";
      echo "<span><a href='crawls.php'><img src='images/crawlButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Crawls' /></a></span>";
      echo "<span><a href='login.php'><img src='images/loginAccountButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Login/Account' /></a></span>";
      echo "<span><a href='mywriting.php'><img src='images/myWritingButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='My Writing' /></a></span>";
        break;

        case 'sprints.php' . substr(pathinfo($_SERVER['REQUEST_URI'])['extension'], 3);
        echo "<span><a href='index.php'><img src='images/homeButton.png' style='height:auto; width: 14%; margin-left: 12%; margin-top: 1em;' alt='Home' /></a></span>";
        echo "<span><a href='wars.php'><img src='images/warButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Wars' /></a></span>";
        echo "<span><a href='crawls.php'><img src='images/crawlButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Crawls' /></a></span>";
        echo "<span><a href='login.php'><img src='images/loginAccountButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Login/Account' /></a></span>";
        echo "<span><a href='mywriting.php'><img src='images/myWritingButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='My Writing' /></a></span>";
          break;

        case 'sprint.php' . substr(pathinfo($_SERVER['REQUEST_URI'])['extension'], 3);
        echo "<span><a href='index.php'><img src='images/homeButton.png' style='height:auto; width: 14%; margin-left: 12%; margin-top: 1em;' alt='Home' /></a></span>";
        echo "<span><a href='wars.php'><img src='images/warButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Wars' /></a></span>";
        echo "<span><a href='crawls.php'><img src='images/crawlButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Crawls' /></a></span>";
        echo "<span><a href='login.php'><img src='images/loginAccountButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Login/Account' /></a></span>";
        echo "<span><a href='mywriting.php'><img src='images/myWritingButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='My Writing' /></a></span>";
          break;

          case 'newSprint.php' . substr(pathinfo($_SERVER['REQUEST_URI'])['extension'], 3);
          echo "<span><a href='index.php'><img src='images/homeButton.png' style='height:auto; width: 14%; margin-left: 12%; margin-top: 1em;' alt='Home' /></a></span>";
          echo "<span><a href='wars.php'><img src='images/warButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Wars' /></a></span>";
          echo "<span><a href='crawls.php'><img src='images/crawlButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Crawls' /></a></span>";
          echo "<span><a href='login.php'><img src='images/loginAccountButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Login/Account' /></a></span>";
          echo "<span><a href='mywriting.php'><img src='images/myWritingButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='My Writing' /></a></span>";
            break;

        case 'wars.php' . substr(pathinfo($_SERVER['REQUEST_URI'])['extension'], 3);
        echo "<span><a href='index.php'><img src='images/homeButton.png' style='height:auto; width: 14%; margin-left: 12%; margin-top: 1em;' alt='Home' /></a></span>";
        echo "<span><a href='sprints.php'><img src='images/sprintButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Sprints' /></a></span>";
        echo "<span><a href='crawls.php'><img src='images/crawlButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Crawls' /></a></span>";
        echo "<span><a href='login.php'><img src='images/loginAccountButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Login/Account' /></a></span>";
        echo "<span><a href='mywriting.php'><img src='images/myWritingButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='My Writing' /></a></span>";
          break;

        case 'crawls.php' . substr(pathinfo($_SERVER['REQUEST_URI'])['extension'], 3);
        echo "<span><a href='index.php'><img src='images/homeButton.png' style='height:auto; width: 14%; margin-left: 12%; margin-top: 1em;' alt='Home' /></a></span>";
        echo "<span><a href='sprints.php'><img src='images/sprintButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Sprints' /></a></span>";
        echo "<span><a href='wars.php'><img src='images/warButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Wars' /></a></span>";
        echo "<span><a href='login.php'><img src='images/loginAccountButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Login/Account' /></a></span>";
        echo "<span><a href='mywriting.php'><img src='images/myWritingButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='My Writing' /></a></span>";
          break;

        case 'account.php';
        echo "<span><a href='index.php'><img src='images/homeButton.png' style='height:auto; width: 14%; margin-left: 12%; margin-top: 1em;' alt='Home' /></a></span>";
        echo "<span><a href='sprints.php'><img src='images/sprintButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Sprints' /></a></span>";
        echo "<span><a href='wars.php'><img src='images/warButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Wars' /></a></span>";
        echo "<span><a href='crawls.php'><img src='images/crawlButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Crawls' /></a></span>";
        echo "<span><a href='mywriting.php'><img src='images/myWritingButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='My Writing' /></a></span>";
          break;

        case 'mywriting.php':
        echo "<span><a href='index.php'><img src='images/homeButton.png' style='height:auto; width: 14%; margin-left: 12%; margin-top: 1em;' alt='Home' /></a></span>";
        echo "<span><a href='sprints.php'><img src='images/sprintButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Sprints' /></a></span>";
        echo "<span><a href='wars.php'><img src='images/warButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Wars' /></a></span>";
        echo "<span><a href='crawls.php'><img src='images/crawlButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Crawls' /></a></span>";
        echo "<span><a href='login.php'><img src='images/loginAccountButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Login/View Account' /></a></span>";
          break;

      default:
      echo "<span><a href='sprints.php'><img src='images/sprintButton.png' style='height:auto; width: 14%; margin-left: 12%; margin-top: 1em;' alt='Sprints' /></a></span>";
      echo "<span><a href='wars.php'><img src='images/warButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Wars' /></a></span>";
      echo "<span><a href='crawls.php'><img src='images/crawlButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Crawls' /></a></span>";
      echo "<span><a href='login.php'><img src='images/loginAccountButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='Login/Account' /></a></span>";
      echo "<span><a href='mywriting.php'><img src='images/myWritingButton.png' style='height:auto; width: 14%; margin-left: 1.25%; margin-top: 1em;' alt='My Writing' /></a></span>";
        break;
    }






    echo "</section>";

?>
