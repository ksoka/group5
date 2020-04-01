<link rel="stylesheet" href="assets\css\style.css">
<?php 
    $this->load->view('menu/header');
    echo '<h2>Browse</h2>'.'<div id="content">' ;
    foreach ($BrowseItems as $row) {
       echo '<img src="assets\Images\gold-toilet-paper.jpg" id="image">'.$row['name'].' quantity: '.$row['quantity'].' '.$row['price'].'€' ;
    } 
    echo '</div>';
    $this->load->view('menu/footer');
?>