<div class="popup">
	<div class="postcontainer">
		<div class="inputs">
			<form method="post" enctype="multipart/form-data">
				<h3>Titulo:</h3> <input type="text" name="titulo" value="<?=$registro['titulo'];?>" required> <br><br>
		  		<h3>Resumo:</h3>  <textarea name="resumo" rows="3" required> <?=$registro['resumo'];?> </textarea> <br><br>
		  		<h3>Texto:</h3> <textarea name="texto" rows="3" required> <?=$registro['texto'];?> </textarea> <br><br>
		  		<input type="file" name="img"> <br><br>
		  		<h3>Posição:</h3><?=geraRadios(array('Left:'=>'left','Right:'=>'right'),'lado',0);?> <br><br>
		  		<input class="inclui" type="submit" name="confirmaedit" value="Confirma">
			</form>
		</div>
	</div>
</div>
<br>
<br>