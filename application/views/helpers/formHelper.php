<?php
$arrayData=array(0=>array('value'=>'Cat',
						  'id'=>'cat'),
				 1=>array('value'=>'Dog',
				 		  'id'=>'dog'),
				 2=>array('value'=>'Tiger',
				 		  'id'=>'tiger')
				);

$arrayUser=array('Cat', 'Dog');

$name = 'pet';

$multiple = TRUE;

function selectHelper($arrayData, $arrayUser, $name, $multiple=FALSE)
{
	$html='';
	$html.="<select ";
	if($multiple==TRUE)
		$html.="multiple ";
	$html.="name=\"".$name;
	if($multiple==TRUE)
		$html.="[]";
	$html.="\">";
	foreach($arrayData as $data)
	{
		$html.="<option value=\"".$data['id']."\"";
		if(in_array($data['value'], $arrayUser))
			$html.=" selected";
		$html.=">".$data['value']."</option>";
	}
		$html.="</select>";
	return $html;
}

function checkHelper($arrayData, $arrayUser, $name, $checkbox=FALSE)
{
	$html='';
	foreach($arrayData as $data)
	{
		$html.=$data['value']." ";
		$html.="<input type= \"";
		$html.=($checkbox ? "checkbox" : "radio");
		$html.="\" name=\"".$name.($checkbox ? "[]" : "")."\" value=\"".$data['id']."\"";
		if(in_array($data['value'], $arrayUser))
			$html.=" checked";
		$html.=">";
	}
	return $html;
}

?>