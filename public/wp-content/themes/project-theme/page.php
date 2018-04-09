<?php
use Theme\Model\Single;
use App\Helper\Render;

$render = new Render;

include("header.php");

$single = new Single($post->ID);
echo $render->view('components/c-single-post', $single->getSingle());

include("footer.php");
