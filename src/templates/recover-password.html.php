<!doctype html>
<html lang="en">
<?php require_once('head-template.html.php') ?>
<body>
<header>
    <h1>Odzyskiwanie hasła</h1>

    <?php if ($success): ?>
        <p class="success">Thanks for contacting us, we will respond ASAP.</p>
    <?php endif ?>

    <form method="post">
        <ul>
            <li>
                <label for="contact_email">E-Mail</label>
                <input type="text" placeholder="john@doe.com" name="contact[email]" id="contact_email"
                    <?php if (!empty($data['email'])): ?>
                        value="<?php echo $data['email'] ?>"
                    <?php endif ?>
                >
                <?php if (!empty($errors['email'])): ?>
                    <p class="error"><?php echo $errors['email'] ?></p>
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