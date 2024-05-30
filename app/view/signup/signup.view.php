<?php require_once ROOT . '/app/view/partial/head.php'; ?>

<article class="center-container">
    <main class="main container">
        <form method="post" class="flex-container main__form__card main__form" autocomplete="off">
            <h1 class="main__form__title">Accessible</h1>
            <label for="signup-name"></label>
            <input type="text" name="signup-name" id="signup-name" autofocus placeholder="Name" class="main__form__input" value="">
            <label for="signup-email"></label>
            <input type="text" name="signup-email" id="signup-email" placeholder="Email" class="main__form__input" value="">
            <label for="signup-password"></label>
            <input type="password" name="signup-password" id="signup-password" placeholder="Password" class="main__form__input">
            <label for="signup-repeat-password"></label>
            <input type="password" name="signup-repeat-password" id="signup-repeat-password" placeholder="Repeat Password" class="main__form__input">
            <input type="submit" name="signup" class="main__form__button" value="Sign up!">
            <small class="main__form__validation main__form__validation-success"></small>
            <small class="main__form__validation main__form__validation-error main__form__validation-error--highlight"></small>
        </form>
        <p class="main__form__paragraph main__form__card">Already have an account? <a href="/login" class="main__form__paragraph__link">Log in!</a></p>
    </main>
</article>

<?php require_once ROOT . '/app/view/partial/foot.php'; ?>