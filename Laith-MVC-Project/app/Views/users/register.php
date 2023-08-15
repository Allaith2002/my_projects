<?php require_once APPROOT . '/Views/Includes/header.php'; ?>

<h2>Register</h2>
<form action="<?php echo URLROOT; ?>/users/register" method="POST">
    <div>
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" value="<?php echo isset($data['firstname']) ? $data['firstname'] : ''; ?>">
        <span class="error"><?php echo isset($data['errors']['firstname']) ? $data['errors']['firstname'] : ''; ?></span>
    </div>
    <div>
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" value="<?php echo isset($data['lastname']) ? $data['lastname'] : ''; ?>">
        <span class="error"><?php echo isset($data['errors']['lastname']) ? $data['errors']['lastname'] : ''; ?></span>
    </div>
    <div>
        <label for="callsign">Call Sign:</label>
        <input type="text" name="callsign" value="<?php echo isset($data['callsign']) ? $data['callsign'] : ''; ?>">
        <span class="error"><?php echo isset($data['errors']['callsign']) ? $data['errors']['callsign'] : ''; ?></span>
    </div>
    <div>
        <label for="mobile">Mobile:</label>
        <input type="text" name="mobile" value="<?php echo isset($data['mobile']) ? $data['mobile'] : ''; ?>">
        <span class="error"><?php echo isset($data['errors']['mobile']) ? $data['errors']['mobile'] : ''; ?></span>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
        <span class="error"><?php echo isset($data['errors']['email']) ? $data['errors']['email'] : ''; ?></span>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password">
        <span class="error"><?php echo isset($data['errors']['password']) ? $data['errors']['password'] : ''; ?></span>
    </div>
    <div>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password">
        <span class="error"><?php echo isset($data['errors']['confirm_password']) ? $data['errors']['confirm_password'] : ''; ?></span>
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>

<?php require_once APPROOT . '/Views/Includes/footer.php'; ?>
