<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TPKing</title>
    <link rel="stylesheet" href=<?php echo base_url('assets/css/style.css'); ?>>

      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

      <!-- Popper JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="header">
<a style="text-decoration: none" href="<?php echo site_url('Browse/browse'); ?>"><h1 class="TPKing">TPKing</h1> </a>



<!--Checking the session tokens to see if logged in and who or guest -->
<h5 class="login_user"><?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
  // The site_url here will lead to the userpage once available
  echo 'Welcome <a class="user_link" href="'.site_url('user/show_user').'" >' .$_SESSION['username']. '</a>';
  // This is the logout form so it only appears if logged in
  echo '<!--The Logout form -->
  <form class="logout_form" action="'.site_url('login/logout').'" method="post">
  <input type="submit" name="" value="Logout">
  </form>';
}
else{
  echo 'Welcome Guest';
  echo '<form class="logout_form" action="'.site_url('login').'">
  <input type="submit" name="" value="Login">
  </form>';
}


?></h5>
<br>
</div>


  <!-- The Modal is always present but only shown when needed-->
  <div id="Feedback" class="modal2 <?php if(isset($show_feedback)){} else{echo 'modal_hide2';} ?>">

      <!-- Modal content -->
      <div class="modal-content2">
          <span class="close">&times;</span>
          <p> <?php if(isset($show_feedback)){echo $message;} ?></p>
      </div>

  </div>

  <script>

    // Get the modal
    var modal = document.getElementById("Feedback");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the (x), close the modal
    span.onclick = function() {
      modal.classList.toggle("modal_hide2");
      <?php $show_feedback = FALSE; ?>
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.classList.toggle("modal_hide2");
        <?php $show_feedback = FALSE; ?>
      }
    } 

  </script>