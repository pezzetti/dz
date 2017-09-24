<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastrar Alternativa</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <form role="form" action="save" method="post" id="form">
                    <div class="form-group">
                        <label>Descrição</label>
                        <input class="form-control" name="option_description" id="option_description" required>                         
                    </div>     
                    <div class="form-group">
                        <label>Pergunta</label>
                        <select name="question_id" class="form-control">                           
                            <?php foreach($questions as $question):?>
                                <option value="<?=$question->question_id;?>"><?=$question->question_description;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>    
                    <div class="form-group">    
                        <label>Resultado</label>
                        <select name="result_id" class="form-control">                           
                            <?php foreach($results as $result):?>
                                <option value="<?=$result->result_id;?>"><?=$result->result_name;?></option>
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
