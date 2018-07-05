<?php 
function criaPost($id_user,$titulo,$desc,$data,$mark){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="INSERT INTO posts(id_user,titulo,descricao,data,id_categoria) VALUES ('".$id_user."','".$titulo."','".$desc."','".$data."','".$mark."')";
	$resultado=pg_query($consulta,$sql);
	$r=pg_affected_rows($resultado);
	return $r;
}
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
	$sql="SELECT nome,posts.id_user,titulo,descricao,data,id_post FROM posts,usuarios WHERE descricao LIKE '%".$titulo."%'AND posts.id_user=usuarios.id_user";
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

function Block($id,$ip){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="UPDATE usuarios SET tipo = 2 WHERE id_user= '".$id."'OR ip_user = '".$ip."'";
	$resultado = pg_query($consulta,$sql);
	if(pg_affected_rows($resultado)==1){
		$r="Sucesso";
	}else{
		$r="Falhou";
	}
	return $r;
}
function unlock($id,$ip){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="UPDATE usuarios SET tipo = 0 WHERE id_user= '".$id."'OR ip_user='".$ip."'";
	$resultado = pg_query($consulta,$sql);
	if(pg_affected_rows($resultado)==1){
		$r="Sucesso";
	}else{
		$r="Falhou";
	}
	return $r;
}
function exibePost($id){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="SELECT * FROM posts WHERE id_post='".$id."'";
	$resultado = pg_query($consulta,$sql);
	if(pg_fetch_assoc($resultado)>0){
		$r=pg_fetch_all($resultado);
	}else{
		$r=null;
	}
	return $r;
}
function editaPost($id,$titulo,$desc,$data,$mark){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="UPDATE posts SET titulo ='".$titulo."' WHERE id_post='".$id."'";
	$resultado = pg_query($consulta,$sql);
	$sql="UPDATE posts SET descricao ='".$desc."' WHERE id_post='".$id."'";
	$resultado = pg_query($consulta,$sql);
	$sql="UPDATE posts SET data ='".$data."' WHERE id_post='".$id."'";
	$resultado = pg_query($consulta,$sql);
	$sql="UPDATE posts SET id_categoria ='".$mark."' WHERE id_post='".$id."'";
	$resultado = pg_query($consulta,$sql);
	
	if(pg_fetch_assoc($resultado)>0){
		return 1;
	}else{
		return 0;
	}
}
function cadastro($email,$senha,$nome,$tipo,$data,$ip){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql = "SELECT email FROM usuarios WHERE email = '".$email."'";
	$resultado = pg_query($consulta,$sql);
	if(pg_num_rows($resultado)!=0){
		return "existe";
	}else{
		$sql = "SELECT ip_user FROM usuarios WHERE ip_user = '".$ip."'AND tipo=2";
		$resultado = pg_query($consulta,$sql);
		if(pg_num_rows($resultado)!=0){
			$sql="INSERT INTO usuarios(email,senha,nome,tipo,datanasc,ip_user) VALUES('".$email."','".$senha."','".$nome."','2','".$data."','".$ip."')";
			$resultado=pg_query($consulta,$sql);
			if(pg_affected_rows($resultado)==0){
				return "erro";
			}else{
				return "sucesso";
			}
		}else{
			$sql="INSERT INTO usuarios(email,senha,nome,tipo,datanasc,ip_user) VALUES('".$email."','".$senha."','".$nome."','".$tipo."','".$data."','".$ip."')";
			$resultado=pg_query($consulta,$sql);
			if(pg_affected_rows($resultado)==0){
				return "erro";
			}else{
				return "sucesso";
			}
		}

	}
}


?>