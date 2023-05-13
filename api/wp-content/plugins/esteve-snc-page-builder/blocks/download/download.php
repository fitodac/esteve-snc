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
	'title' => 'Nombre o título del archivo',
	'description' => 'Aquí puedes incluír una descripción del archivo'
];

$title = get_field('title');
$description = get_field('description');
$file = get_field('file');
?>

<div id="block-<?= $id ?>" class="<?= $className; ?>">
	<div class="container global">
		<?php if( empty($title) AND empty($description) ): ?>
			<div class="flex gap-x-6 animate-pulse">
				<div class="bg-gray-300 w-10 h-10 rounded-lg"></div>

				<div class="">
					<div class="text-gray-300 font-bold uppercase leading-tight"><?= $placeholders['title']; ?></div>
					<div class="text-gray-300 leading-tight font-light"><?= $placeholders['description']; ?></div>
				</div>
			</div>
		<?php else: ?>
		
		<div class="flex gap-x-6">
			<div class="bg-gray-400 w-10 h-10 top-1 relative rounded-lg"></div>
			
			<div class="">
				<div class="">
					<span class="font-bold uppercase leading-tight"><?= $title; ?></span>
					
					<?php if($file): ?>
						<span class="uppercase">(<?= $file['subtype']; ?>)</span>
					<?php endif; ?>
				</div>

				<div class="text-gray-500 leading-tight font-light"><?= $description; ?></div>
			</div>
		</div>
		
		<?php endif; ?>
	</div>
</div>