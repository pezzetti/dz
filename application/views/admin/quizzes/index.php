<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quizzes</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url();?>index.php/quizzes/create" class="btn btn-info">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Novo Quiz
            </a>
        </div>
        <hr />
     </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="quizzes-table">
                        <thead>
                            <tr>
                                <th>Nome</th>                            
                            </tr>
                        </thead>

                        <tbody id="quizzes-body">
                        </tbody>

                    </table>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
</div>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->

<script>
    $(document).ready(function () {
        var table = null;
        $.getJSON({
            type: "POST",
            data: "",
            url: "quizzes/read",
            success: function (quizzes) {
                table = $('#quizzes-table').dataTable({
                    responsive: true,
                    "data": quizzes,
                    "language":{
                            "sEmptyTable": "Nenhum registro encontrado",
                                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                                "sInfoPostFix": "",
                                "sInfoThousands": ".",
                                "sLengthMenu": "_MENU_ Resultados por página",
                                "sLoadingRecords": "Carregando...",
                                "sProcessing": "Processando...",
                                "sZeroRecords": "Nenhum registro encontrado",
                                "sSearch": "Pesquisar ",
                                "oPaginate": {
                                    "sNext": "Próximo",
                                    "sPrevious": "Anterior",
                                    "sFirst": "Primeiro",
                                    "sLast": "Último"
                                },
                                "oAria": {
                                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                                    "sSortDescending": ": Ordenar colunas de forma descendente"
                                }
                            },
                    "columns": [
                        {data: "quiz_nome"},                       

                    ]
                });
            },
            error: function (a) {
               console.log(a);
            }
        });           
    });
</script>

