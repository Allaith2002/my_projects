<?php
    require_once APPROOT . '/Views/Includes/header.php';
?>


<h1>Welcome to the Admin Dashboard</h1>
    <!-- Add your dashboard content here -->


<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Edit</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['dashboards'] as $dashboard) {?>
                    <tr>
                        <input type="hidden" id="id" value="<?= $dashboard->Id ?>">
                        <td> <?= $dashboard->Id ?> </td>
                        <td> <?= $dashboard->UserName ?> </td>
                        <td class="float">
                            <a class="btn btn-info" href="<?php URLROOT; ?>/Admin/details/<?= $dashboard->Id ?>"><i class="fab fa-readme" title="details sollicitatie"></i></a>
                        </td>
                        <td class="Float-left">
                             <a class="btn btn-danger" href="<?php URLROOT; ?>/sollicitatie/delete/<?= $dashboard->Id ?>"><i class="fab fa-trash" title="delete sollicitatie"></i></a> 
                        </td>

                    </tr>
        <?php }?>
    </tbody>
</table> 





    <?php require_once APPROOT . '/Views/Includes/footer.php'; ?>
