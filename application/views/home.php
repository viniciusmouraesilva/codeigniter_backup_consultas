<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?=base_url("assets/css/estilo.css")?>">
</head>
<body>
	<p><?=$errors?></p>

	<?php if($mensagem) : ?>
		<p><?=$mensagem?></p>
	<?php endif; ?>

	<form action="<?=base_url()?>" method="POST" class="formulario">
		<p><input type="text" name="nome" placeholder="nome" value="<?=set_value('nome')?>"></p>
		<p><input type="text" name="email" placeholder="email" value="<?=set_value('email')?>"></p>
		<p><input type="text" name="idade" placeholder="idade" value="<?=set_value('idade')?>"></p>
		<p><input type="submit" value="Cadastrar"></p>
	</form>
</body>
</html>