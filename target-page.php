<?php
foreach (get_fields() as $k => $v) $$k = $v;

if (! $hero_mobile_target) {
	$hero_mobile_target = get_field('default_hero_mobile', 'options');
}
if (! $hero_tablet_target) {
	$hero_tablet_target = get_field('default_hero_tablet', 'options');
}
if (! $hero_desktop_target) {
	$hero_desktop_target = get_field('default_hero_image', 'options');
}
?>

<section class="banner internal-banner <?= is_page_template('template-target.php') ? 'target-banner' : '' ?> <?= $two_column_hero ? 'two-columns' : 'single-column' ?>">
	<?php if ($hero_desktop_target): ?>
		<picture>
			<?php if ($hero_mobile_target): ?>
				<source media="(max-width: 767px)" srcset="<?= $hero_mobile_target['url'] ?>">
			<?php endif; ?>

			<?php if ($hero_tablet_target): ?>
				<source media="(max-width: 1100px)" srcset="<?= $hero_tablet_target['url'] ?>">
			<?php endif; ?>

			<?php if ($hero_desktop_target): ?>
				<img class="internal-header-image" src="<?= $hero_desktop_target['url'] ?>" alt="<?= $hero_desktop_target['alt'] ?>">
			<?php endif; ?>
		</picture>
	<?php endif; ?>

	<div class="inner">
		<div class="target-content <?= $two_column_hero ? 'two-columns' : 'single-column' ?>">

			<div class="left">
				<?php if ($tagline_target): ?>
					<div class="target-tagline"><?= $tagline_target ?></div>
				<?php endif; ?>

				<?php if ($title_tag_target && $title_target): ?>
					<<?= $title_tag_target ?> class="target-title title"><?= $title_target ?></<?= $title_tag_target ?>>
				<?php elseif (! $title_tag_target && $title_target): ?>
					<h1 class="target-title title"><?= $title_target ?></h1>
				<?php elseif (! $title_tag_target && !$title_target): ?>
					<h1 class="target-title title"><?php the_title(); ?></h1>
				<?php endif; ?>

				<?php if ($subtitle_target): ?>
					<div class="target-subtitle"><?= $subtitle_target ?></div>
				<?php endif; ?>

				<?php if ($cta_target): ?>
					<a href="<?= $cta_target['url'] ?>" class="button desktop"><?= $cta_target['title'] ?></a>
				<?php endif; ?>
			</div>

			<div class="right">
				<?php if ($reviews && $reviews_link && (! $logos_target)): ?>
					<a href="<?= $reviews_link['url'] ?>"><img class="reviews" src="<?= $reviews['url'] ?>" alt="<?= $reviews['alt'] ?>"></a>
				<?php elseif ($reviews && (! $reviews_link) && (! $logos_target)): ?>
					<img class="reviews" src="<?= $reviews['url'] ?>" alt="<?= $reviews['alt'] ?>">
				<?php else: ?>
					<?php if ($logos_target): ?>
						<div class="logos">
							<?php foreach ($logos_target as $i):
								$logo = $i['logo_target']; ?>
								<img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>">
							<?php endforeach; ?>
						<?php endif; ?>
						</div>
					<?php endif; ?>
				<?php if ($cta_target && (! $cta_under_hero)): ?>
					<a href="<?= $cta_target['url'] ?>" class="button mobile inside-hero"><?= $cta_target['title'] ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php if ($cta_target && $cta_under_hero): ?>
	<a href="<?= $cta_target['url'] ?>" class="button mobile under-hero"><?= $cta_target['title'] ?></a>
<?php endif; ?>