<?php

class PostsRepository extends ModelRepository
{
    public function __construct()
    {
         parent::__construct(Post::class);
    }

    public function getAllPosts()
    {
        $allPosts = $this->fetchArray(
            'select username,date,category_name,title,blog_content 
            from '.$this->table.' 
            inner join users on user_id=users.id 
            inner join post_category on category=post_category.id');

        return $allPosts ?? [];
    }

    public function getPostsByTitle($title)
    {
        $allPosts = $this->fetchArray(
            'select username,date,category_name,title,blog_content
                     from '.$this->table.'
                     inner join users on user_id = users.id
                     inner join post_category on category=post_category.id
                     where title like ?',
            's', '%'.$title.'%');

        return $allPosts ?? [];
    }

    public function getPostsByCategory($category)
    {
        $allPosts = $this->fetchArray(
           'select username,date,category_name,title,blog_content
                 from '.$this->table.'
                 inner join post_category on category=post_category.id
                 inner join users on user_id=users.id
                 where category_name=?',
            's',$category);

        return $allPosts ?? [];
    }

}