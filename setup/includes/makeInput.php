<?php

/* input(name,Texto no Label,classes,id,placeholder,required[false, true],value,tipo[text],extras,help-block) */

function input($name, $labelName, $class, $id, $phr, $rq, $value,$tipo='text',$ext='',$cg='',$help=''){

	if($name) $name = 'name="'.$name.'"';
	if($labelName) $label = '<label for="'. $id. '" class="control-label">'. $labelName .'</label>';
	if($id) $id = 'id="'. $id .'"';
	if($phr) $phr = 'placeholder="'. $phr .'"';
	if($rq) $rq = 'required';
	if($value) $value = 'value="'. $value .'"';
	if($class) $class = 'class="form-control '. $class .'"';

	if($cg) $cg = ' '.$cg;

	$input = '<div class="control-group '.$cg.'">';

    $ipt ='<div class="controls"><input type="'. $tipo .'" '. $name .' '. $value .''. $phr.' '. $id .' '. $class.' '.$rq.' '. $ext.'/></div>';
	if($help) $ipt .= '<p class="help-block">'.$help.'</p>';
    $end = '</div>';

	$input .= $label . $ipt . $end;

	echo $input;
}

function checkbox($name, $text, $class, $id, $rq, $value, $checked,$ext){

	if($name) $name = 'name="'.$name.'"';
	if($rq) $rq = 'required';
	if($class) $class = 'class="'. $class .'"';
	if($value) $value = 'value="'. $value .'"';
	if($checked) $checked = 'checked';

	$checkbox = '<label class="checkbox" for="'.$id.'">';

	if($id) $id = 'id="'. $id .'"';

$checkbox .='<input type="checkbox" '.$name.' '.$value.' '.$id.' '.$class.' '.$rq.' '.$checked.' '. $ext.'/>'. $text;

    $checkbox .= '</label>';

	echo $checkbox;
}

function alert($msg, $class){

$alert = '<div class="alert alert-'.$class.'">';
$alert .= '<button type="button" class="close fui-cross" data-dismiss="alert">&times;</button>';
$alert .= '<h4>'.$msg.'</h4>';
$alert .= '</div>';

echo $alert;
}
/*<div class="alert">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Warning!</strong> Best check yo self, you're not looking too good.
</div>*/
function textArea($name, $label, $class, $id, $rq, $texto, $cols, $rows,$phr,$ext, $cg){

	if($label) $label = '<label class="control-label" for="'. $id. '">'. $label .'</label>';
	if($name) $name = 'name="'.$name.'"';
	if($class) $class = 'class="'. $class .'"';
	if($rows) $rows = 'rows="'. $rows .'"';
	if($cols) $cols = 'cols="'. $cols .'"';
	if($phr) $phr = 'placeholder="'. $phr .'"';
	if($rq) $rq = 'required';

$cg = '<div class="form-group'.$cg.'">';
$txa = '<textarea '.$name.' '.$class.' '.$id.' '.$rows.' '.$cols.' '.$phr.' '.$rq.' '.$ext.' >'.$texto.'</textarea>';
$end = '</div>';

	$textarea = $cg . $label . $txa . $end;

	echo $textarea;
}

?>
