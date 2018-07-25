<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />

    <title><?= $this->siteTitle(); ?></title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="<?= PROOT ?>css/style.css"/>
    <script src="<?= PROOT ?>css/js/jquery.min.js"></script>

</head>

<body>


    <div class="header">
        <div class="shell">
            <div class="header__body" id="headerBody">

                <a href="home"><h1 class="header__title">2Rite</h1></a>

                <?php
                if (!isset($_SESSION['User'])) {
                    include "/app/web/app/View/components/login.php";
                }
                if (isset($_SESSION['User'])) {
                    include "/app/web/app/View/components/userpanel.php";
                }
                ?>

            </div><!-- /.header__body -->
        </div><!-- /.shell -->
    </div><!-- /.header -->

    <h1> Welcome to <?= $this->siteTitle(); ?> </h1>



</body>

</html>