<?php $position = 0; ?>

<table>

	<tr>
		<th>ID</th>
		<th>TITLE</th>
		<th>WEIGHT</th>
	</tr>

	@foreach ($results as $result)
		<tr>
			<td>{{ $ids[$position] }}</td>
			<td>{{ $result->title }}</td>
			<td>{{ $weights[$position] }}</td>
		</tr>
		<?php $position++ ?>
	@endforeach
	
</table>
