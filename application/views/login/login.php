<!--The Login form -->
<div class="login_form">
  <form  action="<?php echo site_url('login/login'); ?>" method="post" autocomplete="off">
    <label for="username">Username</label> <br>
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


