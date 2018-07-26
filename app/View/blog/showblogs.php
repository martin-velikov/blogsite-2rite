<?php foreach ($view['allPosts'] as $post): ?>
    <div class='blog-post' id="blog-post">
        <div class='post__head'>
            <h2 class='post__title'><?= $post->getTitle() ?></h2>
            <span>Posted by <a href='#'><?= $post->getUsername() ?></a><br /> on <?= $post->getDate() ?></span><br />
            <span>Category: <a href='#'><?= $post->getCategoryName() ?></a></span>
        </div><!-- /.post__head -->

        <div class='post__body'>
            <p><?= $post->getPostContent()?></p>
        </div><!-- /.post__body -->
    </div><!-- /.blog-post -->
<?php endforeach; ?>