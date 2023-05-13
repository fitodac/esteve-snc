<?php 
$id = $block['id'];

if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = "";

if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

$placeholders = [
	'title' => 'Título del video',
	'caption' => 'Aquí puedes incluír un texto breve para la descripción del video'
];

$title = get_field('title');
$video = get_field('video');
$caption = get_field('caption');
?>


<div id="block-<?= $id ?>" class="<?= $className; ?>">
	<div class="container global">
		<?php if( empty($title) AND empty($video) AND empty($caption) ): ?>
			<div class="animate-pulse">
				<div class="text-gray-300 text-2xl font-bold leading-tight uppercase"><?= $placeholders['title']; ?></div>
				<div class="bg-gray-300 h-[380px] mt-3 grid place-content-center rounded-2xl">
					<span class="dashicon dashicons dashicons-video-alt3 text-5xl text-white"></span>
				</div>
				<div class="text-gray-300 font-light leading-tight text-center mt-3"><?= $placeholders['caption']; ?></div>
			</div>
		<?php else: ?>

			<?php if(!empty($title)): ?>
				<div class="text-2xl font-bold leading-tight uppercase"><?= $title; ?></div>
			<?php endif; ?>

			<div class="video mt-3 rounded-2xl overflow-hidden">
				<?= $video; ?>
			</div>

			<?php if(!empty($caption)): ?>
				<div class="font-light leading-tight text-center mt-3"><?= $caption; ?></div>
			<?php endif; ?>

		<?php endif; ?>
	</div>
</div>


<?php /** 
<pre class="text-xs"><?php var_dump($block); ?></pre>
*/ ?>