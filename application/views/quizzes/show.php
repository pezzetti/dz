
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quiz </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <form role="form" action="<?=base_url();?>index.php/result" method="post" id="form">
            	<?php foreach ($questions as $key =>$question):?>
                    <div class="form-group">
                        <label><?=$question->question_description;?></label>
                        <?php shuffle($question->options);?>
                        <?php foreach($question->options as $option) :?>
                         	<div class="radio">
							    <label>
							      <input type="radio" name="question_id-<?=$option->question_id;?>" value="<?=$option->result_id;?>" required>  
							      		<?=$option->option_description;?>
							    </label>
							 </div>                                     
					    <?php endforeach;?>             
                    </div>                         
            	<?php endforeach;?>            	
                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
        </div>
    </div>
</div>
