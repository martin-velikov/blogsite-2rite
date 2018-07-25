<?php

class GetAllPosts extends PostsRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPosts()
    {
        $id = 0;
        $allPosts = $this->fetchArray(
            "Model\\".$this->getClass(),
            $sql ='select username,date,category_name,title,blog_content 
            from '.strtolower($this->getClass()).'s 
            inner join users on '.strtolower($this->getClass()).'s.user_id=users.id 
            inner join post_category on '.strtolower($this->getClass()).'s.category=post_category.id where '.strtolower($this->getClass()).'s .id>?',
            'i',$id);

        if ($allPosts != null) {
            return $allPosts;
        }
    }
}