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
    Or start <a color="blue" href="<?php echo site_url('Browse/browse'); ?>">browsing</a> without one.<br><br>
    Just remember, you must be logged in for making an order
  </div>
</div>





<!-- Account Modal -->
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
                        <input type="text" id="firstname" name="firstname" value="" maxlength="20"> <br>
                        <label for="lastname">Lastname</label><br>
                        <input type="text" id="lastname" name="lastname" value="" maxlength="30"> <br>
                        <label for="username2">Username</label><br>
                        <input type="text" id="username2" name="username2" value="" maxlength="20"> <br>
                        <label for="password2">Password</label><br>
                        <input type="password" id="password2" name="password2" value="" onchange="password_check()" maxlength="20"> <br>
                        <label for="password_confirm">Password Confirmation</label><br>
                        <input type="password" id="password_confirm" name="password_confirm" value="" onkeyup="password_check()"> <div id="warning"></div> <br>
                        <label for="city">City</label><br>
                        <input type="text" id="city" name="city" value="" maxlength="20"> <br>
                        <label for="zip">Zip</label><br>
                        <input type="text" id="zip" name="zip" value="" maxlength="5"> <br>
                        <label for="address">Address</label><br>
                        <input type="text" id="address" name="address" value="" maxlength="50"> <br>
                        <label for="phone">Phone Number</label><br>
                        <input type="text" id="phone" name="phone" value="" maxlength="15"> <br>
                    </div>
                    <div onmouseover="content_check()">
                    <input type="submit" id="submit_button" class="btn btn-primary" name="" value="Create Account" onmouseover="content_check()">
                    </div>
                    <div id="warning2"></div>
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
    var password_confirm = $(this).data('password_confirm');
    var city = $(this).data('city');
    var zip = $(this).data('zip');
    var address = $(this).data('address');
    var phone = $(this).data('phone');

    $("#username").val(username);
    $("#firstname").val(firstname);
    $("#lastname").val(lastname);
    $("#password").val(password);
    $("#password_confirm").val(password_confirm);
    $("#city").val(city);
    $("#zip").val(zip);
    $("#address").val(address);
    $("#phone").val(phone);

    });

    function password_check(){
        if(document.getElementById("password_confirm").value == document.getElementById("password2").value)
        {
            document.getElementById("warning").innerHTML = "";
            document.getElementById("submit_button").disabled = false;
            return true;
        }
        else{
            document.getElementById("warning").innerHTML = "<-- Password does not match";
            document.getElementById("submit_button").disabled = true;
            return false;
        }
    }

    function content_check(){
        test = document.getElementById("firstname").value;
        if( 
            document.getElementById("firstname").value == '' ||
            document.getElementById("lastname").value == '' ||
            document.getElementById("username2").value == '' ||
            document.getElementById("password2").value == '' ||
            document.getElementById("password_confirm").value == '' ||
            document.getElementById("city").value == '' ||
            document.getElementById("zip").value == '' ||
            document.getElementById("address").value == '' ||
            document.getElementById("phone").value == '' 
        ){
            document.getElementById("warning2").innerHTML = "Please fill in all the information";
            document.getElementById("submit_button").disabled = true;
        }
        else{
            if(password_check() == true){
                document.getElementById("warning2").innerHTML = "";
                document.getElementById("submit_button").disabled = false;
            }
        }
    }

</script>