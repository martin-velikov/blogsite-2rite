<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 20-Jul-18
 * Time: 14:49
 */

namespace Model\PostHandlers;


use Model\PostsRepository;

class GetPostByTitle extends PostsRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPosts($title)
    {
        $allPosts = $this->getConnect()->fetchArray(
            "Model\\".$this->getClass(),
            $sql = 'select username,date,category_name,title,blog_content
                     from '.strtolower($this->getClass()).'s
                     inner join users on '.strtolower($this->getClass()).'s.user_id=users.id
                     inner join post_category on '.strtolower($this->getClass()).'s.category=post_category.id
                     where '.strtolower($this->getClass()).'s.title like ?',
                     's','%'.$title.'%');

        if ($allPosts != null) {
            $this->displayPosts($allPosts);
        }
    }

}