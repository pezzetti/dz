<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastrar quiz</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <form role="form" action="save" method="post" id="form">
                    <div class="form-group">
                        <label>Nome do quiz</label>
                        <input class="form-control" name="quiz_nome" id="name_quiz" required="">
                    </div>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- quiz Scripts -->
<script src="<?php echo base_url(); ?>assets/js/admin/Quiz_Scripts.js"></script>
