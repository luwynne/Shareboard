
<div>
	<?php if(isset($_SESSION['is_logged_id'])): ?>
		<a class="btn btn-success btn-share" href="<?php echo ROOT_URL; ?>shares/add">Share Something</a>
		<br/><br/>
	<?php endif; ?>
	<?php foreach($viewmodel as $item): ?>

		<div class="well">
			<h3><?php echo $item['title']; ?></h3>
			<small><?php echo time_elapsed_string($item['create_date']); ?></small>
			<hr/>
			<p><?php echo $item['body']; ?></p>
			<br />
			<a class="btn btn-default" href="<?php echo $item['link']; ?>" target="_blank">Go To Website</a>

		</div>

	<?php endforeach; ?>

</div>