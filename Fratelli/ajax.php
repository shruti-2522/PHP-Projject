<?php
include('config.php');
$query = mysql_query("select * from tblitem where  item_name=".$REQUEST['item_name']);
            while($row = mysql_fetch_assoc($query))
            {
                echo '<option value="'.$row['item_name'].'">'.$row['item_name']. '</option>';
            }
            ?>