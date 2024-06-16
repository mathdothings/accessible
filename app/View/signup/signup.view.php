<?php require_once ROOT . '/app/View/partial/head.php'; ?>

<article class="center-container">
    <main class="main container">
        <form method="post" class="flex-container signup-main__form__card signup-main__form" autocomplete="off">
            <h1 class="signup-main__form__title">Accessible</h1>
            <label for="signup-name"></label>
            <input type="text" name="signup-name" id="signup-name" autofocus placeholder="Name" class="signup-main__form__input" value="<?= htmlspecialchars($_POST['signup-name'] ?? '') ?>">
            <ul class="signup-main__form__validation">
                <?php if (isset($errors)) {
                    foreach ($errors['name'] as $value) { ?>
                        <li class="signup-main__form__validation-error "><small><?= $value ?></small></li>
                <?php }
                } ?>
            </ul>
            <label for="signup-email"></label>
            <input type="text" name="signup-email" id="signup-email" placeholder="Email" class="signup-main__form__input" value="<?= htmlspecialchars($_POST['signup-email'] ?? '') ?>">
            <ul class="signup-main__form__validation">
                <?php if (isset($errors)) {
                    foreach ($errors['email'] as $value) { ?>
                        <li class="signup-main__form__validation-error "><small><?= $value ?></small></li>
                <?php }
                } ?>
            </ul>
            <label for="signup-password"></label>
            <input type="password" name="signup-password" id="signup-password" placeholder="Password" class="signup-main__form__input">
            <ul class="signup-main__form__validation">
                <?php if (isset($errors)) {
                    foreach ($errors['password'] as $value) { ?>
                        <li class="signup-main__form__validation-error "><small><?= $value ?></small></li>
                <?php }
                } ?>
            </ul>
            <label for="signup-repeat-password"></label>
            <input type="password" name="signup-repeat-password" id="signup-repeat-password" placeholder="Repeat Password" class="signup-main__form__input">
            <ul class="signup-main__form__validation">
                <?php if (!empty($errors['repeatPassword'])) { ?>
                    <li class="signup-main__form__validation-error "><small><?= $errors['repeatPassword'] ?></small></li>
                <?php } ?>
            </ul>
            <input type="submit" name="signup" class="signup-main__form__button" value="Sign up!">
            <small class="signup-main__form__validation signup-main__form__validation-success"></small>
            <small class="signup-main__form__validation signup-main__form__validation-error signup-main__form__validation-error--highlight"></small>
        </form>
        <p class="signup-main__form__paragraph signup-main__form__card">Already have an account? <a href="/login" class="signup-main__form__paragraph__link">Log in!</a></p>
    </main>
</article>

<?php require_once ROOT . '/app/View/partial/foot.php'; ?>