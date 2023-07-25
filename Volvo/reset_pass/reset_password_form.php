<!-- reset_password_form.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>
<body>
<div class="form-container">
    <header>Reset Password</header>
    <form action="reset_password.ph" method="post">
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">

        <div class="field input">
            <label for="new_password">New Password</label>
            <input type="password" name="new_password" id="new_password" required placeholder="Enter your new password" autocomplete="off">
        </div>

        <div class="field input">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" required placeholder="Confirm your new password" autocomplete="off">
        </div>

        <div class="field">
            <input type="submit" name="submit" value="Reset Password" class="form-btn">
        </div>
    </form>
</div>
</body>
</html>
