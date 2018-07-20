<?php
namespace Model;

use Model\PostHandlers\GetAllPosts;
use Model\PostHandlers\GetPostByTitle;
use Model\PostHandlers\GetPostsByCategory;

include_once "Model/ModelRepository.php";
include_once "Model/PostsRepository.php";
include_once "Model/PostHandlers/GetPostsByCategory.php";
include_once "Model/PostHandlers/GetAllPosts.php";
include_once "Model/PostHandlers/GetPostByTitle.php";

$allPosts = new GetAllPosts();
$allPosts->getPosts();

$allPosts = new GetPostsByCategory();
$allPosts->getPosts('Food');

$allPosts = new GetPostByTitle();
$allPosts->getPosts('Sausage');