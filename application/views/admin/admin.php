
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
  <input type="checkbox" id="admin" name="admin" value="1"> <br>

  <label for="password">password*</label> <br>
  <input type="text" id="password" name="password" value=""> <br>
  <br>
  <input type="submit" name="" value="Add user">
</form>


<h2>Users</h2>
<div class="scrollable">
    <table class="container table table-bordered table-hover table-sm">
        <thead class="thead-light">
            <tr>
                <!-- Potential searchbars -->
                <td><form autocomplete="off" action="<?php echo site_url('Admin/user_id_search'); ?>" method="post" ><input name="user_id_search" type="text"></form></td>
                <td><form autocomplete="off" action="<?php echo site_url('Admin/username_search'); ?>" method="post" ><input name="username_search" type="text"></form></td>
                <td><form autocomplete="off" action="<?php echo site_url('Admin/firstname_search'); ?>" method="post" ><input name="firstname_search" type="text"></form></td>
                <td><form autocomplete="off" action="<?php echo site_url('Admin/lastname_search'); ?>" method="post" ><input name="lastname_search" type="text"></form></td>
                <td><form autocomplete="off" action="<?php echo site_url('Admin/city_search'); ?>" method="post" ><input name="city_search" type="text"></form></td>
                <td><form autocomplete="off" action="<?php echo site_url('Admin/zip_search'); ?>" method="post" ><input name="zip_search" type="text"></form></td>
                <td><form autocomplete="off" action="<?php echo site_url('Admin/address_search'); ?>" method="post" ><input name="address_search" type="text"></form></td>
                <td><form autocomplete="off" action="<?php echo site_url('Admin/phone_search'); ?>" method="post" ><input name="phone_search" type="text"></form></td>
            </tr>
            <tr>
                <th>User Id</th> <th>Username</th><th>Firstname</th> <th>Lastname</th> <th>City</th> <th>Zip</th> <th>Address</th> <th>Phone</th> <th>Edit</th> <th>Delete</th> 
            </tr>
        </thead>
        <tbody>
                <!-- Outputs the search results in the table -->
            <?php
                if(isset($load_search) && $load_search == true){
                    foreach ($result as $row)
                    {
                        echo '<tr>';
                        echo '<td>'.$row['id_user'].'</td><td>'.$row['username'].'</td><td>'.$row['firstname'].'</td><td>'.$row['lastname'].'</td><td>'
                            .$row['city'].'</td>'.'<td>'.$row['zip'].'</td><td>'.$row['address'].'</td><td>'.$row['phone'].'</td>';
                        echo '<td> <button id ="editUserInfo" class="btn btn-primary myBtn" data-toggle="modal" data-target="#editModal" 
                            data-id_user="'.$row['id_user'].'" data-username="'.$row['username'].'" data-firstname="'.$row['firstname'].'"
                            data-lastname="'.$row['lastname'].'"data-city="'.$row['city'].'"data-zip="'.$row['zip'].'"
                            data-address="'.$row['address'].'"data-phone="'.$row['phone'].'">Edit</button></td>';
                            echo '<td><button type="button" id="deleteBtn" class="btn btn-danger myBtn" data-toggle="modal" data-target="#deleteModal" 
                            data-id_user="'.$row['id_user'].'" data-username="'.$row['username'].'" data-firstname="'.$row['firstname'].'"
                            data-lastname="'.$row['lastname'].'"data-city="'.$row['city'].'"data-zip="'.$row['zip'].'"
                            data-address="'.$row['address'].'"data-phone="'.$row['phone'].'"> Delete </button></td>';
                        echo '</tr>';
                    }
                }
                // If no search result exists then all database entries will be printed
                else{
                    foreach ($allUsers as $row)
                    {
                        echo '<tr>';
                        echo '<td>'.$row['id_user'].'</td><td>'.$row['username'].'</td><td>'.$row['firstname'].'</td><td>'.$row['lastname'].'</td><td>'
                            .$row['city'].'</td>'.'<td>'.$row['zip'].'</td><td>'.$row['address'].'</td><td>'.$row['phone'].'</td>';
                        echo '<td> <button id ="editUserInfo" class="btn btn-primary myBtn" data-toggle="modal" data-target="#editModal" 
                            data-id_user="'.$row['id_user'].'" data-username="'.$row['username'].'" data-firstname="'.$row['firstname'].'"
                            data-lastname="'.$row['lastname'].'"data-city="'.$row['city'].'"data-zip="'.$row['zip'].'"
                            data-address="'.$row['address'].'"data-phone="'.$row['phone'].'">Edit</button></td>';
                            echo '<td><button type="button" id="deleteBtn" class="btn btn-danger myBtn" data-toggle="modal" data-target="#deleteModal" 
                            data-id_user="'.$row['id_user'].'" data-username="'.$row['username'].'" data-firstname="'.$row['firstname'].'"
                            data-lastname="'.$row['lastname'].'"data-city="'.$row['city'].'"data-zip="'.$row['zip'].'"
                            data-address="'.$row['address'].'"data-phone="'.$row['phone'].'"> Delete </button></td>';
                        echo '</tr>';
                    }
                }
            ?>
        </tbody>
    </table>
