<!--The Login form -->
<div class="login_form">
  <form  action="<?php echo site_url('login/login'); ?>" method="post" autocomplete="off">
    <label for="username">Lastname</label> <br>
    <input class="input_field" type="text" id="username" name="username" value=""> <br>

    <label for="password">Password</label> <br>
    <input type="password" id="password" name="password" value=""> <br>
    <br>
    <input type="submit" name="" value="Login">
  </form>
</div>

<!--The Logout form 
<form class="logout_form" action="<?php echo site_url('login/logout'); ?>" method="post">
<input type="submit" name="" value="Logout">
</form>
-->

<!--The Add User form -->
<form class="adduser_form" action="<?php echo site_url('login/add_user'); ?>" method="post" autocomplete="off">
  <label for="username">lastname*</label> <br>
  <input type="text" id="username" name="username" value=""> <br>

  <label for="fname">firstname*</label> <br>
  <input type="text" id="fname" name="fname" value=""> <br>

  <label for="city">city</label> <br>
  <input type="text" id="city" name="city" value=""> <br>

  <label for="zip">zip</label> <br>
  <input type="text" id="zip" name="zip" value=""> <br>

  <label for="address">address*</label> <br>
  <input type="text" id="address" name="address" value=""> <br>

  <label for="phone">phone</label> <br>
  <input type="text" id="phone" name="phone" value=""> <br>

  <label for="admin">admin</label> <br>
  <input type="radio" id="admin" name="admin" value="1"> <br>

  <label for="password">password*</label> <br>
  <input type="text" id="password" name="password" value=""> <br>
  <br>
  <input type="submit" name="" value="Adduser">
</form>

<!--Checking the session tokens to see if logged in and who or guest -->
<h5><?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
  echo 'Welcome ' .$_SESSION['username'];
}
else{
  echo 'Welcome Guest';
}

?></h5>