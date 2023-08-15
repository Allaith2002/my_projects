

<nav class="top-nav">
    <ul>
        <li>
            <a href="<?= URLROOT; ?>/index">Home</a>
        </li>
        <?php if (SessionHelper::has('user_id')) : ?>
            <?php if (SessionHelper::get('user_role_id') == 1) : // Assuming role ID 1 represents the admin role ?>
                <li>
                    <a href="<?= URLROOT; ?>/Admin">Dashboard</a>
                </li>
            <?php else : ?>
                <li>
                    <a href="<?= URLROOT; ?>/member/profile">Profile</a>
                </li>
            <?php endif; ?>
            <li>
                <a href="<?= URLROOT; ?>/users/logout">Logout</a>
            </li>
        <?php else : ?>
            <li>
                <a href="<?= URLROOT; ?>/users/login">Login</a>
            </li>
            <li>
                <a href="<?= URLROOT; ?>/users/register">Register</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>



