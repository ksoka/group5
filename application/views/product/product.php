<div class="container">
  <div class="row">
    <div class="col paddingTop title">
        <?php
            echo $information[0]['name'];
        ?>
    </div>
  </div>
  <div class="row">
    <div class="col">
        <?php
            echo '<img class="paddingTop" src="'.base_url('assets/images/').$information[0]['image'].'"</div>'  ;
        ?>
    </div>
    <div class="col">
        <div>
            <?php
                echo '<span class="title">'.$information[0]['price'].' € </span> '.($information[0]['price']/$information[0]['quantity']).' €/a roll<br>';
                echo 'One package includes <span class="bolded">'.$information[0]['quantity']. ' </span>roll(s)';
            ?>
        </div>
        <div class="paddingTop" id="productInfoBox">
            <?php
                echo $information[0]['info'];
            ?>
        </div>
        <div class="paddingTop">
            <form action=<?php echo site_url('cart'); ?> method="post"> 
                <input type="hidden" id="item_id" name="item_id" value=<?php echo $information[0]['id_products']?>>
                <label for="quantity">Quantity:</label>
                <input style="width:50px;" type="number" value="1" id="quantity" name="quantity" min="1">
                <input class="btn btn-primary" type="submit" value="Add to cart">
            </form>
        </div>
    </div>
  </div>
</div>