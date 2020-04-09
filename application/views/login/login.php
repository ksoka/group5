<!--The Login form -->
<div class="login_form">
  <form  action="<?php echo site_url('login/login'); ?>" method="post" autocomplete="off">
    <label for="username">Username</label> <br>
    <input class="input_field" type="text" id="username" name="username" value=""> <br>

    <label for="password">Password</label> <br>
    <input type="password" id="password" name="password" value=""> <br>
    <br>
    <input type="submit" name="" value="Login">
  </form></br></br>
  <div class="no_account">
    Don't have an account?</br> Create one <button id="account_button" class="account_button" data-toggle="modal" data-target="#editModal">here!</button></br>
    Or start <a color="blue" href="<?php echo site_url('Browse/browse'); ?>">browsing</a> without one.
  </div>
</div>





<!-- EditModal -->
<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create an account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="<?php echo site_url('Login/add_user'); ?>" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="firstname">Firstname</label><br>
                        <input type="text" id="firstname" name="firstname" value=""> <br>
                        <label for="lastname">Lastname</label><br>
                        <input type="text" id="lastname" name="lastname" value=""> <br>
                        <label for="username">Username</label><br>
                        <input type="text" id="username" name="username" value=""> <br>
                        <label for="password">Password</label><br>
                        <input type="text" id="password" name="password" value=""> <br>
                        <label for="city">City</label><br>
                        <input type="text" id="city" name="city" value=""> <br>
                        <label for="zip">Zip</label><br>
                        <input type="text" id="zip" name="zip" value=""> <br>
                        <label for="address">Address</label><br>
                        <input type="text" id="address" name="address" value=""> <br>
                        <label for="phone">Phone Number</label><br>
                        <input type="text" id="phone" name="phone" value=""> <br>
                    </div>
                    <input type="submit" class="btn btn-primary" name="" value="Create Account">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on( "click", '#account_button',function(e) {
    console.log("Update modal open");
    var username = $(this).data('username');
    var firstname = $(this).data('firstname');
    var lastname = $(this).data('lastname');
    var password = $(this).data('password');
    var city = $(this).data('city');
    var zip = $(this).data('zip');
    var address = $(this).data('address');
    var phone = $(this).data('phone');

    $("#username").val(username);
    $("#firstname").val(firstname);
    $("#lastname").val(lastname);
    $("#password").val(password);
    $("#city").val(city);
    $("#zip").val(zip);
    $("#address").val(address);
    $("#phone").val(phone);
    });

</script>