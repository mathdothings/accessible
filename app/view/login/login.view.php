<?php require_once ROOT . '/app/view/partial/head.php'; ?>

<article class="center-container">
    <main class="main container">
        <form method="post" class="flex-container login-main__form__card login-main__form" autocomplete="off">
            <h1 class="login-main__form__title">Accessible</h1>
            <label for="email"></label>
            <input type="text" name="email" id="login-email" autofocus placeholder="Email" class="login-main__form__input" value="">
            <smail class="login-main__form__validation login-main__form__validation-error"></smail>
            <label for="password"></label>
            <input type="password" name="password" id="login-password" placeholder="Password" class="login-main__form__input">
            <smail class="login-main__form__validation login-main__form__validation-error"></smail>
            <input type="submit" name="login" class="login-main__form__button" value="Log in!">
            <small class="login-main__form__validation login-main__form__validation-success"></small>
        </form>
        <p class="login-main__form__paragraph login-main__form__card">Don't have an account? <a href="/signup" class="login-main__form__paragraph__link">Sign up!</a></p>
    </main>
</article>
<?php require_once ROOT . '/app/view/partial/foot.php'; ?>