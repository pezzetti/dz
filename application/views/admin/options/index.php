<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Alternativas</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url();?>index.php/options/create" class="btn btn-info">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Nova Opção
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
                    <table width="100%" class="table table-striped table-bordered table-hover" id="options-table">
                        <thead>
                            <tr>
                                <th>Descrição</th>
                                <th>Resultado</th>                                
                            </tr>
                        </thead>

                        <tbody id="options-body">
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
            url: "options/read",           
            success: function (options) {
                table = $('#options-table').dataTable({
                    responsive: true,
                    "data": options,
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
                        {data: "option_description"},
                        {data: "result_name"},                        
                       

                    ]
                });
            },
            error: function () {

            }
        });        
    });
</script>
