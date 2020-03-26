<h2>Browse</h2>

<?php 
    $this->load->view('menu/header');
    foreach ($BrowseItems as $row) {
       echo $row['id_products'].$row['name'].$row['quantity'].$row['price'];
    } 
    $this->load->view('menu/footer');
?>