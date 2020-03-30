<h2>Browse</h2>

<?php 
    $this->load->view('menu/header');
    foreach ($BrowseItems as $row) {
       echo '<img src="assets\Images\gold-toilet-paper.jpg" id="image">'.$row['name'].' '.$row['quantity'].' '.$row['price'].'€ ' ;
    } 
    $this->load->view('menu/footer');
?>