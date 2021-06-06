<?php include('config.php');?>
<table class="w3-table" border="1">
  
        <tr rowspan="2">
          <th width="25%">
           <font color="black"> <b>Item Name</b></font>
        </th>
          <th width="25%">
           <font color="black"> <b>Purchase Rate</b></font>
        </th>
          <th><font color="black"><b>Quantity</b></font></th>
          <th><font color="black"><b>Unit</b></font></th>
           <th>
           <font color="black"> <b>Expiry Date:</b></font>
        </th>
         </tr>
            <tr rowspan="2">
              <td>
               <!--  <input type="text" class="form-control" name="item_name" id="txtname"  placeholder="Enter Item-name"  onkeyup="showUser(this.value);" autocomplete="off">
                 <div id="item_name"> -->
                  <select name="item_name" id="txtname" class="form-control" onchange="showUser(this.value);"  onclick="myfunc(this.value);" onkeyup="dropdown();">
               <option value="">Select Item Name</option>
              
                <?php
                    $q=mysqli_query($db,"select item_name from tblitem where ses_id=".$ses_id);
                  
                  
                    foreach ($q as $item_name){
                ?>
                        <option value="<?php echo $item_name['item_name'];?>"><?php echo $item_name['item_name'];?></option>
                <?php
                    }
                ?>
                  <option value="addnew"  style="background-color: lightgreen" id="myModal"><b>Item not found</b>  </option>  
               <!--  <div id="item_name"> -->
              
        </select>
      
              </div>
              </td>
              <td>
            <input type="text" name="purchase_rate" class="form-control" id="purchase_rate" placeholder="Enter purchase_rate">
          </td>
          <td>
          <input type="text" name="txtqty" class="form-control" placeholder="Enter qty"></td>
          <td>
             <select name="txtunit" id="txtunit" class="form-group">
             <Option value="">Unit:</option>
              <Option value="kg">Kg</option>
              <Option value="g">g</option>
              <Option value="ml">ml</option>
              <Option value="ltr">ltr</option>
       
      </SELECT>
         </td>
         <td>
            <input type="date" class="form-control" name="txtedate" id="txtedate"   placeholder="Enter Expiry Date" >
         </td>

        </tr>
        </table>
