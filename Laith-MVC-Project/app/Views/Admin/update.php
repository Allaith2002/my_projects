<?php
require_once APPROOT . '/Views/Includes/header.php';
?>

<div class="container container-mvckdemo">
    <div class="wrapper-mvckdemo">
        <div class="form-group">
            <h2>Bijwerken Sollicitatie</h2>
            <form id="UpdateUser" method="POST" action="<?= URLROOT; ?>/Admin/update/<?= $data->Id ?>"
                autocomplete="on">
                <input type="hidden" name="Id" value="<?= $data->Id ?>">

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Username *</label>
                    <input type="text" class="input-field-error-message" name="UserName" required="true" maxlength="255"
                        value="<?= $data->UserName ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Password *</label>
                    <input type="password" class="input-field-error-message" name="Password" required="true"
                        maxlength="255" value="<?= $data->Password ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Email *</label>
                    <input type="email" class="input-field-error-message" name="Email" required="true" maxlength="255"
                        value="<?= $data->Email ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Role ID *</label>
                    <select class="form-control" name="RoleId" required>
                        <option value="1" <?= ($data->RoleId === '1') ? 'selected' : '' ?>>Admin</option>
                        <option value="2" <?= ($data->RoleId === '2') ? 'selected' : '' ?>>Member</option>
                    </select>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Mobile *</label>
                    <input type="text" class="input-field-error-message" name="Mobile" required="true" maxlength="11"
                        value="<?= $data->Mobile ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">First Name *</label>
                    <input type="text" class="input-field-error-message" name="FirstName" required="true" maxlength="50"
                        value="<?= $data->FirstName ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Last Name *</label>
                    <input type="text" class="input-field-error-message" name="LastName" required="true" maxlength="50"
                        value="<?= $data->LastName ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Call Sign *</label>
                    <input type="text" class="input-field-error-message" name="CallSign" required="true" maxlength="50"
                        value="<?= $data->CallSign ?>">
                </div>

                <div class="form-group row float-lg-right">
                    <a class="btn btn-primary mr-1" href="<?= URLROOT; ?>/Sollicitatie/index">Back</a>
                    <button type="submit" class="btn btn-success">Save</button>
                        
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once APPROOT . '/Views/Includes/footer.php';
?>
