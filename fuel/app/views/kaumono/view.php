<h2>Viewing #<?php echo $kaumono->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $kaumono->name; ?></p>
<p>
	<strong>Is buy:</strong>
	<?php echo $kaumono->is_buy; ?></p>

<?php echo Html::anchor('kaumono/edit/'.$kaumono->id, 'Edit'); ?> |
<?php echo Html::anchor('kaumono', 'Back'); ?>