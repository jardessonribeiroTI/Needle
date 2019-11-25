<?php $v->layout("_theme"); ?>
<link rel="stylesheet" type="text/css" href="<?= url("/theme/css/style-teste.css"); ?>">

<script src="<?= url("/theme/assets/jquery3.4.1.js"); ?>"></script>
<div id="container">
	<div class="container-body">
		<div class="row">
			<br><br><br>
			<h1>Página - teste</h1>
			<h4>Listagem</h4>
			<div class="list">
				<table border="1">
					<tr>
						<td>nome-objeto</td>
						<td>sobrenome-objeto</td>
						<td>idade-objeto</td>
						<td>Excluir</td>
					</tr>
					<?php while($mostrar = mysqli_fetch_row($result)): ?>
						<tr>
							<td><?php echo $mostrar[0] ?></td>
							<td><?php echo $mostrar[1] ?></td>
							<td><?php echo $mostrar[2] ?></td>
							<td class="remove"><a class="remove" href="#" data-action="<?= $router->route("delete"); ?>" data-id="<?= $mostrar[3]; ?>">Del</a></td>
						</tr>
					<?php endWhile; ?>

				</table>
			</div>
			<div class="cadastro">
				<h4>Cadastro</h4>
				<div class="row-cadastro">
					<form class="style-form" name="gallery" action="<?= $router->route("create"); ?>" method="post">
						<label class="style-label">Nome</label>
						<input type="text" name="nome" class="style-input" placeholder="Digite seu nome"></input>
						<label class="style-label">Sobrenome</label>
						<input type="text" name="sobrenome" class="style-input" placeholder="Digite seu Sobrenome"></input>
						<label class="style-label">Idade</label>
						<input type="text" name="idade" class="style-input" placeholder="Digite sua Idade"></input>
						<div id="buttons">
						<button class="style-button" id="cadastrar">Cadastrar</button>
						<button class="style-button" id="atualizar">Atualizar</button>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		function load(action){

		}

		$("form").submit(function(e){
			e.preventDefault();
		})
		$("body").on("click", "[data-action]", function(e){
			e.preventDefault();
			//var tt = $(this).attr("data-id");
			//alert(tt);
			var data = $(this).data();

			$.post(data.action, data, function(){
				alert("Nada");
			}, "json").fail(function(){
				alert("data-id");
			});


		})
	})
</script>