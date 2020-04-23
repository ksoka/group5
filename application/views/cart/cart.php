
<div class="container">
    <h1> This is your shopping cart</h1>
    <table class="table table-sm table-bordered">
        <thead>
            <tr>
                <th>Product</th><th>Price</th> <th>Quantity</th> <th>Total Price</th>
            </tr>
        </thead>
        <tbody onload="createSum()">
            <?php
                foreach ($item_info as $row)
                {
                    echo '<tr>';
                    echo '<td>'.$row['name'].'</td><td>'.$row['price'].'</td>
                          <td>'.$_SESSION['cart'][$row['id_products']].'</td>
                          <td id="sum">'.($row['price']*$_SESSION['cart'][$row['id_products']]).' €</td>
                          <td class="trashCanTD"> <form action="'.site_url('cart/delete').'">
                          <input type="hidden" id="id_for_delete" name="id_for_delete" value="'.$row['id_products'].'"</input>
                          <input type=image class="trashIcon" src="'.base_url('assets/images/trashCan.png').'"</input></form></td>';
                    echo '</tr>';
                }
                echo '<tr>';
                echo '<td></td><td></td><td class="textRight bolded">Total sum</td><td id="outputSum"></td>';
                echo '<tr>';
            ?>
        </tbody>
    </table>
</div>

<div class="container paddingTop">
  <div class="row">
    <div class="col-sm">
        <a href=<?php echo site_url('browse/browse')?>>Get back to shopping</a>
    </div>
    <div class="col-sm">
        <form action=<?php echo site_url('cart/confirmation'); ?> method="post"> 
            <input class="btn btn-primary" type="submit" value="Continue to purchase all these wonderfull products!">
        </form>
    </div>
    <div class="col-sm">
        <form action=<?php echo site_url('cart/empty'); ?> method="post"> 
            <input class="btn btn-danger" type="submit" value="Empty cart">
        </form>
    </div>
  </div>
</div>

<script>

var container = document.querySelectorAll("#sum");
var container_length = container.length;
var output="";

for(i = 0;
    i < container_length;
    i++){
        number = container[i].innerHTML;
        number = parseInt(number);
        output = parseFloat(output + number);
    }

document.getElementById("outputSum").innerHTML = output +" €";

</script>