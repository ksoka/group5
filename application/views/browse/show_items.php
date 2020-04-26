<link rel="stylesheet" href="assets\css\style.css">
<?php 
    $this->load->view('menu/header');
    echo '<h2 id="world">The world of toilet paper</h2>'.'<div id="content">' ;
    foreach ($BrowseItems as $row) {
       echo '<div id="content-items">.<a href="'.site_url('product/?product='.$row['id_products']).'"><img src="'.base_url('assets/images/').$row['image'].'" id="image"></a> <div id="items"><span class="bolded">'.$row['name'].'</span> <br> '.$row['price'].'€ <br> One package includes '.$row['quantity'].' rolls. </div> </div>' ;
    }
    echo '</div>'; 
    $this->load->view('menu/footer');
?>