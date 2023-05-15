<?php 
$id = $block['id'];

if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = "px-6 pt-5 pb-8 2xl:px-0 ";

if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$placeholders = [
	'small_title' => 'Categoría o página padre',
	'page_title' => 'Escribe aquí el título de la página',
	'intro' => 'Aquí puedes incluír un texto breve a modo de introducción'
];

$small_title = get_field('small_title');
$page_title = get_field('page_title');
$intro = get_field('intro') ?: '';
?>

<div id="block-<?= $id ?>" class="<?= $className; ?>">
	<div class="max-w-5xl global">
		<?php if( empty($small_title) AND empty($page_title) AND empty($intro) ): ?>
			<div class="animate-pulse">
				<span class="text-white text-sm leading-tight uppercase"><?= $placeholders['small_title']; ?></span>
				<div class="text-white text-4xl font-bold leading-tight tracking-wide m-0 mt-2"><?= $placeholders['page_title']; ?></div>
				<div class="text-white text-2xl font-light m-0 mt-1"><?= $placeholders['intro']; ?></div>
			</div>
		<?php else: ?>
			<span class="text-sm leading-tight uppercase"><?= $small_title; ?></span>
			<div class="text-4xl font-bold leading-tight tracking-wide m-0 mt-2"><?= $page_title; ?></div>
			<div class="text-2xl font-light m-0 mt-1"><?= $intro; ?></div>
		<?php endif; ?>
	</div>
</div>

<?php /** 
<pre class="text-xs"><?php var_dump($block); ?></pre>
*/ ?>