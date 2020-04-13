<link rel="stylesheet" href="assets\css\style.css">
<?php 
    $this->load->view('menu/header');
    echo '<h2 id="world">The world of toilet paper</h2>'.'<div class="container">'.'<div class row row-cols-3' ;
    foreach ($BrowseItems as $row) {
       echo '<img src="'.base_url('assets/images/').$row['image'].'" id="image"> <div id="items">'.$row['name'].' <br> '.$row['price'].'€ </div>'   ;
    }
    echo '</div>'.'</div>'; 
    $this->load->view('menu/footer');
?>