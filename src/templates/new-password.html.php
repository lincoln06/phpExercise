<!doctype html>
<html lang="en">
<?php require_once('head-template.html.php') ?>
<body>
<main>
<header>
    <h1>Odzyskiwanie hasła</h1>
</header>
    <section>
        <?php if(!$success) : ?>
    <form method="post">
        <ul>
            <li>
                <label for="new_password">Nowe hasło</label>
                <input type="password" name="recoverPassword[newPassword]" id="new_password">
                <p class="error">
                <?php if (!empty($errors['newPassword'])): ?>
                    <?php echo $errors['newPassword'] ?>
                <?php endif ?>
                </p>
            </li>
            <li>
                <label for="confirmed_password">Powtórz hasło</label>
                <input type="password" name="recoverPassword[confirmedPassword]" id="confirmed_password">
                <p class="error">
                <?php if (!empty($data['newPassword']) && !empty($data['confirmedPassword']) && $data['newPassword']!==$data['confirmedPassword']): ?>
                    <?php echo $errors['passwordsNotTheSame'] ?>
                <?php endif ?>
                </p>
            </li>
            <li>
                <button type="submit">Send</button>
            </li>
        </ul>
    </form>
        <?php endif ?>
        <?php if ($success): ?>
            <p class="success">Hasło zostało zmienione!</p>
            <a href="/">Wróć na stronę główną</a>
        <?php endif ?>
    </section>
</main>
</body>
</html>