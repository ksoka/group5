<h2> Hello and welcome to your page <?php echo $_SESSION['username'] ?></h2>
<br>
<h3> My information </h3>
<!-- Table for the users information-->
<table class="table">
    <thead>
        <tr>
            <th>Id</th><th>Username</th><th>Firstname</th> <th>Lastname</th> <th>City</th> <th>Zip</th> <th>Address</th> <th>Phone</th> 
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($user as $row)
            {
                echo '<tr>';
                echo '<td>'.$row['id_user'].'</td><td>'.$row['username'].'</td><td>'.$row['firstname'].'</td><td>'.$row['lastname'].'</td><td>'.$row['city'].'</td>'
                    .'<td>'.$row['zip'].'</td><td>'.$row['address'].'</td><td>'.$row['phone'].'</td>';
                echo '<td> <button id ="editMyInfo" class="btn btn-primary myBtn" data-toggle="modal" data-target="#editModal" data-id_user="'.$row['id_user'].'" data-firstname="'.$row['firstname'].'"
                data-lastname="'.$row['lastname'].'"data-city="'.$row['city'].'"data-zip="'.$row['zip'].'"data-address="'.$row['address'].'"data-phone="'.$row['phone'].'">Edit information</button></td>';
                echo '</tr>';
            }
        ?>
        
    </tbody>
</table>

<br>
<h3> Previously bought items </h3> 

<!-- table for all the purchased items by the logged in user -->

<table class="table">
    <thead>
        <tr>
            <th>Time</th> <th>Name</th> <th>Id_products</th> <th>Amount</th> <th>Total price</th>
        </tr>
    </thead>
    <tbody>
         <?php
            foreach ($user_products as $row)
            {
                echo '<tr>';
                echo '<td>'.$row['time'].'</td><td>'.$row['name']
                    .'</td><td>'.$row['id_products']
                    .'</td><td>'.$row['amount'].'</td>'.'<td>'.$row['price'];
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
                <h5 class="modal-title">Edit My information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="<?php echo site_url('user/edit_user'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="edit_id_user" name="id_user" value="">
                        <input type="hidden" id="edit_username" name="username" value="">
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
    $(document).on( "click", '#editMyInfo',function(e) {
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