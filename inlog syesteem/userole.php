<?php if (Session::get("roleid") == '1') { ?>

<div class="form-group
<?php if (Session::get("roleid") == '1' && Session::get("id") == $getUinfo->id) {
  echo "d-none";
} ?>
">
  <div class="form-group">
    <label for="sel1">Select user Role</label>
    <select class="form-control" name="roleid" id="roleid">

    <?php

  if($getUinfo->roleid == '1'){?>
    <option value="1" selected='selected'>Admin</option>
    <option value="2">Editor</option>
    <option value="3">User only</option>
  <?php }elseif($getUinfo->roleid == '2'){?>
    <option value="1">Admin</option>
    <option value="2" selected='selected'>Editor</option>
    <option value="3">User only</option>
  <?php }elseif($getUinfo->roleid == '3'){?>
    <option value="1">Admin</option>
    <option value="2">Editor</option>
    <option value="3" selected='selected'>User only</option>


  <?php } ?>   
