<?php
use Project\Theme\Single;
use App\Theme\Render;

$render = new Render;

include("header.php");

$single = new Single($post->ID);
echo $render->view('components/c-single-post', $single->getSingle());

include("footer.php");
