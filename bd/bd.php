<?php
$m = new mysqli(
    $CFG['bd']['host'],
    $CFG['bd']['login'],
    $CFG['bd']['pass'],
    $CFG['bd']['bd']
);

if ($m->connect_errno) {
    printf("Falló conexión: %s\n", $mysqli->connect_error);
    exit();
}

$m->set_charset('utf8');

##################################### Funciones generales

define("R2_REGEX","1");
/**
Funcion para limpiar cualquier tipo de texto basura
en algún campo, evitando inyecciones de codigo
Los parametros son:
*Texto: Es el texto ingresado
*Tipo: Uno de los siguientes: email
*Expresión Regular
*Regex: Si el parametro tipo es una E.R, entonces este campo
debe tener el valor R2_REGEX
*/
function limpiar_texto($texto,$tipo,$regex=NULL)
{
    $exprs = [
        "email"=>"[a-zA-Z\d._%\+\-]+@[A-Za-z\d.\-]+\.[A-Za-z]{2,64}",
        "numero"=>"[\d]+",
        "buscar"=>"[a-zA-Z\dáéíóúÁÉÍÓÚÑñÜüöÖÄäËëÏï\s]+",
    ];

    if ($regex==R2_REGEX)
    {
        $patron = $tipo;
    }  else {
        $patron = $exprs[$tipo];
    }
    
    preg_match_all('/'.$patron.'/', $texto, $salida);
    $texto =trim ( join ($salida[0] ));

    return $texto;
}


function sql($sql){
	global $m;
	$resultado = $m->query($sql);
    if ( $resultado === FALSE ) {
        printf( "(repo) %s\n", $m->error );
        exit;
    }
    return $resultado;
}

function sqlerror($sql,$error){
    return "<html><head></head><body><ul>"
   ."<li>Instruccion SQL:<br /><pre>$sql</pre></li>"
   ."<li>Error SQL: <font color='red'>$error</font></li>"
   ."</ul></body></html>";
}

function sql2array($sql) {
    global $m;
    if ( !$res=$m->query($sql) ) {
      echo sqlerror( $sql,$m->error );
      exit;
    }
    $r=array();
    while( $temp=$res->fetch_array(MYSQLI_ASSOC) ) {
       $r[]=$temp;
    }
    return $r;
}

function sql2clavevalor($tabla, $c1,$c2, $condicion=1 ){
	global $m;
    $sql= "
        SELECT
            $c1 AS clave,
            $c2 AS valor
        FROM $tabla
        WHERE
            $condicion
        ";
    if ( !$res=$m->query($sql) ) {
      echo sqlerror( $sql,$m->error );
      exit;
    }
    $r=array();
    while( $temp=$res->fetch_array(MYSQLI_ASSOC) ) {
       $r[$temp['clave']]=$temp['valor'];
    }
    return $r;
}

function sql2row($sql) {
	global $m;
    if ( !$res=$m->query($sql) ) {
        echo sqlerror( $sql,$m->error );
        exit;
    }
    return $res->fetch_array(MYSQLI_ASSOC);
}

function sql2value($sql) {
    global $m;
    if ( !$res=$m->query($sql) ) {
        echo sqlerror( $sql,$m->error );
        return '';
    }
    $p=$res->fetch_array(MYSQLI_NUM);
    return $p[0];
}

function sql2options($sql) {
    global $m;
    if ( !$res=$m->query($sql) ) {
      echo sqlerror( $sql,$m->error );
      exit;
    }
    $r=array();
    while( $l=$res->fetch_array(MYSQLI_NUM) ) {
       $r[$l[0]]=$l[1];;
    }
    return $r;
}

function sql2ids($sql) {
    global $m;
    if ( !$res=$m->query($sql) ) {
      echo sqlerror( $sql,$m->error );
      exit;
    }
    $r=[];
    while( $l=$res->fetch_array(MYSQLI_NUM) ) {
       $r[]=$l[0];;
    }
    return $r;
}









########################################### Funciones de la base de datos

/**
 * [bd_usuarios_hash description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 *  LRDTAB 2020
 */
