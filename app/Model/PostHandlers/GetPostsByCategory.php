<?php


class GetPostsByCategory extends PostsRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPosts($category){
        $allPosts = $this->fetchArray(
            "Model\\".$this->getClass(),
            $sql = 'select username,date,category_name,title,blog_content
            from post_category
            inner join '.strtolower($this->getClass()).'s on post_category.id='.strtolower($this->getClass()).'s.category
            inner join users on '.strtolower($this->getClass()).'s.user_id=users.id
            where category_name=?',
            's',$category);

        if ($allPosts != null) {
            $this->displayPosts($allPosts);
        }
    }

}