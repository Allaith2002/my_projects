<?php require_once APPROOT . '/Views/Includes/header.php'; ?>


<div class="container container-mvckdemo">
    <div class="wrapper-mvckdemo">
        <div class="form-group">
            <h2>Maken nieuwe Allergeen</h2>
            <form id="Allergeen" method="POST" action="<?= URLROOT; ?>/Allergeen/create" autocomplete="on">

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Klanten *</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="Klanten" required maxlength="50" value="<?= $data['Klanten'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Allergie *</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="Allergie" required maxlength="50" value="<?= $data['Allergie'] ?>">
                    </div>
                </div>

                <div class="form-group row float-lg-right">
                    <a class="btn btn-primary mr-1" href="<?= URLROOT; ?>/Allergeen/index">Back</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>

                1 = Gluten
                2 = Pinda
                3 = Schaaldieren
                4 = Hazelnoten
                5 = Lactose
                df

            </form>
        </div>
    </div>
</div>


<?php require_once APPROOT . '/Views/Includes/footer.php'; ?>
