<?php 
foreach ($sarray as $state)
 {
  ?>
  <option value="<?php echo $state->sid?>"><?php echo $state->name;?></option>
  <?php
}