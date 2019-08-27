<?php



//const RAIZ="http://localhost/control-transporte";

const PREFIJO_SESION='dddsd';

set_error_handler(function($errno, $errstr, $errfile, $errline, array $errcontext) {
    // error was suppressed with the @-operator
    if (0 === error_reporting()) {
        return false;
    }
	//echo "<h1>".$errstr."</h1>";
	throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
	
});

/*
function url($v) { 
	return RAIZ.'/'.$v;
}

function url2($v) { 
	return RAIZ.'/index.php/'.$v;
}
*/

function script($v) { 
	echo '<script src="'. base_url('/application/JavaScript/' . $v) . '"></script>';
}

function css($v,$media='all') { 
    echo '<link rel="stylesheet" type="text/css" media="'.$media.'" href="'.base_url('/application/assets' . $v) . '" />';	
}

function img($v){
	echo base_url('/application/assets/' . $v) ; 
}

function print_dt($id,$title,$cols,$arr){
	$html  = '<div class="contenttitle radiusbottom0"> <h2 class="table"><span>'.$title.'</span></h2></div>';
	$html .= '<table id="'.$id.'" cellpadding="0" cellspacing="0" border="0" class="stdtable">';
	$html .= '<thead> <tr>';
	
	//cargar columnas
	for($i=0;$i<count($cols);$i++){
		$html .= '<th class="head1">'.$cols[$i].'</th>';
	}
	$html .= '</tr> </thead> <tbody>';
	
	//cargar filas
	for( $f=0 ; $f < count($arr) ; $f++){
		$html .= '<tr>';
		for ( $c=0 ; $c<count($arr[$f]) ; $c++){
			/*if(is_object($arr[$f][$c]))
				if(get_class($arr[$f][$c])=='DateTime'){
					$f=new Fecha();
					$f->setFromSql($arr[$f][$c]);
					$arr[$f][$c]="".$f;
				}
			*/		
			$html .= '<td>'.$arr[$f][$c].'</td>';
		}
		$html .= '</tr>';
	}
	$html .= '</tbody> </table>';
	echo $html;
}


function SS(){
	$res=new SesionMagica();	
	return $res;
}

function fechaHoy(){
	$f=Fecha::Now();
	return $f->formato2();
}
function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}
function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
}

function str_trunc($str,$cant){
	if(strlen($str)>$cant){
		return substr($str,0,$cant).' ...';
	}else{
		return $str;
	}
}
