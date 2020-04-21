<div class="container">
    <h1>Please confirm your delivery information</h1>

    <?php
        echo '<span class=bolded> Name </span> <br>';
        echo $userInfo[0]['firstname'].' '.$userInfo[0]['lastname']. '<br>' ;
        echo '<span class=bolded> Address </span> <br>';
        echo $userInfo[0]['address'].'<br>';
        echo $userInfo[0]['zip'].', '.$userInfo[0]['city']. '<br>' ;
        echo '<span class=bolded> Phone number </span> <br>';
        echo $userInfo[0]['phone'].'<br><br>' ;
    ?>
   
   <div class="row">
    <div class="col-sm">
        Yes, it's correct let's buy these things!
        <form action=<?php echo site_url('cart/purchase'); ?> method="post"> 
            <input class="btn btn-primary" type="submit" value="BUY">
        </form>
    </div>
    <div class="col-sm">
        No, I want to modify my information on my page
        <form action=<?php echo site_url('User/show_user'); ?> method="post"> 
            <input class="btn btn-warning" type="submit" value="to my page">
        </form>
    </div>
    <div class="col-sm">
    </div>
  </div>

 
</div>