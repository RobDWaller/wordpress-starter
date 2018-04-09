<?php
use Theme\Model\Previews;
use App\Helper\Render;

$render = new Render;

include("header.php");

$previews = new Previews('post', 4, []);
echo $render->view('components/c-preview-block', $previews->getPreviews());

include("footer.php");
