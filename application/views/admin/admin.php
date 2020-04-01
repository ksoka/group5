
<br><br><br><br><br>
<!--The Add User form -->
<form class="adduser_form" action="<?php echo site_url('Admin/add_user'); ?>" method="post" autocomplete="off">
  <label for="username">username* (must be unique)</label> <br>
  <input type="text" id="username" name="username" value=""> <br>

  <label for="lastname">lastname*</label> <br>
  <input type="text" id="lastname" name="lastname" value=""> <br>

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
