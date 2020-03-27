<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TPKing</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
  
<div class="test">
<h1 class="TPKing">TPKing</h1>



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
}
?></h5>
</div>


