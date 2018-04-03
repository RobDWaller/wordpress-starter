<article class="c-preview">
    <img src="<?= $data['image'] ?>" alt="A demo placeholder image" class="c-preview__image">
    <header>
        <h3 class="c-preview__title"><?= $data['title'] ?></h3>
    </header>
    <p class="c-preview__description">
        <?= $data['excerpt'] ?>
    </p>
    <p class="c-preview__more">
        <a href="<?= $data['link'] ?>" class="u-more">
            Read more
        </a>
    </p>
</article>
