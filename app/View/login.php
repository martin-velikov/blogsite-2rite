<div class="login" id="login">
    <div class="title">Login</div>
    <form action="/" method="post" class="login-form">
        <div class="form__row">
            <input type="text" class="field" name="username" placeholder="Your username" pattern="[a-zA-Z]{4,25}" required>
        </div><!-- /.form__row -->

        <div class="form__row">
            <input type="password" class="field" name="password" placeholder="Your password" pattern="{7,30}" required>
        </div><!-- /.form__row -->

        <div class="form__row">
            <div class="form__controls">
                <input type="hidden" value="secret" name="passCode">
                <input type="Submit" class="btn" value="Login" name="login">

                <a class="btn" onclick="showRegister()">Register</a>
            </div><!-- /.form__controls -->
        </div><!-- /.form__row -->
    </form><!-- /.login-form -->
</div><!-- /.login -->

<script>
    function showRegister() {
        document.getElementById("login").style.display = "none";
        $('#headerBody').load('/view/register-component.php');
        document.getElementById("headerBody").innerHTML = '<h1 class="header__title">2Rite</h1>';
    }
</script>