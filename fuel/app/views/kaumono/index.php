<h2>Listing Kaumonos</h2>
<br>
<?php if ($kaumonos): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Is buy</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($kaumonos as $kaumono): ?>		<tr>

			<td><?php echo $kaumono->name; ?></td>
			<td><?php echo $kaumono->is_buy; ?></td>
			<td>
				<?php echo Html::anchor('kaumono/view/'.$kaumono->id, 'View'); ?> |
				<?php echo Html::anchor('kaumono/edit/'.$kaumono->id, 'Edit'); ?> |
				<?php echo Html::anchor('kaumono/delete/'.$kaumono->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Kaumonos.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('kaumono/create', 'Add new Kaumono', array('class' => 'btn btn-success')); ?>

</p>
