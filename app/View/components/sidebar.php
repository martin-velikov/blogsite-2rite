<div class="blog-post sidebar" id="sidebar">
    <div class="category">
        <div class="post__head">
            <span>Categories</span>
        </div><!-- /.post__head -->
        <div class="category-content">
            <ul class="category-list">
                <?php foreach ($view['categories'] as $category): ?>
                    <li><a href="/posts/category/<?= $category->getCategoryName(); ?>#blog-post"><?= $category->getCategoryName() ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>