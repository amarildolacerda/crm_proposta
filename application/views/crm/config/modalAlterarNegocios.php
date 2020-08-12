
<!--MODAL Alterar nome do negócio-->
<div class="modal modal-success fade" id="modal-nomeDoNegocio">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Alterar nome do negócio</h4>
            </div>
            <form action="<?php echo current_url(); ?>" method="post">
                <input type="hidden" name="idNegocio" value="<?php echo $negocios->idNegocio ?>">
                <input type="hidden" name="valorDoNegocio" value="<?php echo $negocios->valorDoNegocio ?>">
                <input type="hidden" name="dataFechamentoEsperada" value="<?php echo $negocios->dataFechamentoEsperada ?>">
                <input type="hidden" name="faseDoFunil" value="<?php echo $negocios->faseDoFunil ?>">
                <div class="col-md-12">
                    <label style="color: white; font-size: 20px">Nome do negócio</label>
                    <input type="text" class="form-control"  name="nomeDoNegocio" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success ">Salvar<i class="icon-remove icon-white"></i></button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--MODAL Alterar nome do negócio-->

<!--MODAL Alterar valor negócio-->
<div class="modal modal-success fade" id="modal-valorNegocio">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Alterar valor do negócio</h4>
            </div>
            <form action="<?php echo current_url(); ?>" method="post">
                <input type="hidden" name="idNegocio" value="<?php echo $negocios->idNegocio ?>">
                <input type="hidden" name="nomeDoNegocio" value="<?php echo $negocios->nomeDoNegocio ?>">
                <input type="hidden" name="dataFechamentoEsperada" value="<?php echo $negocios->dataFechamentoEsperada ?>">
                <input type="hidden" name="faseDoFunil" value="<?php echo $negocios->faseDoFunil ?>">
                <input type="hidden" name="mensalidade" value="<?php echo $negocios->mensalidade ?>">
                <div class="col-md-12">
                    <label style="color: white; font-size: 20px">Valor do negócio</label>
                    <input type="number" class="form-control"  name="valorDoNegocio" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success ">Salvar<i class="icon-remove icon-white"></i></button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--MODAL Alterar valor negócio-->

<!--MODAL Alterar mensalidade-->
<div class="modal modal-success fade" id="modal-mensalidade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Alterar mensalidade</h4>
            </div>
            <form action="<?php echo current_url(); ?>" method="post">
                <input type="hidden" name="idNegocio" value="<?php echo $negocios->idNegocio ?>">
                <input type="hidden" name="nomeDoNegocio" value="<?php echo $negocios->nomeDoNegocio ?>">
                <input type="hidden" name="dataFechamentoEsperada" value="<?php echo $negocios->dataFechamentoEsperada ?>">
                <input type="hidden" name="faseDoFunil" value="<?php echo $negocios->faseDoFunil ?>">
                <input type="hidden" name="valorDoNegocio" value="<?php echo $negocios->valorDoNegocio?>">
                <div class="col-md-12">
                    <label style="color: white; font-size: 20px">Mensalidade</label>
                    <input type="number" class="form-control"  name="mensalidade" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success ">Salvar<i class="icon-remove icon-white"></i></button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--MODAL Alterar mensalidade-->

<!--MODAL NEGÓCIO GANHO-->
<div class="modal modal-success fade" id="modal-negocioGanho">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Deseja encerrar esse negócio como GANHO? </h4>
            </div>
            <form action="<?php echo base_url() ?>index.php/crm/negocioGanho" method="post">
                <input type="hidden" name="idNegocio" value="<?php echo $negocios->idNegocio ?>">
                <input type="hidden" name="nomeDoNegocio" value="<?php echo $negocios->nomeDoNegocio ?>">
                <input type="hidden" name="valorDoNegocio" value="<?php echo $negocios->valorDoNegocio ?>">
                <input type="hidden" name="dataFechamentoEsperada" value="<?php echo $negocios->dataFechamentoEsperada ?>">
                <input type="hidden" name="mensalidade" value="<?php echo $negocios->mensalidade ?>">
                <input type="hidden" name="faseDoFunil" value="5">
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Não</button>
                    <button type="submit" class="btn btn-success ">Sim<i class="icon-remove icon-white"></i></button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--MODAL NEGÓCIO GANHO-->

