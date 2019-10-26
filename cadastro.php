<form method="post">
	 <div class="container">
	   	<h3>Contate-nos</h3>
	   	<br>
	  	<hr>
		<label for="nome"><b>Nome Completo</b></label>
	    <input type="text" placeholder="Nome Completo" name="nome" required>

	    <label for="email"><b>Email</b></label>
	    <input type="text" placeholder="Email" name="email" required>

	    <label for="celular"><b>Celular</b></label>
	    <input type="text" placeholder="Celular" name="celular" required>

	    <label for="mensagem"><b>Mensagem</b></label>
	    <textarea name="mensagem" placeholder="Conte-me mais" rows="4"></textarea>

	    <hr>
	    <button type="submit" class="registerbtn" name="contato">Enviar</button>
	 </div>
</form>

<?php
	if (isset($_REQUEST['contato'])) 
	{
		$nome = $_REQUEST['nome'];
		$email = $_REQUEST['email'];
		$celular = $_REQUEST['celular'];
		$mensagem = $_REQUEST['mensagem'];
		$sql = "INSERT INTO `contato` (`nome`,`email`,`celular`,`mensagem`) VALUES (?,?,?,?)";
		$vetorPars = array($nome,$email,$celular,$mensagem);
		$resultado = fazConsultaSegura($sql,$vetorPars);
		echo "mensagem enviada!";
	}
 ?>