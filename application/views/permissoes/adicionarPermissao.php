<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        Permissões
        <small>Adicionar permissões</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""> Gerenciar permissões</li>
        <li class="active"> Adicionar permissões</li>
    </ol>
</section>

<section class="content">
    <div class="col-md-8 col-md-offset-2">
        <?php if ($formErrors) { ?>
            <div class="alert alert-danger">
                <?= $formErrors ?>
            </div>
            <?php
        } else {
            if ($this->session->flashdata('success_msg')) {
                ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('success_msg') ?>
                </div>
                <?php
            }
        }
        ?>

    </div>
    <form action="<?php echo base_url() ?>index.php/permissoes/add" method="post">   
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">GERENCIAR PERMISSÕES DO SISTEMA</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <label>Nome da Permissão</label>
                            <input name="nome" type="text" id="nome" class="form-control" />
                        </div>
                        <br><br><br>
                        <div class="control-group">
                            <label for="documento" class="control-label"></label>
                            <div class="controls">

                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>

                                            <td>
                                                <label>
                                                    <input name="vProposta" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Proposta</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="aProposta" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Proposta</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="eProposta" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Proposta</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dProposta" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Proposta</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="iProposta" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Imprimir Proposta</span>
                                                </label>
                                            </td>

                                        </tr>

                                        <tr><td colspan="4"></td></tr>
                                        <tr>

                                            <td>
                                                <label>
                                                    <input name="vUsuario" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Usuário</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="aUsuario" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Usuario</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="eUsuario" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Usuário</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="dUsuario" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Usuário</span>
                                                </label>
                                            </td>

                                        </tr>
                                        <tr><td colspan="4"></td></tr>
                                        <tr>

                                            <td>
                                                <label>
                                                    <input name="vLead" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="aLead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="eLead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="dLead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Lead</span>
                                                </label>
                                            </td>
                                            
                                            <td>
                                                <label>
                                                    <input name="oLead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Ocultar Lead</span>
                                                </label>
                                            </td>

                                        </tr>

                                        <tr><td colspan="4"></td></tr>
                                        <tr>

                                            <td>
                                                <label>
                                                    <input name="vStatuslead" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Status Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="aStatuslead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Status Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="eStatuslead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Status Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="dStatuslead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Status Lead</span>
                                                </label>
                                            </td>

                                        </tr>
                                        <tr><td colspan="4"></td></tr>

                                        <tr>

                                            <td>
                                                <label>
                                                    <input name="vIndicacaolead" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Indicação Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="aIndicacaolead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Indicação Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="eIndicacaolead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Indicação Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="dIndicacaolead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Indicação Lead</span>
                                                </label>
                                            </td>

                                        </tr>
                                        <tr><td colspan="4"></td></tr>

                                        <tr>

                                            <td>
                                                <label>
                                                    <input name="vSeguimentolead" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Seguimento Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="aSeguimentolead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Seguimento Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="eSeguimentolead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Seguimento Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="dSeguimentolead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir IndicaçãoSeguimento Lead</span>
                                                </label>
                                            </td>

                                        </tr>
                                        <tr><td colspan="4"></td></tr>

                                        <tr>

                                            <td>
                                                <label>
                                                    <input name="vAgenda" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Agenda</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="aAgenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Agenda</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="eAgenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Agenda</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="dAgenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Agenda</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="tAgenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Todas Agendas</span>
                                                </label>
                                            </td>

                                        </tr>
                                        <tr><td colspan="4"></td></tr>

                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vBiblioteca" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Biblioteca</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="aBiblioteca" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Biblioteca</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="eBiblioteca" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Biblioteca</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="dBiblioteca" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Biblioteca</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr><td colspan="4"></td></tr>

                                        <tr>

                                            <td>
                                                <label>
                                                    <input name="mProposta" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Menu Proposta</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="mUsuario" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Menu Usuário</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="mPermissão" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Menu Permissão</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="mCRM" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Menu CRM</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="mIndicacaolead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Menu Indicação Lead</span>
                                                </label>
                                            </td>

                                        </tr>
                                        <tr><td colspan="5"></td></tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="mStatuslead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Menu Status Lead</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="mSeguimentolead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Menu Seguimento Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input name="mBiblioteca" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Menu Biblioteca</span>
                                                </label>
                                            </td>

                                        </tr>

                                        <!-- <?php /*
          <tr>

          <td>
          <label>
          <input name="vServico" class="marcar" type="checkbox" checked="checked" value="1" />
          <span class="lbl"> Visualizar Serviço</span>
          </label>
          </td>

          <td>
          <label>
          <input name="aServico" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Adicionar Serviço</span>
          </label>
          </td>

          <td>
          <label>
          <input name="eServico" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Editar Serviço</span>
          </label>
          </td>

          <td>
          <label>
          <input name="dServico" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Excluir Serviço</span>
          </label>
          </td>

          </tr>

          <tr><td colspan="4"></td></tr>
          <tr>

          <td>
          <label>
          <input name="vOs" class="marcar" type="checkbox" checked="checked" value="1" />
          <span class="lbl"> Visualizar OS</span>
          </label>
          </td>

          <td>
          <label>
          <input name="aOs" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Adicionar OS</span>
          </label>
          </td>

          <td>
          <label>
          <input name="eOs" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Editar OS</span>
          </label>
          </td>

          <td>
          <label>
          <input name="dOs" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Excluir OS</span>
          </label>
          </td>

          </tr>
          <tr><td colspan="4"></td></tr>

          <tr>

          <td>
          <label>
          <input name="vVenda" class="marcar" type="checkbox" checked="checked" value="1" />
          <span class="lbl"> Visualizar Venda</span>
          </label>
          </td>

          <td>
          <label>
          <input name="aVenda" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Adicionar Venda</span>
          </label>
          </td>

          <td>
          <label>
          <input name="eVenda" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Editar Venda</span>
          </label>
          </td>

          <td>
          <label>
          <input name="dVenda" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Excluir Venda</span>
          </label>
          </td>

          </tr>

          <tr><td colspan="4"></td></tr>

          <tr>

          <td>
          <label>
          <input name="vArquivo" class="marcar" type="checkbox" checked="checked" value="1" />
          <span class="lbl"> Visualizar Arquivo</span>
          </label>
          </td>

          <td>
          <label>
          <input name="aArquivo" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Adicionar Arquivo</span>
          </label>
          </td>

          <td>
          <label>
          <input name="eArquivo" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Editar Arquivo</span>
          </label>
          </td>

          <td>
          <label>
          <input name="dArquivo" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Excluir Arquivo</span>
          </label>
          </td>

          </tr>

          <tr><td colspan="4"></td></tr>

          <tr>

          <td>
          <label>
          <input name="vLancamento" class="marcar" type="checkbox" checked="checked" value="1" />
          <span class="lbl"> Visualizar Lançamento</span>
          </label>
          </td>

          <td>
          <label>
          <input name="aLancamento" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Adicionar Lançamento</span>
          </label>
          </td>

          <td>
          <label>
          <input name="eLancamento" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Editar Lançamento</span>
          </label>
          </td>

          <td>
          <label>
          <input name="dLancamento" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Excluir Lançamento</span>
          </label>
          </td>

          </tr>

          <tr><td colspan="4"></td></tr>

          <tr>

          <td>
          <label>
          <input name="rCliente" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Relatório Cliente</span>
          </label>
          </td>

          <td>
          <label>
          <input name="rServico" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Relatório Serviço</span>
          </label>
          </td>

          <td>
          <label>
          <input name="rOs" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Relatório OS</span>
          </label>
          </td>

          <td>
          <label>
          <input name="rProduto" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Relatório Produto</span>
          </label>
          </td>

          </tr>

          <tr>

          <td>
          <label>
          <input name="rVenda" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Relatório Venda</span>
          </label>
          </td>

          <td>
          <label>
          <input name="rFinanceiro" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Relatório Financeiro</span>
          </label>
          </td>
          <td colspan="2"></td>

          </tr>
          <tr><td colspan="4"></td></tr>

          <tr>

          <td>
          <label>
          <input name="cUsuario" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Configurar Usuário</span>
          </label>
          </td>

          <td>
          <label>
          <input name="cEmitente" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Configurar Emitente</span>
          </label>
          </td>

          <td>
          <label>
          <input name="cPermissao" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Configurar Permissão</span>
          </label>
          </td>

          <td>
          <label>
          <input name="cBackup" class="marcar" type="checkbox" value="1" />
          <span class="lbl"> Backup</span>
          </label>
          </td>

          </tr>
         */ ?>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>



                        <div class="form-actions">
                            <div class="span12">
                                <div class="span6 offset3">
                                    <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar</button>
                                    <a href="<?php echo base_url() ?>index.php/permissoes" id="" class="btn btn-danger"><i class="icon-arrow-left"></i> Voltar</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/validate.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $("#marcarTodos").change(function () {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        });



        $("#formPermissao").validate({
            rules: {
                nome: {required: true}
            },
            messages: {
                nome: {required: 'Campo obrigatório'}
            }
        });



    });
</script>
