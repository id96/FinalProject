<?php

if (isset($_SESSION['logged_user_by_sql'])) {
  echo '<div class="container-fluid footer">';
    echo '<div class="row">';
      echo '<div class="col-xs-12 col-sm-8 col-sm-push-2 col-md-8 col-md-push-2 col-lg-8 col-lg-push-2 footer-content">';
        echo '<div class="icons">';
          echo '<a class="icon" href="mailto:visellib@bc.edu?Subject=Hello%20again" target="_top"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>';
          echo '<a class="icon" href="https://www.instagram.com/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></a>';
          echo '<a class="icon" href="https://www.facebook.com/East-Coast-Drones-1316457495116792/"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
          echo '<a class="icon" href="https://www.youtube.com/watch?v=Tz1EYi9JV5I"><i class="fa fa-youtube" aria-hidden="true"></i></a>';
          echo '<a class="icon" href="https://www.linkedin.com/in/jonathan-parece-312064136/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
        echo '</div>';
        echo '<div>Copyright &copy; East Coast Drones</div>';
          echo '<a class="links" href="login.php">Admin Link</a>';
          echo '<a class="links" href="edit.php">Edit Database</a>';
          echo '<a class="links" href="logout.php">Log Out</a>';
        echo '</div>';
    echo '</div>';
  echo '</div>';
}

else {
  echo '<div class="container-fluid footer">';
    echo '<div class="row">';
      echo '<div class="col-xs-12 col-sm-8 col-sm-push-2 col-md-8 col-md-push-2 col-lg-8 col-lg-push-2 footer-content">';
        echo '<div class="icons">';
          echo '<a class="icon" href="mailto:visellib@bc.edu?Subject=Hello%20again" target="_top"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>';
          echo '<a class="icon" href="https://www.instagram.com/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></a>';
          echo '<a class="icon" href="https://www.facebook.com/East-Coast-Drones-1316457495116792/"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
          echo '<a class="icon" href="https://www.youtube.com/watch?v=Tz1EYi9JV5I"><i class="fa fa-youtube" aria-hidden="true"></i></a>';
          echo '<a class="icon" href="https://www.linkedin.com/in/jonathan-parece-312064136/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
        echo '</div>';
        echo '<div>Copyright &copy; East Coast Drones</div>';
          echo '<a href="login.php">Admin Link</a>';
        echo '</div>';
    echo '</div>';
  echo '</div>';

}


?>