function bd_usuarios_hash($id){
    return sql2value("
        SELECT clave
        FROM usuarios
        WHERE id LIKE '{$id}'or email LIKE '{$id}'
        LIMIT 1;
        ");
}















function bd_usuarios_contar(){
    return sql2value("SELECT COUNT(*) FROM usuarios");
}

function bd_nucleos_contar(){
    return sql2value("SELECT COUNT(*) FROM NUCLEOS");
}

function bd_pnf_contar(){
    return sql2value("SELECT COUNT(*) FROM PNF");
}


function bd_personas_contar($criterio='1')
{

}



function bd_usuarios_datos($login=NULL)
{
    if ($login!=NULL) {
        $sql="
            SELECT *
            FROM usuarios
            WHERE id LIKE '{$login}'or correo LIKE '{$login}'";
        $salida = sql2row($sql);
    } else {
        $sql="
            SELECT *
            FROM usuarios
            ORDER BY usuarios.id ASC";
        $salida = sql2array($sql);
    }
    return $salida;
}

function paginar($totalpaginas,$rango,$pagina_actual=1)
    {
        $i       = 0;
        $rgo     = $rango;
        $paginas = array();

        do{
            $paginas[] = $i;
            $i+=$rgo;
        }while ( $i < $totalpaginas);

        return $paginas;
    }

function bd_usuarios_datos2($inicio, $cantidad, $orden='id', $nivel)
{
return sql2array("SELECT id, correo
    FROM usuarios
    ORDER BY $orden ASC#
    LIMIT $inicio,$cantidad
    ");
}

function bd_usuarios_datos3($campos, $palabras,$cantidad){
$miscampos = explode(',', $campos);
foreach ($miscampos as $key => $value)
{
    $miscampos[$key] .= " LIKE '%{$palabras}%'";
}

$condicion = implode(' OR ', $miscampos);
return sql2array("SELECT id, correo FROM usuarios
    WHERE ($condicion )
        LIMIT $cantidad
    ");
}


function bd_usuarios_eliminar($id)
{
    $sql = "
        DELETE FROM usuarios
        WHERE id = '{$id}'
        ";
    sql($sql);
    return $id;
}


function bd_usuarios_modificar($usuario)
{
    $sql = "
        UPDATE usuarios SET
            id = '{$usuario['id_new']}',
            correo = '{$usuario['correo']}'
        WHERE id = '{$usuario['id']}' 
            ";
    sql($sql);
    return $d['id'];
}


function bd_usuarios_modificar_clave($d)
{
    $id = $d[0];
    $hash = $d[1];
    $sql = "
        UPDATE usuarios SET
            clave = '{$hash}'
        WHERE
            id = '{$id}'
    ";
    sql($sql);
    return $id;
}

#####Funciones para los 



function bd_nucleos_datos($id=NULL)
{
    if ($id!=NULL) {
        $sql="
            SELECT *
            FROM NUCLEOS
            WHERE id LIKE '{$id}'";
        $salida = sql2row($sql);
    } else {
        $sql="
            SELECT *
            FROM NUCLEOS
            ";
        $salida = sql2array($sql);
    }
    return $salida;
}

function bd_nucleos_agregar($nucleos)
{
    $sql="
        INSERT INTO NUCLEOS (nombre_largo, nombre_corto)
        VALUES ('{$nucleos['nombre_largo']}','{$nucleos['nombre_corto']}')";
    sql($sql);
    return "{$nucleos['id']}";

}

function bd_nucleos_modicar($nucleos)
{
    $sql = "
        UPDATE NUCLEOS SET
            id = '{$nucleos['id']}',
            nombre_largo = '{$nucleos['nombre_largo']}',
            nombre_corto = '{$nucleos['nombre_corto']}'
        WHERE
            id = '{$nucleos['id']}'
    ";
    sql($sql);
    return $nombre;
}

function bd_nucleos_eliminar($id)
{
    $sql = "
        DELETE FROM NUCLEOS
        WHERE id = '{$id['id']}'
        ";
    sql($sql);
    return $nucleos['id'];
}

###########################Funciones PNF

function bd_pnf_datos($id=NULL)
{
    if ($id!=NULL) {
        $sql="
            SELECT *
            FROM PNF
            WHERE id LIKE '{$id}'";
        $salida = sql2row($sql);
    } else {
        $sql="
            SELECT *
            FROM PNF
            ";
        $salida = sql2array($sql);
    }
    return $salida;
}


function bd_pnf_agregar($pnf)
{
    $sql="
        INSERT INTO PNF (nombre_largo, nombre_corto)
        VALUES ('{$pnf['nombre_largo']}','{$pnf['nombre_corto']}')";
    sql($sql);
    return "{$pnf['id']}";

}

function bd_pnf_eliminar($id)
{
    $sql = "
        DELETE FROM PNF
        WHERE id = '{$id['id']}'
        ";
    sql($sql);
    return $pnf['id'];
}

function bd_pnf_modicar($pnf)
{
    $sql = "
        UPDATE PNF SET
            id = '{$pnf['id']}',
            nombre_largo = '{$pnf['nombre_largo']}',
            nombre_corto = '{$pnf['nombre_corto']}'
        WHERE
            id = '{$pnf['id']}'
    ";
    sql($sql);
    return $nombre;
}

##############################

function bd_roles_datos($login=NULL)
{
    if ($login!=NULL) {
        $sql="
            SELECT *
            FROM ROLES
            WHERE id LIKE '{$login}'";
        $salida = sql2row($sql);
    } else {
        $sql="
            SELECT *
            FROM ROLES
            ";
        $salida = sql2array($sql);
    }
    return $salida;
}

function contar_valores($a,$buscado)
 {
  if(!is_array($a)) return NULL;
  $i=0;
  foreach($a as $v)
   if($buscado===$v)
    $i++;
  return $i;
 }


function bd_usuarios_registrar($usuario,$n_roles,$roles){   
    $sql1="
        INSERT INTO usuarios(id, clave, correo)
        VALUES ('{$usuario['id']}','{$usuario['hash']}','{$usuario['correo']}')
        ";
    sql($sql1);

    $consulta="SELECT id FROM PERSONAS WHERE id ='{$usuario['id']}'";
    $verificar= sql($consulta);

    if ($verificar < 1){
        $sql2="
            INSERT INTO PERSONAS(id)
            VALUES('{$usuario['id']}');
             ";
    sql($sql2);
    }

    for ($i=0; $i <$n_roles ; $i++) { 
        # code...
        $rol=$roles[$i];
        $sql="
            INSERT INTO usuarios__ROLES(id_usuario, id_rol, id_persona)
            VALUES ('{$usuario['id']}','{$rol}','{$usuario['id']}')
        ";
        sql($sql);
    }
    return "{$usuario['id']}";

}


function bd_usuarios_roles_datos($id){

    $sql="
            SELECT *
            FROM usuarios__ROLES, ROLES 
            WHERE id_usuario LIKE '{$id}' && id_rol = ROLES.id  ";
        $salida = sql2array($sql);
    return $salida;
}




function bd_eliminar_rol_usuario($id_usuario,$id_rol=NULL){ 
    if ($id_rol != NULL) {
        #un solo rol
        $sql = "
            DELETE FROM usuarios__ROLES
            WHERE id_usuario = '{$id_usuario}' && id_rol = '{$id_rol}'
            ";
        sql($sql);
     }else{
        # todos los roles del usuario
         $sql = "
            DELETE FROM usuarios__ROLES
            WHERE id_usuario = '{$id_usuario}'
            ";
        sql($sql);
     }

}


function bd_personas_datos($login=NULL)
{
    if ($login!=NULL){
        $sql="
                SELECT *
                FROM  PERSONAS 
                WHERE id LIKE '{$login}'";
            $salida = sql2array($sql);
    }else
    {
        $sql="
            SELECT *
            FROM PERSONAS
            ";
        $salida = sql2array($sql);
    }
    return $salida;
}

function bd_crear_temp($correo){
    $n_aleatorio=rand(1000,999999);
    $hash=password_hash($n_aleatorio, PASSWORD_DEFAULT);
    $diaSiguiente = time() + (1 * 24 * 60 * 60);
    $plazo=date('Y-m-d-H-i', $diaSiguiente);
    $sql = "
        UPDATE usuarios SET
        clave_temporal = '{$hash}',
        plazo = '{$plazo}'
        WHERE correo = '{$correo}' 
        ";
    sql($sql);
    return $n_aleatorio;
}
