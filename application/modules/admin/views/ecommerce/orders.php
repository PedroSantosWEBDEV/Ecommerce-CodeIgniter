<link href="<?= base_url('assets/css/bootstrap-toggle.min.css') ?>" rel="stylesheet">
<div>
    <h1><img src="<?= base_url('assets/imgs/orders.png') ?>" class="header-img" style="margin-top:-2px;"> Pedidos <?= isset($_GET['settings']) ? ' / Definições' : '' ?></h1>
    <?php if (!isset($_GET['settings'])) { ?>
        <a href="?settings" class="pull-right orders-settings"><i class="fa fa-cog" aria-hidden="true"></i> <span>Definições</span></a>
    <?php } else { ?>
        <a href="<?= base_url('admin/orders') ?>" class="pull-right orders-settings"><i class="fa fa-angle-left" aria-hidden="true"></i> <span>Voltar</span></a>
    <?php } ?>
</div>
<hr>

<?php
if (!isset($_GET['settings'])) {
    if (!empty($orders)) {
        ?>
        <div style="margin-bottom:10px;">
            <select class="selectpicker changeOrder">
                <option <?= isset($_GET['order_by']) && $_GET['order_by'] == 'id' ? 'selected' : '' ?> value="id">Ordenar por novo</option>
                <option <?= (isset($_GET['order_by']) && $_GET['order_by'] == 'processed') || !isset($_GET['order_by']) ? 'selected' : '' ?> value="processed">Ordenar por não processado</option>
            </select>
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Pedido ID</th>
                        <th>Data</th>
                        <th>Nome</th>
                        <th>Celular</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Preview</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($orders as $tr) {
                        if ($tr['processed'] == 0) {
                            $class = 'bg-danger';
                            $type = 'Não processado';
                        }
                        if ($tr['processed'] == 1) {
                            $class = 'bg-success';
                            $type = 'Processado';
                        }
                        if ($tr['processed'] == 2) {
                            $class = 'bg-warning';
                            $type = 'Rejeitado';
                        }
                        ?>
                        <tr>
                            <td class="relative" id="order_id-id-<?= $tr['order_id'] ?>">
                                # <?= $tr['order_id'] ?>
                                <?php if ($tr['viewed'] == 0) { ?>
                                    <div id="new-order-alert-<?= $tr['id'] ?>">
                                        <img src="<?= base_url('assets/imgs/new-blinking.gif') ?>" style="width:100px;" alt="blinking">
                                    </div>
                                <?php } ?>
                                <div class="confirm-result">
                                    <?php if ($tr['confirmed'] == '1') { ?>
                                        <span class="label label-success">Confirmado por e-mail</span>
                                    <?php } else { ?> 
                                        <span class="label label-danger">Não confirmado</span> 
                                    <?php } ?>
                                </div>
                            </td>
                            <td><?= date('d/m/Y / H:i:s', $tr['date']); ?></td>
                            <td>
                                <i class="fa fa-user" aria-hidden="true"></i> 
                                <?= $tr['first_name'] . ' ' . $tr['last_name'] ?>
                            </td>
                            <td><i class="fa fa-phone" aria-hidden="true"></i> <?= $tr['phone'] ?></td>
                            <td class="<?= $class ?> text-center" data-action-id="<?= $tr['id'] ?>">
                                <div class="status" style="padding:5px; font-size:16px;">
                                    -- <b><?= $type ?></b> --
                                </div>
                                <div style="margin-bottom:4px;"><a href="javascript:void(0);" onclick="changeOrdersOrderStatus(<?= $tr['id'] ?>, 1, '<?= htmlentities($tr['products']) ?>', '<?= $tr['email'] ?>')" class="btn btn-success btn-xs">Processado</a></div>
                                <div style="margin-bottom:4px;"><a href="javascript:void(0);" onclick="changeOrdersOrderStatus(<?= $tr['id'] ?>, 0)" class="btn btn-danger btn-xs">Não processado</a></div>
                                <div style="margin-bottom:4px;"><a href="javascript:void(0);" onclick="changeOrdersOrderStatus(<?= $tr['id'] ?>, 2)" class="btn btn-warning btn-xs">Rejeitado</a></div>
                            </td>
                            <td class="text-center">
                                <a href="javascript:void(0);" class="btn btn-default more-info" data-toggle="modal" data-target="#modalPreviewMoreInfo" style="margin-top:10%;" data-more-info="<?= $tr['order_id'] ?>">
                                    Mais informações
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td class="hidden" id="order-id-<?= $tr['order_id'] ?>">
                                <div class="table-responsive">
                                    <table class="table more-info-purchase">
                                        <tbody>
                                            <tr>
                                                <td><b>Email</b></td>
                                                <td><a href="mailto:<?= $tr['email'] ?>"><?= $tr['email'] ?></a></td>
                                            </tr>
                                            <tr>
                                                <td><b>Cidade</b></td>
                                                <td><?= $tr['city'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Endereço</b></td>
                                                <td><?= $tr['address'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>CEP</b></td>
                                                <td><?= $tr['post_code'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Observações</b></td>
                                                <td><?= $tr['notes'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Vindo do site</b></td>
                                                <td>
                                                    <?php if ($tr['referrer'] != 'Direct') { ?>
                                                        <a target="_blank" href="<?= $tr['referrer'] ?>" class="orders-referral">
                                                            <?= $tr['referrer'] ?>
                                                        </a>
                                                    <?php } else { ?>
                                                        Tráfego direto ou referenciador não visível                       
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Tipo de pagamento</b></td>
                                                <td><?= $tr['payment_type'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Desconto</b></td>
                                                <td><?= $tr['discount_type'] == 'float' ? '-' . $tr['discount_amount'] : '-' . $tr['discount_amount'] . '%' ?></td>
                                            </tr>
                                            <?php if ($tr['payment_type'] == 'PayPal') { ?>
                                                <tr>
                                                    <td><b>PayPal Status</b></td>
                                                    <td><?= $tr['paypal_status'] ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="2"><b>Produtos</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <?php
                                                    $arr_products = unserialize($tr['products']);
                                                    foreach ($arr_products as $product) {
                                                        $total_amount = 0;
                                                        $total_amount += str_replace(' ', '', str_replace(',', '.',$product['product_info']['price']));
                                                        ?>
                                                        <div style="word-break: break-all;">
                                                            <div>
                                                                <img src="<?= base_url('attachments/shop_images/' . $product['product_info']['image']) ?>" alt="Product" style="width:100px; margin-right:10px;" class="img-responsive">
                                                            </div>
                                                            <a data-toggle="tooltip" data-placement="top" title="Click to preview" target="_blank" href="<?= base_url($product['product_info']['url']) ?>">
                                                                <?= base_url($product['product_info']['url']) ?>
                                                                <div style=" background-color: #f1f1f1; border-radius: 2px; padding: 2px 5px;">
                                                                    <b>Quantidade:</b> <?= $product['product_quantity'] ?> / 
                                                                    <b>Preco: <?= $this->config->item('currency').' '.$product['product_info']['price'] ?></b>
                                                                </div>
                                                            </a>
                                                            <div class="">
                                                                <b>Fornecedor:</b>
                                                                <a href=""><?= $product['product_info']['vendor_name'] ?></a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div style="padding-top:10px; font-size:16px;">Valor total dos produtos: <?= $this->config->item('currency').' '.$total_amount?></div>
                                                        <hr>
                                                    <?php }
                                                    ?>
                                                </td>

                                                <?php 
                                                $total_parsed = str_replace(' ', '', str_replace(',', '', $total_amount));
                                                if((int)$shippingAmount > 0 && ((int)$shippingOrder > $total_parsed)) { ?>
                                                    <tr>
                                                        <td><b>O valor do envio é</b></td>
                                                        <td><?= (int)$shippingAmount.' '.$this->config->item('currency') ?></td>
                                                    </tr>
                                                <?php } ?>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?= $links_pagination ?>
    <?php } else { ?>
        <div class="alert alert-info">Sem pedidos até o momento!</div>
    <?php }
    ?>        
    <hr>
    <?php
}
if (isset($_GET['settings'])) {
    ?>
    <h3>Pagamento na entrega</h3>
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Alterar a visibilidade desta opção de compra</div>
                <div class="panel-body">
                    <?php if ($this->session->flashdata('cashondelivery_visibility')) { ?>
                        <div class="alert alert-info"><?= $this->session->flashdata('cashondelivery_visibility') ?></div>
                    <?php } ?>
                    <form method="POST" action="">
                        <input type="hidden" name="cashondelivery_visibility" value="<?= $cashondelivery_visibility ?>">
                        <input <?= $cashondelivery_visibility == 1 ? 'checked' : '' ?> data-toggle="toggle" data-for-field="cashondelivery_visibility" class="toggle-changer" type="checkbox">
                        <button class="btn btn-default" value="" type="submit">
                            Salvar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h3>Configurações da conta Paypal</h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Modo sandbox do Paypal (use para testes de conta paypal)</div>
                <div class="panel-body">
                    <?php if ($this->session->flashdata('paypal_sandbox')) { ?>
                        <div class="alert alert-info"><?= $this->session->flashdata('paypal_sandbox') ?></div>
                    <?php } ?>
                    <form method="POST" action="">
                        <input type="hidden" name="paypal_sandbox" value="<?= $paypal_sandbox ?>">
                        <input <?= $paypal_sandbox == 1 ? 'checked' : '' ?> data-toggle="toggle" data-for-field="paypal_sandbox" class="toggle-changer" type="checkbox">
                        <button class="btn btn-default" value="" type="submit">
                            Salvar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Paypal e-mail comercial</div>
                <div class="panel-body">
                    <?php if ($this->session->flashdata('paypal_email')) { ?>
                        <div class="alert alert-info"><?= $this->session->flashdata('paypal_email') ?></div>
                    <?php } ?>
                    <form method="POST" action="">
                        <div class="input-group">
                            <input class="form-control" placeholder="Deixe em branco para nenhum método paypal disponível" name="paypal_email" value="<?= $paypal_email ?>" type="text">
                            <span class="input-group-btn">
                                <button class="btn btn-default" value="" type="submit">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
    <hr>
    <h3>Configurações da conta bancária</h3>
    <div class="row">
        <div class="col-sm-6">
            <?php if ($this->session->flashdata('bank_account')) { ?>
                <div class="alert alert-info"><?= $this->session->flashdata('bank_account') ?></div>
            <?php } ?>
            <form method="POST" action="">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td colspan="2"><b>Pagar para - Nome do destinatário/Ltd</b></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="text" name="name" value="<?= $bank_account != null ? $bank_account['name'] : '' ?>" class="form-control" placeholder="Exemplo: BBesports Ltd."></td>
                            </tr>
                            <tr>
                                <td><b>IBAN</b></td>
                                <td><b>BIC<b></td>

                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" value="<?= $bank_account != null ? $bank_account['iban'] : '' ?>" name="iban" placeholder="Exemplo: BG11FIBB329291923912301230"></td>
                                <td><input type="text" class="form-control" value="<?= $bank_account != null ? $bank_account['bic'] : '' ?>" name="bic" placeholder="Exemplo: FIBBGSF"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>BANCO</b></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="text" value="<?= $bank_account != null ? $bank_account['bank'] : '' ?>" name="bank" class="form-control" placeholder="Exemplo: Primeiro Banco de Investimento"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <input type="submit" class="form-control" value="Salvar configurações de conta bancária">
            </form>
        </div>
    </div>
<?php } ?>
<!-- Modal for more info buttons in orders -->
<div class="modal fade" id="modalPreviewMoreInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Preview <b id="client-name"></b></h4>
            </div>
            <div class="modal-body" id="preview-info-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/bootstrap-toggle.min.js') ?>"></script>
