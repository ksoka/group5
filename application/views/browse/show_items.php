<link rel="stylesheet" href="assets\css\style.css">
<?php 
    $this->load->view('menu/header');
    echo '<h2 id="world">The world of toilet paper</h2>'.'<div id="content">' ;
    foreach ($BrowseItems as $row) {
       echo '<img src="assets\Images\gold-toilet-paper.jpg" id="image"> <div id="info">'.$row['name'].' <br> '.$row['price'].'€ </div>'  ;
    }
    echo '</div>'; 
    $this->load->view('menu/footer');
?>