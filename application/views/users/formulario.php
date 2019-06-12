<?php
$arrayUser=$params['arrayUser'];
$arrayDataPets=$params['arrayDataPets'];
$arrayUserPets=$params['arrayUserPets'];
$arrayDataCities=$params['arrayDataCities'];
$arrayUserCities=$params['arrayUserCities'];
$arrayDataCoders=$params['arrayDataCoders'];
$arrayUserCoders=$params['arrayUserCoders'];
$arrayDataLanguages=$params['arrayDataLanguages'];
$arrayUserLanguages=$params['arrayUserLanguages'];

?>

<form method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?=$arrayUser['id']?>"/>
<ul>
<li>Name: <input type="text" name="name" value="<?=htmlspecialchars($arrayUser['name'])?>"/></li>
<li>E-mail: <input type="text" name="email" value="<?=htmlspecialchars($arrayUser['email'])?>"/></li>
<li>Password: <input type="password" name="password"/></li>
<li>Description: <textarea rows="4" cols="50" name="description"><?=htmlspecialchars($arrayUser['description'])?></textarea></li>
<li>Pets: <?=selectHelper($arrayDataPets, $arrayUserPets, 'pets', TRUE);?></li>
<li>City: <?=selectHelper($arrayDataCities, $arrayUserCities, 'city', FALSE);?></li>
<li>Coder: <?=checkHelper($arrayDataCoders, $arrayUserCoders, 'coder', FALSE);?></li>
<li>Languages:<br><?=checkHelper($arrayDataLanguages, $arrayUserLanguages, 'languages', TRUE);?>
<li>Photo: <input type="file" name="photo"/>
  		 <?php if($arrayUser['photo']):?>
  		 	<img src="uploads/<?=$arrayUser['photo'];?>" style="width:150px;"/>
  		 <?php endif;?></li>
</ul>
  <input type="submit" value="submit"/>
  <input type="reset" value="reset"/>
</form>
