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
    if ($p!=NULL) {
        return $p[0];
    } else {
        return '';
    }
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

/**
 * Devuelve un array con los datos del usuario
 * @param  [string] $login [Login.]
 * @return [array]        [Datos del usuario]
 */
function bd_usuarios_datos($login) {
    $sql="
        SELECT id, nombre, nivel, email
        FROM usuarios
        WHERE id LIKE '{$login}'or email LIKE '{$login}'";
    $salida = sql2row($sql);
    return $salida;
}


function bd_notas_sin_vencer(){
    $sql = "
        SELECT id, texto, f_creado
        FROM notas
        WHERE f_cancelado IS NULL
        ORDER BY f_creado DESC;
    ";
    return sql2array($sql);
}

function bd_notas_cancelar($id, $usuario){
    $sql ="
        UPDATE notas
        SET
            f_cancelado = NOW(), usuario_id = '{$usuario}'
        WHERE
            id = $id;
    ";
    sql($sql);
}

function bd_tasas_datos($n=10) {
    $sql = "
        SELECT
            tasa, f_tasa
        FROM
            tasas
        ORDER BY
            f_tasa DESC
        LIMIT
            {$n}
    ";
    return sql2array($sql);
}

function bd_tasas_agregar($monto) {
    if ($monto > 0) {
        $sql = "
            INSERT INTO
                tasas (id,tasa,f_tasa, usuario_id)
            VALUES (NULL, '{$monto}', current_timestamp(), '{$_SESSION['usuario']['id']}');
        ";
        vq($sql);
        return sql($sql);
    }
    else
    {
        return -1;
    }
}

function bd_productos_datos($categoria_id = NULL) {
    if ($categoria_id != NULL) {
        $where = "AND categoria_id LIKE '{$categoria_id}'";
    }else{
        $where = '';
    }

    $sql = "
        SELECT
            a.id, a.nombre, a.unidad, a.categoria_id, a.p_compra, a.p_venta, a.existencia, a.minimo, a.detalle,
            b.nombre categoria
        FROM
            productos a, categorias b
        WHERE 1
        AND a.categoria_id = b.id
        {$where}
    ";
    return sql2array($sql);
}


function bd_categorias_datos() {
    $sql = "SELECT id, nombre FROM categorias ORDER BY nombre ASC";
    return sql2array($sql);
}



function bd_productos_unidades() {
    return sql2array("SELECT DISTINCT unidad FROM productos ORDER BY unidad ASC;");
}






































function bd_usuarios_contar(){
    return sql2value("SELECT COUNT(*) FROM usuarios");
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

