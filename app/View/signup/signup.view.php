<?php require_once ROOT . '/app/View/partial/head.php'; ?>

<?php
$validationErros = null;
if (!empty($errors['validation']) && is_array($errors['validation'])) $validationErros = $errors['validation'];

$success = null;
if (!empty($errors['persistance'])) $success = $errors['persistance'];
?>

<article class="center-container">
    <main class="main container">
        <form method="post" class="flex-container signup-main__form__card signup-main__form" autocomplete="off">
            <h1 class="signup-main__form__title">Accessible</h1>
            <label for="signup-name"></label>
            <input type="text" name="signup-name" id="signup-name" autofocus placeholder="Name" class="signup-main__form__input" value="<?= htmlspecialchars($_POST['signup-name'] ?? '') ?>">
            <ul class="signup-main__form__validation">
                <?php if ($validationErros) : ?>
                    <?php foreach ($validationErros['name'] as $value) : ?>
                        <li class="signup-main__form__validation-error "><small><?= $value ?></small></li>
                    <?php endforeach ?>
                <?php endif ?>
            </ul>
            <label for="signup-email"></label>
            <input type="text" name="signup-email" id="signup-email" placeholder="Email" class="signup-main__form__input" value="<?= htmlspecialchars($_POST['signup-email'] ?? '') ?>">
            <ul class="signup-main__form__validation">
                <?php if ($validationErros) : ?>
                    <?php foreach ($validationErros['email'] as $value) : ?>
                        <li class="signup-main__form__validation-error "><small><?= $value ?></small></li>
                    <?php endforeach ?>
                <?php endif ?>
            </ul>
            <label for="signup-password"></label>
            <input type="password" name="signup-password" id="signup-password" placeholder="Password" class="signup-main__form__input">
            <ul class="signup-main__form__validation">
                <?php if ($validationErros) : ?>
                    <?php foreach ($validationErros['password'] as $value) : ?>
                        <li class="signup-main__form__validation-error "><small><?= $value ?></small></li>
                    <?php endforeach ?>
                <?php endif ?>
            </ul>
            <label for="signup-repeat-password"></label>
            <input type="password" name="signup-repeat-password" id="signup-repeat-password" placeholder="Repeat Password" class="signup-main__form__input">
            <ul class="signup-main__form__validation">
                <?php if (!empty($validationErros['repeatPassword'])) : ?>
                    <li class="signup-main__form__validation-error "><small><?= $validationErros['repeatPassword'] ?></small></li>
                <?php endif ?>
            </ul>
            <input type="submit" name="signup" class="signup-main__form__button" value="Sign up!">
            <?php if ($success) : ?>
                <small class="signup-main__form__validation signup-main__form__validation-success"><?= 'Success!' ?></small>
            <?php endif ?>
            <?php if (!empty($success) && !$success) : ?>
                <small class="signup-main__form__validation signup-main__form__validation-error signup-main__form__validation-error--highlight"><?= 'Error!' ?></small>
            <?php endif ?>
        </form>
        <p class="signup-main__form__paragraph signup-main__form__card">Already have an account? <a href="/login" class="signup-main__form__paragraph__link">Log in!</a></p>
    </main>
</article>

<?php require_once ROOT . '/app/View/partial/foot.php'; ?>