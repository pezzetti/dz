<div class="row row-offcanvas row-offcanvas-right">

  <div class="col-12 col-md-9">          
    <div class="jumbotron">
      <h2>Bem vindo ao quiz do maroto</h2>
      <p>Realize nossos quizzes</p>
    </div>
    <div class="row">
      <?php foreach($quizzes as $quiz) : ?>
      <div class="col-6 col-lg-4">              
        <h2><?=$quiz->quiz_nome;?></h2>              
        <p><a class="btn btn-secondary" href="<?=base_url('/index.php/view/'.$quiz->quiz_id);?>" role="button">Realizar Quiz</a></p>
      </div><!--/span-->          
    <?php endforeach;?>
    </div><!--/row-->
  </div><!--/span-->
  
</div><!--/row-->


