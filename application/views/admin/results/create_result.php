<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastrar resultado</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <form role="form" action="save" method="post" id="form">
                    <div class="form-group">
                        <label>Nome do resultado</label>
                        <input class="form-control" name="result_name" id="name_resultado" required="">
                     </div>   
                     <div class="form-group">
                        <label>Descrição</label>
                        <input class="form-control" name="result_description" id="result_description" required="">
                     </div>   
                     <div class="form-group">
                        <label>Quiz</label>
                        <select name="quiz_id" class="form-control">                           
                            <?php foreach($quizzes as $quiz):?>
                                <option value="<?=$quiz->quiz_id;?>"><?=$quiz->quiz_nome;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- resultado Scripts -->
<script src="<?php echo base_url(); ?>assets/js/admin/resultado_Scripts.js"></script>
