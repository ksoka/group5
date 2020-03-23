<h2>Browse</h2>

<?php 
    foreach ($BrowseItems as $row) {
       echo .$row['id_products'].$row['name'].$row['quantity'].$row['price'];
    } 
?>