</div>
<h2 class="paddingTop">Products</h2>
<div class="scrollable">
    
    <table class="container table table-bordered table-hover table-sm">
        <thead class="thead-light">
            <tr>
                <th>Product id</th> <th>Name</th><th>Quantity</th> <th>Price</th> <th>Image name</th> <th>Info</th> <th>Edit</th>  <th>Delete</th>  
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($allProducts as $row)
                {
                    echo '<tr>';
                    echo '<td>'.$row['id_products'].'</td><td>'.$row['name'].'</td><td>'.$row['quantity'].'</td><td>'.$row['price'].'</td><td>'
                        .$row['image'].'</td>'.'<td>'.$row['info'].'</td>';
                    echo '<td> <button id ="editProducts" class="btn btn-primary myBtn" data-toggle="modal" data-target="#editProductsModal" 
                        data-id_products="'.$row['id_products'].'" data-name="'.$row['name'].'" data-quantity="'.$row['quantity'].'"
                        data-price="'.$row['price'].'"data-image="'.$row['image'].'"data-info="'.$row['info'].'">Edit</button></td>';
                        echo '<td><button type="button" id="deleteProductsBtn" class="btn btn-danger myBtn" data-toggle="modal" data-target="#deleteProductsModal" 
                        data-id_products="'.$row['id_products'].'" data-name="'.$row['name'].'" data-quantity="'.$row['quantity'].'"
                        data-price="'.$row['price'].'"data-image="'.$row['image'].'"data-info="'.$row['info'].'"> Delete </button></td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>
<!-- EditModal for users -->
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
                        <label for="edit_address">Address</label><br>
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
<!-- deleteModal for Users-->
<div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete a User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="<?php echo site_url('admin/delete_user'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="delete_id_user" name="id_user" value="" >
                            Do you really want to delete this user? <br>
                        <label for="delete_username">Username</label> <br>
                        <input type="text" id="delete_username" name="username" value="" disabled> <br>
                        <label for="delete_firstname">Firstname</label> <br>
                        <input type="text" id="delete_firstname" name="firstname" value="" disabled> <br>
                        <label for="delete_lastname">Lastname</label> <br>
                        <input type="text" id="delete_lastname" name="lastname" value="" disabled> <br>
                    </div>
                    <input type="submit" class="btn btn-danger " name="" value="Delete">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- EditModal for Products -->
<div class="modal fade" id="editProductsModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Products information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="<?php echo site_url('admin/edit_products'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="edit_id_products" name="id_products" value="">
                        <label for="edit_name">Product name</label><br>
                        <input type="text" id="edit_name" name="name" value=""> <br>
                        <label for="edit_quantity">Quantity</label><br>
                        <input type="text" id="edit_quantity" name="quantity" value=""> <br>
                        <label for="edit_price">Price</label><br>
                        <input type="text" id="edit_price" name="price" value=""> <br>
                        <label for="edit_image">Image</label><br>
                        <input type="text" id="edit_image" name="image" value=""> <br>
                        <label for="edit_info">Info</label><br>
                        <input type="text" id="edit_info" name="info" value=""> <br>
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
<!-- deleteModal for Products-->
<div class="modal fade" id="deleteProductsModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete a Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="<?php echo site_url('admin/delete_products'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="delete_id_products" name="id_products" value="" >
                            Do you really want to delete this product? <br>
                        <label for="delete_name">Name</label> <br>
                        <input type="text" id="delete_name" name="name" value="" disabled> <br>
                        <label for="delete_quantity">quantity</label> <br>
                        <input type="text" id="delete_quantity" name="quantity" value="" disabled> <br>
                        <label for="delete_price">Price</label> <br>
                        <input type="text" id="delete_price" name="price" value="" disabled> <br>
                        <label for="delete_image">Image name</label> <br>
                        <input type="text" id="delete_image" name="image" value="" disabled> <br>
                        <label for="delete_info">Selling pitch</label> <br>
                        <input type="text" id="delete_info" name="info" value="" disabled> <br>
                    </div>
                    <input type="submit" class="btn btn-danger " name="" value="Delete">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

 <!-- Adding data to database -->
    <h3> <u>Adding data</u></h3>
    <form class="adduser_form" action="<?php echo site_url('Admin/adding_data'); ?>" method="post" autocomplete="off">
        <label for="name">product name* </label> <br>
        <input type="text" id="name" name="name" value=""> <br> 

        <label for="quantity">product quantity* </label> <br>
        <input type="text" id="quantity" name="quantity" value=""> <br> 

        <label for="price">product price (in euro)* </label> <br>
        <input type="text" id="price" name="price" value=""> <br> 

        <label for="image">image filename* </label> <br>
        <input type="text" id="image" name="image" value=""> <br> 
        <br>
        <input type="submit" name="" value="Add products">

    </form>


<script>


    //for editing the user
    $(document).on( "click", '#editUserInfo',function(e) 
    {
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

    //for deleting the user
    $(document).on( "click", '#deleteBtn',function(e) 
    {
        console.log("delete modal open");
        var id_user = $(this).data('id_user');
        var username = $(this).data('username');
        var firstname = $(this).data('firstname');
        var lastname = $(this).data('lastname');
        var city = $(this).data('city');
        var zip = $(this).data('zip');
        var address = $(this).data('address');
        var phone = $(this).data('phone');
        console.log('id_user = '+id_user);

        $("#delete_id_user").val(id_user);
        $("#delete_username").val(username);
        $("#delete_firstname").val(firstname);
        $("#delete_lastname").val(lastname);
        $("#delete_city").val(city);
        $("#delete_zip").val(zip);
        $("#delete_address").val(address);
        $("#delete_phone").val(phone);
    });

    //for editing the products
    $(document).on( "click", '#editProducts',function(e) 
    {
        console.log("Update modal open");
        var id_products = $(this).data('id_products');
        var name = $(this).data('name');
        var quantity = $(this).data('quantity');
        var price = $(this).data('price');
        var image = $(this).data('image');
        var info = $(this).data('info');
        console.log('id_products = '+id_products);

        $("#edit_id_products").val(id_products);
        $("#edit_name").val(name);
        $("#edit_quantity").val(quantity);
        $("#edit_price").val(price);
        $("#edit_image").val(image);
        $("#edit_info").val(info);
    });

    //for deleting the Products
    $(document).on( "click", '#deleteProductsBtn',function(e) 
    {
        console.log("delete modal open");
        var id_products = $(this).data('id_products');
        var name = $(this).data('name');
        var quantity = $(this).data('quantity');
        var price = $(this).data('price');
        var image = $(this).data('image');
        var info = $(this).data('info');
        console.log('id_products = '+id_products);

        $("#delete_id_products").val(id_products);
        $("#delete_name").val(name);
        $("#delete_quantity").val(quantity);
        $("#delete_price").val(price);
        $("#delete_image").val(image);
        $("#delete_info").val(info);
    });


</script>


