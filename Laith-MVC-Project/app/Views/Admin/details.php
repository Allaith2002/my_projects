<?php
require_once APPROOT . '/Views/Includes/header.php';
?>

<?php

$userDetailsData = $data;

?>


<div class="container container-mvckdemo">
    <div class="wrapper-mvckdemo">
        <div class="form-group">
            <h2>Details van userDetails</h2>
            <form id="userDetails" method="GET" action="<?= URLROOT; ?>/Admin/details?id=">

                <div class="form-group row">
                    <label class="col-sm-3 control-label">UserName</label>
                    <input type="text" disabled value="<?= $data->UserName ?>"></input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label"> Password</label>
                    <input type="text" disabled value="<?= $data->Password ?>"></input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Email</label>
                    <input type="text" disabled value="<?= $data->Email ?>"></input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">ROLE</label>
                    <input type="text" disabled value="<?= $data->ROLE ?>"></input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Mobile</label>
                    <input type="text" disabled value="<?= $data->Mobile ?>"></input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">FirstName</label>
                    <input type="text" disabled value="<?= $data->FirstName ?>"></input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">UserName</label>
                    <input type="text" disabled value="<?= $data->LastName ?>"></input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">CallSign</label>
                    <input type="text" disabled value="<?= $data->CallSign ?>"></input>
                </div>



                <div class="form-group row float-lg-right">
                    <a class="btn btn-primary mr-1" href="<?php URLROOT; ?>/Admin/index">Back</a>
                    <a class="btn btn-warning" href="<?php URLROOT; ?>/Admin/update/<?= $data->Id ?>">Update</a>
                </div>

                <br>
            
            </form>
        </div>
    </div>
</div>


<?php
require_once APPROOT . '/Views/Includes/footer.php';
?>