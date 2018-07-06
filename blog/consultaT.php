<?php

session_start();
require_once('conexao.php');

$busca = $_GET['var'];
$r=listaPostsCategoria($busca);
if(isset($r)&&!empty($r)){
	$nm_categoria=nomeCategoria($busca);

?>


					<?php
					page($nm_categoria);
					echo "<br>";
					foreach ($r as $key) { ?>


					<div align="center" style="background-color: lightblue;">
						<div class="content-center">
							<h1><?php echo $key['titulo'] ?></h1>
							<p><?php echo $key['descricao'] ?></p>
							<h5><?php echo "Criado em: ";
								echo date("d-m-Y H:i",strtotime($key['data']));
								echo' ';
								echo "Autor:";
								echo " ";
								echo $key['nome'];?></h5>
							</div>

						</div><?php } ?>
					</tbody>
				</table>
			</center>
		</div>
		<?php }else{
			$nm_categoria=nomeCategoria($busca);
			page($nm_categoria);
	?>



<?php }?>