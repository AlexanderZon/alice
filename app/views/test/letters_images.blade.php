<?php $letters = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'); ?>
<?php $folder = '/uploads/discussions/defaults/'; ?>


<table>
	<tr>
		<th>Letter</th>
		<th>Blue</th>
		<th>Brown</th>
		<th>Green</th>
		<th>Orange</th>
		<th>Pink</th>
		<th>Purple</th>
	</tr>
	@foreach($letters as $letter)
		<tr>
			<td>{{ $letter }}</td>
			<td><img src="{{ $folder }}{{ $letter }}_blue.png"/></td>
			<td><img src="{{ $folder }}{{ $letter }}_brown.png"/></td>
			<td><img src="{{ $folder }}{{ $letter }}_green.png"/></td>
			<td><img src="{{ $folder }}{{ $letter }}_orange.png"/></td>
			<td><img src="{{ $folder }}{{ $letter }}_pink.png"/></td>
			<td><img src="{{ $folder }}{{ $letter }}_purple.png"/></td>
		</tr>
	@endforeach
</table>