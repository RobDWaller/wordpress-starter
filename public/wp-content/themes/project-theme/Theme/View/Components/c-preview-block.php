<?php
use App\Helper\Render;

$render = new Render;

if ($data && !empty($data)):
?>

    <div class="l-preview-block u-l-container u-l-horizontal-padding">
        <?php foreach ($data as $preview): ?>
            <div class="l-preview-block__item">
                <?= $render->view('components/c-preview', $preview) ?>
            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>
