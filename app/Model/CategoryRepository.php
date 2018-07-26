<?php

class CategoryRepository extends ModelRepository
{
    public function __construct()
    {
        parent::__construct(Category::class);
    }


    public function getAllCategories()
    {
        $allCategories = $this->fetchArray(
            'SELECT category_name from post_category'
        );

        return $allCategories ?? [];
    }

}