<link rel="stylesheet" href="assets\css\style.css">
<?php 
    $this->load->view('menu/header');
    echo '<h2 id="world">The world of toilet paper</h2>'.'<div id="content">' ;
    foreach ($BrowseItems as $row) {
       echo '<img src="'.base_url('assets/images/').$row['image'].'" id="image"> <div id="info">'.$row['name'].' <br> '.$row['price'].'€ </div>'  ;
    }
    echo '</div>'; 
    $this->load->view('menu/footer');
?>

<a href="<?php echo site_url('Product') ?>">to the product</a>