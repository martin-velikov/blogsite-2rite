<?php

namespace Model;

class UserPosts {
    public function getAllPosts()
    {
        $class = explode('\\',UserPost::class);
        $class = end($class);
        $connect = new DbConnector();
        $id = 0;
        $allPosts = $connect->fetchArray(
            "Model\\$class",
            $sql ='select username,date,category_name,title,blog_content 
            from '.strtolower($class).'s 
            inner join users on userposts.user_id=users.id 
            inner join post_category on userposts.category=post_category.id where '.strtolower($class).'s .id>?',
            'i',$id);

        if ($allPosts != null) {
            foreach ($allPosts as $post) {
                echo
            "<div class='blog-post' id=\"blog-post\">
                <div class='post__head'>
                    <h2 class='post__title'>".$post->getTitle()."</h2>
                    <span>Posted by <a href='#'>".$post->getUsername()."</a><br /> on ".$post->getDate()."</span><br />
                    <span>Category: <a href='#'>".$post->getCategoryName()."</a></span>
                </div><!-- /.post__head -->
                 
                 <div class='post__body'>
                    <p>".$post->getBlogContent()."</p>
                 </div><!-- /.post__body -->
             </div><!-- /.blog-post -->";
            }
        }
    }
}



$allPosts = new UserPosts();
$allPosts->getAllPosts();