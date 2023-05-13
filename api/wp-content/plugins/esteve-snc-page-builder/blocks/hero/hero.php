<?php 
$id = $block['id'];

if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = "";

if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

$image = get_field('image');
?>

<div id="block-<?= $id ?>" class="<?= $className; ?>">
	<div class="max-w-5xl global">
		<?php if( !$image ): ?>
			<div class="pt-10">
				<div class="bg-white rounded-3xl overflow-hidden">
					<div class="animate-pulse">
						<div class="bg-gray-300 h-[380px]"></div>
					</div>
				</div>
			</div>
		<?php else: ?>
			<div class="pt-10">
				<div class="bg-white h-[380px] rounded-3xl overflow-hidden">
					<?php echo wp_get_attachment_image( $image, 'full', null, ['class' => 'w-full h-full object-cover'] ); ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>


<?php /**
<div 
	id="block-<?= $id ?>"
	class="px-6 xl:px-0 <?= !empty($block['align']) ? $block['align'] : ''; ?>">
	
	<div class="bg-pink-400 h-40"></div>
	
	<?php if($image): ?>
	<div class="container global -mt-36">
		<div class="flex justify-center">
			<?php echo wp_get_attachment_image( $image, 'full', null, ['class' => esc_attr($className)] ); ?>
		</div>
	</div>
	<?php endif; ?>
</div>
*/ ?>