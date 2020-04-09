
<div class="container">
    <h1> This is your shopping cart</h1>
    <table class="table table-sm table-bordered">
        <thead>
            <tr>
                <th>Product</th><th>Price</th> <th>Quantity</th> <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($item_info as $row)
                {
                    echo '<tr>';
                    echo '<td>'.$row['name'].'</td><td>'.$row['price']
                        .'</td><td>'.$quantity.'</td><td>'.($row['price']*$quantity).' €</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>
<div class="container">
    <a href=<?php echo site_url('browse/browse')?>>Get back to shopping</a>
</div>