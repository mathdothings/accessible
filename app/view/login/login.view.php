<?php require_once ROOT . '/app/view/partial/head.php'; ?>

<article class="center-container">
    <main class="main container">
        <form method="post" class="flex-container main__form__card main__form" autocomplete="off">
            <h1 class="main__form__title">Accessible</h1>
            <label for="email"></label>
            <input type="text" name="email" id="login-email" autofocus placeholder="Email" class="main__form__input" value="">
            <smail class="main__form__validation main__form__validation-error"></smail>
            <label for="password"></label>
            <input type="password" name="password" id="login-password" placeholder="Password" class="main__form__input">
            <smail class="main__form__validation main__form__validation-error"></smail>
            <input type="submit" name="login" class="main__form__button" value="Log in!">
            <small class="main__form__validation main__form__validation-success"></small>
        </form>
        <p class="main__form__paragraph main__form__card">Don't have an account? <a href="/signup" class="main__form__paragraph__link">Sign up!</a></p>
    </main>
</article>
<?php require_once ROOT . '/app/view/partial/foot.php'; ?>