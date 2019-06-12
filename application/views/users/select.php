<?php $arrayUsers=$params['arrayUsers']?>

<a href="/users/insert">Agregar</a>
<table border =1>
	<tr>
		<th>Id</th><th>Name</th><th>E-mail</th><th>Password</th><th>Description</th><th>Pets</th>
		<th>City</th><th>Coder</th><th>Languages</th><th>Photo</th><th>Action</th>
	</tr>
	<?php foreach($arrayUsers as $key => $user):?>
		<tr>
			<td><?=nl2br(htmlspecialchars($arrayUsers[$key]['iduser']));?></td>
			<td><?=nl2br(htmlspecialchars($arrayUsers[$key]['name']));?></td>
			<td><?=nl2br(htmlspecialchars($arrayUsers[$key]['email']));?></td>
			<td><?=nl2br(htmlspecialchars($arrayUsers[$key]['password']));?></td>
			<td><?=nl2br(htmlspecialchars($arrayUsers[$key]['description']));?></td>
			<td><?=nl2br(htmlspecialchars($arrayUsers[$key]['pets']));?></td>
			<td><?=nl2br(htmlspecialchars($arrayUsers[$key]['city']));?></td>
			<td><?=nl2br(htmlspecialchars($arrayUsers[$key]['coders']));?></td>
			<td><?=nl2br(htmlspecialchars($arrayUsers[$key]['languages']));?></td>
			<td><?=nl2br(htmlspecialchars($arrayUsers[$key]['photo']));?></td>
			<td>
			<a href="/users/update/<?=$arrayUsers[$key]['iduser']?>">Editar</a>
			<a href="/users/delete/<?=$arrayUsers[$key]['iduser']?>">Borrar</a>
			</td>
		</tr>
	<?php endforeach;?>
</table>
