<?php 
$id = $block['id'];

if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = "px-6 py-5 xl:px-0 ";

if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}


if( !empty($block['alignText']) ) {
	$className .= ' text-' . $block['alignText'];
}

$placeholders = [
	'text' => 'Texto destacado de esta sección'
];

$text = get_field('text');
?>

<div id="block-<?= $id ?>" class="<?= $className; ?>">
	<?php if(!$text): ?>
		<div class="animate-pulse">
			<div class="text-gray-300 text-3xl font-semibold leading-tight uppercase m-0"><?= $placeholders['text']; ?></div>
		</div>
	<?php else: ?>
		<div class="text-3xl font-semibold leading-tight uppercase m-0"><?= $text; ?></div>
	<?php endif; ?>
</div>


<?php /** 
<pre class="text-xs"><?php var_dump($block); ?></pre>
*/ ?>