<!--MODAL NEGÓCIO PERDIDO-->
<div class="modal modal-danger fade" id="modal-negocioPerdido">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Deseja encerrar esse negócio como PERDIDO? </h4>
            </div>
            <form action="<?php echo base_url() ?>index.php/crm/negocioPerdido" method="post">
                <div class="col-md-12">
                    <label style="color: white; font-size:20px">Motivo da perda</label>
                    <textarea class="form-control" rows="3" name="motivoPerda" required=""></textarea>
                </div>
                <input type="hidden" name="idNegocio" value="<?php echo $negocios->idNegocio ?>">
                <input type="hidden" name="nomeDoNegocio" value="<?php echo $negocios->nomeDoNegocio ?>">
                <input type="hidden" name="valorDoNegocio" value="<?php echo $negocios->valorDoNegocio ?>">
                <input type="hidden" name="dataFechamentoEsperada" value="<?php echo $negocios->dataFechamentoEsperada ?>">
                <input type="hidden" name="mensalidade" value="<?php echo $negocios->mensalidade ?>">
                <input type="hidden" name="faseDoFunil" value="6">
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Não</button>
                    <button type="submit" class="btn btn-success ">Sim<i class="icon-remove icon-white"></i></button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--MODAL NEGÓCIO PERDIDO-->

<!--MODAL ADICIONAR TAREFA LIGACAO-->
<div class="modal fade" id="modal-adicionarTarefasLigacao" >
    <div class="modal-dialog">
        <div class="modal-content" style="background: #F71752; color: white">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Adicionar ligação </h4>
            </div>
            <form action="<?php echo base_url() ?>index.php/crm/adicionarTarefas" method="post">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="hidden" name="idNegocio" value="<?php echo $negocios->idNegocio ?>">
                        <input type="hidden" name="tipo" class="form-control" value="ligacao">
                        <input type="hidden" name="icone" class="form-control" value="fa fa-phone bg-fuchsia-active">
                        <label>Título</label>
                        <input type="text" class="form-control"  name="titulo" required="" value="Ligacao: ">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                       <label>Descrição da tarefa</label>
                        <textarea class="form-control" rows="3" name="descricao" ></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Data</label>
                        <input type="datetime-local" name="data" class="form-control"required="" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Não</button>
                    <button type="submit" class="btn btn-success ">Sim<i class="icon-remove icon-white"></i></button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--MODAL ADICIONAR TAREFAS LIGACAO-->
<!--MODAL ADICIONAR TAREFA VISITA-->
<div class="modal fade" id="modal-adicionarTarefasVisita" >
    <div class="modal-dialog">
        <div class="modal-content" style="background: #2B2B2B; color: white">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Adicionar Visita</h4>
            </div>
            <form action="<?php echo base_url() ?>index.php/crm/adicionarTarefas" method="post">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="hidden" name="idNegocio" value="<?php echo $negocios->idNegocio ?>">
                        <input type="hidden" name="tipo" class="form-control" value="visita">
                        <input type="hidden" name="icone" class="form-control " value="fa fa-calendar-plus-o bg-black">
                        <label>Título</label>
                        <input type="text" class="form-control"  name="titulo" required="" value="Visita: ">
                        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Descrição da tarefa</label>
                        <textarea class="form-control" rows="3" name="descricao"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Data</label>
                        <input type="datetime-local" name="data" class="form-control" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Não</button>
                    <button type="submit" class="btn btn-success ">Sim<i class="icon-remove icon-white"></i></button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--MODAL ADICIONAR TAREFAS-->

</div>
