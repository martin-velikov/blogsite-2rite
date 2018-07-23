<?php
include_once "app/Model/PostHandlers/GetAllPosts.php";
include_once "app/Model/PostHandlers/GetPostByTitle.php"; ?>

<div class="main">
    <div class='container'>
        <div class='shell'>
            <div class="blogs" id="blogs">
                <?php
                    $allPosts = new \Model\PostHandlers\GetAllPosts();
                    $allPosts->getPosts(); ?>
            </div>
        </div><!-- /.shell -->
    </div><!-- /.container -->
</div><!-- /.main -->
