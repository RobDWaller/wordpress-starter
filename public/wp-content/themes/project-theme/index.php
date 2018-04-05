<?php
use Project\Theme\Previews;
use App\Theme\Render;

$render = new Render;

include("header.php");

$previews = new Previews('post', 4, []);
echo $render->view('components/c-preview-block', $previews->getPreviews());

include("footer.php");
