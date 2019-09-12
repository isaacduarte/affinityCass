<?php
include_once '../classes/Cliente.class.php';
 include_once '../classes/Adquirente.class.php';
 include_once '../classes/Loja.class.php';
 include_once '../classes/loja_adquirente.class.php';
	$id_loja='';
   if(isset($_GET['id_cliente'])){
    	$cliente = Cliente::getClientePorId($_GET['id_cliente']);
		$id_cliente = $cliente['id_cliente'];
   }else if(isset($_GET['id_loja'])){
		$loja = Loja::getLojaPorId($_GET['id_loja']);
		$id_loja = $loja['id_loja'];
		$cnpj =  $loja['cnpj'];
		$id_cliente = $loja['id_cliente'];
   }
 ?>
 <h1><?php echo isset($id_cliente) ? 'Cadastrar Filial:': 'Alterar Loja' ?></h1>
<form method="post" action="../controles/controleFormularioLoja.php" autocomplete="off">
<input type="hidden" name="id_loja" value="<?php echo isset($id_loja) ? $id_loja : '' ?>">
<input type="hidden" name="id_cliente" value="<?php echo ($id_cliente) ?>">
	<?php
	$loja_adquirente = Loja_Adquirente::getLojaAdquirentePorId($id_loja);
	$resultados = Adquirente::getAdquirentesCadastrados();
	 
	?>


	<div class="row">
		<div class="col-md-6 form-group">
		<label><?php echo isset($id_cliente) ? 'Selecione uma adquirente:': 'Adquirente:' ?></label>
		<label>
		<?php
		$row[]='';
		$i=0;
			foreach ($loja_adquirente as $id){
			$ad=Adquirente::getAdquirentePorId($id['id_adquirente']);
			echo($ad['descricao'].', ');
				$row[$i] = $loja_adquirente['id_loja_adquirente'];
			}
			?>
		</label>
		<select id="framework" name="framework[]" multiple class="form-control">
		<?php
			foreach ($resultados as $adquirente):?>
  		 <option value="<?php echo $adquirente['id_adquirente']?>"><?php echo $adquirente['descricao']?></option>
		   <?php 
  			endforeach; 
   		 ?>
		</select>
		</div>
		<div class="col-md-6 form-group">
			<label>Informe o CNPJ</label>
			<input id="cnpj" type="text" class="form-control" name="cnpj" 
			placeholder="Digite o CNPJ" required value="<?php echo isset($cnpj) ? $cnpj : '' ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 form-group">
			<button name="form-submit" class="btn btn-primary center-block"><span class="fa fa-check"></span> Salvar</button>
		</div>
		<div class="col-md-4 form-group">
			<button type="reset" name="form-concluir" class="btn btn-primary center-block"
			onclick="window.location='?page=formulario-cliente'"><span class="fa fa-check"></span> Concluir</button>
		</div>
		<div class="col-md-4 form-group">
			<button type="reset" name="form-cancelar" class="btn btn-primary center-block"
			onclick="window.location='?page=buscar-cliente'"><span class="fa fa-times"></span> Cancelar</button>
		</div>
	</div>
  </div>
</div>
</form>