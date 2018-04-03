<?php
use App\Theme\Render;

$render = new Render;

if ($data && !empty($data)):
?>

    <div class="u-l-container">
        <?php
            foreach ($data as $preview):
                echo $render->view('components/c-preview', $preview);
            endforeach;
        ?>
    </div>

<?php endif; ?>
