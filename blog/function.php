<?php 

function listaPosts($id){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="SELECT * FROM posts WHERE id_user='".$id."'";
	$resultado = pg_query($consulta,$sql);
	if(pg_fetch_assoc($resultado)>0){
		$r=pg_fetch_all($resultado);
	}else{
		$r=null;
	}
	return $r;
}
function listaPostsTitulo($titulo){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="SELECT nome,posts.id_user,titulo,descricao,data,id_post FROM posts,usuarios WHERE titulo='".$titulo."'AND posts.id_user=usuarios.id_user";
	$resultado = pg_query($consulta,$sql);
	if(pg_fetch_assoc($resultado)>0){
		$r=pg_fetch_all($resultado);
	}else{
		$r=null;
	}
	return $r;
}
function listAdmin($tipo){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="SELECT * FROM usuarios WHERE tipo = '".$tipo."'";
	$resultado = pg_query($consulta,$sql);
	if(pg_fetch_assoc($resultado)>0){
		$r=pg_fetch_all($resultado);
	}else{
		$r=null;
	}
	return $r;
}
function listaUser($id){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="SELECT * FROM usuarios WHERE id_user='".$id."'";
	$resultado = pg_query($consulta,$sql);
	$r=pg_fetch_all($resultado);
	return $r;
}

function Block($id){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="UPDATE usuarios SET tipo = 2 WHERE id_user= '".$id."'";
	$resultado = pg_query($consulta,$sql);
	if(pg_affected_rows($resultado)==1){
		$r="Sucesso";
	}else{
		$r="Falhou";
	}
	return $r;
}
function unlock($id){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="UPDATE usuarios SET tipo = 0 WHERE id_user= '".$id."'";
	$resultado = pg_query($consulta,$sql);
	if(pg_affected_rows($resultado)==1){
		$r="Sucesso";
	}else{
		$r="Falhou";
	}
	return $r;
}
?>


