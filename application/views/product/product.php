<div class="container">
  <div class="row">
    <div class="col paddingTop title">
        <?php
            foreach ($information as $row)
            { 
                echo $row['name'];
            }
        ?>
    </div>
  </div>
  <div class="row">
    <div class="col">
        <?php
            foreach ($information as $row)
            { 
                echo '<img class="paddingTop" src="'.base_url('assets/images/').$row['image'].'"</div>'  ;
            }
        ?>
    </div>
    <div class="col">
        <div>
            <?php
                foreach ($information as $row)
                { 
                    echo '<span class="title">'.$row['price'].' € </span> '.($row['price']/$row['quantity']).' €/a roll<br>';
                    echo 'One package includes <span class="bolded">'.$row['quantity']. ' </span>roll(s)';
                }
            ?>
        </div>
        <div class="paddingTop" id="productInfoBox">
            <?php
                foreach ($information as $row)
                {
                    echo $row['info'];
                }
            ?>
        </div>
        <div class="paddingTop">
            <form action="/action_page.php">
                <label for="quantity">Quantity:</label>
                <input style="width:50px;" type="number" value="1" id="quantity" name="quantity" min="1">
                <input class="btn btn-primary" type="submit" value="Add to cart">
            </form>
        </div>
    </div>
  </div>
</div>