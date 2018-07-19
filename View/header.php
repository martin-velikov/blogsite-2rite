<div class="header">
    <div class="shell">
        <div class="header__body" id="headerBody">
            <form action="Controller/Logout.php" method="post">
                <input type="submit" value="Logout" class="btn" name="logout">
            </form>
            <a href="index.php"><h1 class="header__title">2Rite</h1></a>

            <?php
            if (isset($_SESSION['User'])) {
                include __DIR__."/userpanel.php";
            }
            if (!isset($_SESSION['User'])) {
                include __DIR__."/login.php";
            }
            ?>

        </div><!-- /.header__body -->
    </div><!-- /.shell -->
</div><!-- /.header -->