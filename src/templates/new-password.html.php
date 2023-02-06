<!doctype html>
<html lang="en">
<?php require_once('head-template.html.php') ?>
<body>
<header>
    <h1>Odzyskiwanie hasła</h1>
    <form method="post">
        <ul>
            <li>
                <label for="new_password">Nowe hasło</label>
                <input type="password" name="recoverPassword[newPassword]" id="new_password">
                <?php if (!empty($data['newPassword'])): ?>
                    <p class="error"><?php echo $errors['newPassword'] ?></p>
                <?php endif ?>
            </li>
            <li>
                <label for="confirmed_password">Powtórz hasło</label>
                <input type="password" name="recoverPassword[confirmedPassword]" id="confirmed_password">
                <?php if (!empty($data['newPassword']) && !empty($data['confirmedPassword']) && $data['newPassword']!==$data['confirmedPassword']): ?>
                    <p class="error"><?php echo $errors['passwordsNotTheSame'] ?></p>

                <?php endif ?>
            </li>
            <li>
                <button type="submit">Send</button>
            </li>
        </ul>
    </form>
</header>
</body>
</html>