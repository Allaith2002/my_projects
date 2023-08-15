<?php require_once APPROOT . '/Views/Includes/header.php'; ?>


<?php if (FlashHelper::has('success')) : ?>
    <div class="flash-message success">
        <?= FlashHelper::get('success'); ?>
    </div>
<?php elseif (FlashHelper::has('error')) : ?>
    <div class="flash-message error">
        <?= FlashHelper::get('error'); ?>
    </div>
<?php endif; ?>


<h2>Login</h2>
<form action="<?php echo URLROOT; ?>/users/login" method="POST">
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
    </div>
    <button type="submit">Login</button>
</form>
<p>Don't have an account? <a href="<?php echo URLROOT; ?>/users/register">Register</a></p>

<?php require_once APPROOT . '/Views/Includes/footer.php'; ?>
