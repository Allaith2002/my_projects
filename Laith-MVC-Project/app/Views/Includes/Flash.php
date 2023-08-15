<!-- Flash.php -->
<?php if (FlashHelper::has('success')): ?>
    <div class="flash-message success">
        <?php echo FlashHelper::get('success'); ?>
    </div>
<?php elseif (FlashHelper::has('error')): ?>
    <div class="flash-message error">
        <?php echo FlashHelper::get('error'); ?>
    </div>
<?php endif; ?>
