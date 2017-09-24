
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Resultado </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <h3>Seu resultado foi: </h3>            
            <h2><strong><?= $result->result_name;?>:</strong> </h2>
            <p><?= $result->result_description;?></p>
            <a href="<?=base_url();?>index.php/" class="btn btn-primary"> Realizar novo quiz</a>
        </div>
    </div>
</div>
