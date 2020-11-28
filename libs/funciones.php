<?php

function verifica_nivel($niveles){
	if ( !isset($_SESSION['usuario']) ) ir('index.php');
	if ( !in_array($_SESSION['usuario']['nivel'], $niveles) )
		ir($_SERVER['HTTP_REFERER']);
}


function ir($destino){
  header("Location: $destino");
  exit();
}

#--Funciones del Sistema---#
function f_input($name, $icono, $placeholder, $type = 'text', $required = NULL){
	$required = is_null($required) ? "" : "required";

	$salida = <<<LRDTAB
	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text">
				<i class="fa fa-{$icono}"></i>
			</span>
		</div>
		<input type="{$type}" class="form-control" name="{$name}" id="{$name}"
			placeholder="{$placeholder}" {$required}>
	</div>
LRDTAB;
	return $salida;
}

function f_select($name, $icono, $placeholder, $opciones, $required = NULL){
	$required = is_null($required) ? "" : "required";
	$opc = '';
	foreach ($opciones as $clave => $valor) {
		$opc .= "<option value=\"{$clave}\">{$valor}</option>";
	};
	$salida = <<<LRDTAB
	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text">
				<i class="fa fa-{$icono}"></i>
			</span>
		</div>
			<select class="form-control" name="{$name}" id="{$name}"  {$required}>
				<option value="">{$placeholder}</option>
				{$opc}
			</select>
	</div>
LRDTAB;
	return $salida;
}

###################################33
function verificar($autorizados)
{	if (!isset($_SESSION['u'])) {
	ir('index.php');
}
	if (!in_array($_SESSION['u']['rol_id'], $autorizados))
	{
		$temp=bd_privilegios_datos($_SESSION['u']['rol_id']);
		$m=$temp['mensaje_error_acceso'];
		$d=$temp['menu'];
    ir("mensaje.php?m=$m&d=$d") ;
	}
}

function frm_modal_editor($t){
  $salida = '<form
      action="proc_modal_editor.php"
      enctype="multipart/form-data"
      method="POST"
      class="w-100"
      id="editor"
      name="editor">
      <div class="form-group">';
  switch ($t[0]) {
    case 'N1':
    case 'N2':
    case 'N3':
    case 'N4':
    case 'N5':
      $salida .= "
      <input type=\"hidden\" name=\"tipo\" value=\"{$t[0]}\">
      <input type=\"hidden\" name=\"campo\" value=\"{$t[1]}\">
        <div class=\"form-group\">
          <label for=\"texto\">{$t[2]}</label>
          <small class=\"form-text text-muted text-muted-label\">{$t[3]}</small>
            <textarea  rows=\"16\" class=\"w-100\" name=\"texto\" id=\"texto\">{$t['texto']}</textarea>
        </div>

      <div class=\"form-group\">
      <input
        class=\"btn-enviar boton\"
        type=\"submit\"
        name=\"enviar\"
        value=\"Guardar\">
      </div>
      ";
      break;
    case 'I2':
      $salida .="
      <input type=\"hidden\" name=\"tipo\" value=\"{$t[0]}\">
          <input type=\"hidden\" name=\"campo\" value=\"{$t[1]}\">
          <div class=\"form-group\">
          <label  for=\"texto\">{$t[2]}</label>
          <small class=\"form-text text-muted text-muted-label\">{$t[3]}</small>
          <input class=\"form-control\" type=\"text\"
      placeholder=\"Palabras Clave\" name=\"texto\" id=\"texto\"
      value=\"{$t['texto']}\">
      </div>

      <div class=\"form-group\">

      <input
        class=\"btn-enviar boton\"
        type=\"submit\"
        name=\"enviar\"
        value=\"Guardar\">
        </div>
      ";
      break;
    case 'A2':
      $salida .="
      <input type=\"hidden\" name=\"tipo\" value=\"{$t[0]}\">
        <input type=\"hidden\" name=\"campo\" value=\"{$t[1]}\">
        <input type=\"hidden\" name=\"texto\" value=\"\">
      <div class=\"form-group\">
        <label for=\"{$t[1]}\">
            {$t[2]}
        </label>
        <input type=\"hidden\" name=\"variable\" value=\"{$t[1]}\" />
        <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"1000000000\" />
        <input
            type=\"file\"
            class=\"form-control\"
            name=\"{$t[1]}\"
            id=\"{$t[1]}\"
            accept=\"{$t[4]}\">
       </div>

       <div class=\"form-group\">
      <input
        class=\"btn-enviar boton\"
        type=\"submit\"
        name=\"enviar\"
        value=\"Guardar\">
        </div>
      ";



      break;

    default:
      # code...
      break;
  }

  $salida .= '</div>
    </form>';
    return $salida;

}
