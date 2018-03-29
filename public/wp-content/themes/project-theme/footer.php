<?php
	use App\Theme\WordpressHelper;
	$wordpress = new WordpressHelper;
?>

			</main>

			<div class="u-l-container">
				<footer class="c-footer">
					<p class="c-footer__copyright">&copy; <?= $wordpress->getBlogInfo('title') ?></p>
				</footer>
			</div>

	 	</div>

		<?php wp_footer(); ?>
	</body>
</html>
