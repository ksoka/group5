
<br><br><br><br><br>
<!--The Add User form -->
<h3><u>Add a new user</u></h3>
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

<table class="table">
    <thead>
        <tr>
            <th>User Id</th> <th>Username</th><th>Firstname</th> <th>Lastname</th> <th>City</th> <th>Zip</th> <th>Address</th> <th>Phone</th> 
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($allUsers as $row)
            {
                echo '<tr>';
                echo '<td>'.$row['id_user'].'</td><td>'.$row['username'].'</td><td>'.$row['firstname'].'</td><td>'.$row['lastname'].'</td><td>'.$row['city'].'</td>'
                    .'<td>'.$row['zip'].'</td><td>'.$row['address'].'</td><td>'.$row['phone'].'</td>';
                echo '<td> <button id ="editUserInfo" class="btn btn-primary myBtn" data-toggle="modal" data-target="#editModal" 
                      data-id_user="'.$row['id_user'].'" data-username="'.$row['username'].'" data-firstname="'.$row['firstname'].'"
                      data-lastname="'.$row['lastname'].'"data-city="'.$row['city'].'"data-zip="'.$row['zip'].'"
                      data-address="'.$row['address'].'"data-phone="'.$row['phone'].'">Edit</button></td>';
                echo '</tr>';
            }
        ?>
    </tbody>
</table>

<!-- EditModal -->
<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit user information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="<?php echo site_url('admin/edit_users'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="edit_id_user" name="id_user" value="">
                        <label for="edit_username">Username</label><br>
                        <input type="text" id="edit_username" name="username" value=""> <br>
                        <label for="edit_firstname">Firstname</label><br>
                        <input type="text" id="edit_firstname" name="firstname" value=""> <br>
                        <label for="edit_lastname">Lastname</label><br>
                        <input type="text" id="edit_lastname" name="lastname" value=""> <br>
                        <label for="edit_city">City</label><br>
                        <input type="text" id="edit_city" name="city" value=""> <br>
                        <label for="edit_zip">Zip</label><br>
                        <input type="text" id="edit_zip" name="zip" value=""> <br>
                        <label for="edit_address">Adderss</label><br>
                        <input type="text" id="edit_address" name="address" value=""> <br>
                        <label for="edit_phone">Phone Number</label><br>
                        <input type="text" id="edit_phone" name="phone" value=""> <br>
                    </div>
                    <input type="submit" class="btn btn-primary" name="" value="Update">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on( "click", '#editUserInfo',function(e) {
    console.log("Update modal open");
    var id_user = $(this).data('id_user');
    var username = $(this).data('username');
    var firstname = $(this).data('firstname');
    var lastname = $(this).data('lastname');
    var city = $(this).data('city');
    var zip = $(this).data('zip');
    var address = $(this).data('address');
    var phone = $(this).data('phone');
    console.log('id_user = '+id_user);

    $("#edit_id_user").val(id_user);
    $("#edit_username").val(username);
    $("#edit_firstname").val(firstname);
    $("#edit_lastname").val(lastname);
    $("#edit_city").val(city);
    $("#edit_zip").val(zip);
    $("#edit_address").val(address);
    $("#edit_phone").val(phone);
    });

</script>
