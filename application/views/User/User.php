<h2> This is the user page</h2>
<br>
<h3> User Information </h3>
<!-- Table for the users information-->
<table class="table">
    <thead>
        <tr>
            <th>firstname</th> <th>lastname</th> <th>city</th> <th>zip</th> <th>address</th> <th>phone</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($user as $row)
            {
                echo '<tr>';
                echo '<td>'.$row['firstname'].'</td><td>'.$row['lastname'].'</td><td>'.$row['city'].'</td>'
                    .'<td>'.$row['zip'].'</td><td>'.$row['address'].'</td><td>'.$row['phone'].'</td>';
                echo '</tr>';
            }
        ?>
        
    </tbody>
</table>
<button class="button">Edit information</button>
<br>
<h3> Previously bought items </h3> 

<!-- table for all the purchased items, not working yet :) -->

<table class="table">
    <thead>
        <tr>
            <th>time</th> <th>id_products</th> <th>amount</th> <th>price</th>
        </tr>
    </thead>
    <tbody>
<!--         <?php
            foreach ($something as $row)
            {
                echo '<tr>';
                echo '<td>'.$row['time'].'</td><td>'.$row['id_products']
                    .'</td><td>'.$row['amount'].'</td>'.'<td>'.$row['price'];
                echo '</tr>';
            }
        ?>
 -->  
    </tbody>
</table>