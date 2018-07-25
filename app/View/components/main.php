<?php $this->start('body'); ?>
<div class="main">
    <div class='container'>
        <div class='shell'>
            <div class="blogs" id="blogs">
                <?php
                $allPosts = new GetAllPosts();
                $allPosts->getPosts();
                ?>
            </div>
        </div><!-- /.shell -->
    </div><!-- /.container -->
</div><!-- /.main -->
<?php $this->end(); ?>