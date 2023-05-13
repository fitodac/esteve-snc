<?php 
$id = $block['id'];

if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = "px-6 py-10 xl:px-0";

if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

$placeholders = [
	'title' => 'Título del carousel',
	'block' => [
		'title' => 'Puedes incluir un título para este bloque',
		'description' => 'Escribe una descripción amigable'
	]
];

$title = get_field('title');
$blocks = get_field('blocks');
?>



<div id="block-<?= $id ?>" class="<?= $className; ?>">
	
	<div class="max-w-[840px] global">
		<?php if(empty($title)): ?>
			<div class="text-gray-200 text-2xl font-bold uppercase">
				<?= $placeholders['title']; ?>
			</div>
		<?php else: ?>
			<div class="title text-2xl font-bold uppercase"><?= $title; ?></div>
		<?php endif; ?>
	</div>


	<?php if( !$blocks ): ?>

		<div class="grid animate-pulse mt-6 lg:grid-cols-4 lg:gap-8">
			<?php for($i = 1; $i <= 4; $i++): ?>
				<div class="">
					<div class="bg-gray-300 w-full h-44 rounded-2xl"></div>
					
					<div class="text-gray-300 text-xl leading-tight font-medium mt-3">
						<?= $placeholders['block']['title']; ?>
					</div>

					<div class="text-gray-300 leading-tight">
						<?= $placeholders['block']['description']; ?>
					</div>

					<div class="bg-gray-300 w-8 h-8 mt-5 rounded-lg"></div>
				</div>
			<?php endfor; ?>
		</div>

	<?php else: ?>

		<div class="grid mt-6 lg:grid-cols-4 lg:gap-8">
			<?php foreach($blocks as $block): ?>
				<div class="">
				
					<?php if( !$block['image'] ): ?>
						<div class="animate-pulse">
							<div class="bg-gray-300 w-full h-44 rounded-2xl animate-pulse"></div>
						</div>
					<?php else: ?>
						<?php echo wp_get_attachment_image( $block['image'], 'full', null, ['class' => 'w-full !h-44 rounded-2xl'] ); ?>
					<?php endif; ?>

					<?php if( !$block['title'] ): ?>
						<div class="animate-pulse">
							<div class="text-gray-300 text-xl font-medium leading-tight mt-3">
								<?= $placeholders['block']['title']; ?>
							</div>
						</div>
					<?php else: ?>
						<div class="text-xl font-medium mt-3"><?= $block['title']; ?></div>
					<?php endif; ?>

					<?php if( !$block['description'] ): ?>
						<div class="animate-pulse">
							<div class="text-gray-300 leading-tight">
								<?= $placeholders['block']['description']; ?>
							</div>
						</div>
					<?php else: ?>
						<div class="leading-tight">
							<?= $block['description']; ?>
						</div>
					<?php endif; ?>


					<?php if( !$block['file'] AND !$block['link'] ): ?>
						<div class="animate-pulse mt-5">
							<div class="bg-gray-300 w-10 h-10 top-1 relative rounded-lg"></div>
						</div>
					<?php else: ?>
						<div class="mt-5">
							<div class="btn-link w-10 h-10 top-1 relative rounded-lg cursor-pointer transition-all hover:opacity-80"></div>
						</div>
					<?php endif; ?>


				</div>
			<?php endforeach; ?>
		</div>

	<?php endif; ?>


</div>


<?php /** 
<div 
	id="block-<?= $id ?>"
	class="<?= $className; ?> <?= !empty($block['align']) ? $block['align'] : ''; ?>">
	<div class="container global">


			<?php if($blocks): ?>

				<div class="mt-6">
				<?php foreach($blocks as $block): ?>

				
				<?php endforeach; ?>
				</div>

			<?php else: ?>

				<div class="grid animate-pulse mt-6 lg:grid-cols-4 lg:gap-8">
					<?php for($i = 1; $i <= 4; $i++): ?>
						<div class="">
							<div class="bg-gray-300 w-full h-32 rounded-lg"></div>
							
							<div class="text-gray-300 leading-tight font-medium mt-2">
								<?= $placeholders['block']['title']; ?>
							</div>

							<div class="text-gray-300 text-sm leading-tight">
								<?= $placeholders['block']['description']; ?>
							</div>

							<div class="bg-gray-300 w-8 h-8 mt-5 rounded-lg"></div>
						</div>
					<?php endfor; ?>
				</div>

			<?php endif; ?>

	</div>
</div>

*/ ?>


<?php /** 
<pre class="text-xs"><?php var_dump($block); ?></pre>
*/ ?>