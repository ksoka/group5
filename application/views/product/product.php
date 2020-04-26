<h3 class="container"><a href="<?php echo site_url('Browse/browse'); ?>">Back to products </a></h3>
<div class="container">
  <div class="row">
    <div class="col paddingTop title">
        <?php
            echo $information[0]['name'];
        ?>
    </div>
  </div>
  <div class="row">
    <div class="col" >
        <?php
            echo '<img class="marginTop image" src="'.base_url('assets/Images/').$information[0]['image'].'"</div>'  ;
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
            <form        
                <?php //checks whehter the user is logged in or not
                      //if they are logged, they can proceed 
                      //if they are not logged in there will be a pop-up message
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
                    {
                        echo 'action="'.site_url('cart/add').'"';
                    }
                    else{
                        echo 'action="'.site_url('product/notlog').'"';
                    }
                ?> 
                method="post"> 
                <input type="hidden" id="item_id" name="item_id" value=<?php echo $information[0]['id_products']?>>
                <label for="quantity">Quantity:</label>
                <input style="width:50px;" type="number" value="1" id="quantity" name="quantity" min="1">
                <input class="btn btn-primary" type="submit" value="Add to cart">
            </form>
        </div>
            <?php 
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
                {            
                    //if user is logged in, here is no text
                }
                else
                {
                    //if user is not logged in, this text appears
                    echo 'You must log in in order to place an order';
                }
            ?> 
    </div>
  </div>
</div>


