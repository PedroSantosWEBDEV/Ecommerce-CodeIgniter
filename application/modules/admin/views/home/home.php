<script src="<?= base_url('assets/highcharts/highcharts.js') ?>"></script>
<script src="<?= base_url('assets/highcharts/data.js') ?>"></script>
<script src="<?= base_url('assets/highcharts/drilldown.js') ?>"></script>
<h1><img src="<?= base_url('assets/imgs/admin-home.png') ?>" class="header-img" style="margin-top:-3px;"> Inicio</h1>
<hr>
<div class="home-page">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Painel - Visão geral das estatísticas
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading fast-view-panel">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-clock-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <div style="font-size: 25px;"><?= date('d/m/Y', $_SESSION['last_login']) ?></div>
                                <div style="font-size: 16px;"><?= date('H:i:s', $_SESSION['last_login']) ?></div>
                            </div>
                            <div>Último acesso!</div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('admin/adminusers') ?>">
                    <div class="panel-footer">
                        <span class="pull-left">Ver detalhes</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading fast-view-panel">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-envelope-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $lastSubscribed ?></div>
                            <div>Novas inscrições!</div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('admin/emails') ?>">
                    <div class="panel-footer">
                        <span class="pull-left">Ver detalhes</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading fast-view-panel">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $newOrdersCount ?></div>
                            <div>Novos Pedidos!</div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('admin/orders') ?>">
                    <div class="panel-footer">
                        <span class="pull-left">Ver detalhes</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading fast-view-panel">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-sort-numeric-desc fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $lowQuantity ?></div>
                            <div>Produtos de baixa quantidade!<br> (inferior a 5 )</div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('admin/products?orderby=quantity=asc') ?>">
                    <div class="panel-footer">
                        <span class="pull-left">Ver detalhes</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Gráfico de área - Pedidos por mês</h3>
                </div>
                <div class="panel-body">
                    <div id="container-by-month" style="min-width: 310px; height: 400px; margin: 0 auto;">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Gráfico de área - Pedidos do Fornecedor</h3>
                </div>
                <div class="panel-body">
                    <div id="container-by-referrer" style="min-width: 310px; height: 400px; margin: 0 auto;">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Mais pedidos por tipo de pagamento</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Tipo de pagamento</th>
                                    <th>Número de Pedidos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($ordersByPaymentType)) {
                                    foreach ($ordersByPaymentType as $paymentT) {
                                        ?>
                                        <tr>
                                            <td><?= $paymentT['payment_type'] ?></td>
                                            <td><?= $paymentT['num'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="2">Sem Pedidos</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Último Registro de Atividades</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Usuário</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($activity->result()) {
                                    foreach ($activity->result() as $action) {
                                        ?>
                                        <tr>
                                            <td><i class="fa fa-user" aria-hidden="true"></i> <b><?= $action->username ?></b></td>
                                            <td><?= $action->activity . ' on ' . date('d.m.Y / H.m.s', $action->time) ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="2">Nenhum histórico encontrado!</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="<?= base_url('admin/history') ?>">Ver todas as atividades <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Mais vendidos</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Vendas</th>
                                    <th>Url</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($mostSold)) {
                                    foreach ($mostSold as $product) {
                                        ?>
                                        <tr>
                                            <td><?= $product['procurement'] ?></td>
                                            <td><a target="_blank" href="<?= base_url($product['url']) ?>"><?= base_url($product['url']) ?></a></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="2">Sem Pedidos</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="<?= base_url('admin/products?orderby=procurement=desc') ?>">Ver todos os produtos <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    /*
     * Chart for orders by referrer
     */
    $(function () {
    Highcharts.chart('container-by-referrer', {
    chart: {
    type: 'column'
    },
            title: {
            text: 'Pedidos vindos de..'
            },
            subtitle: {
            text: 'Mais pedidos por fornecedor'
            },
            xAxis: {
            type: 'categoria'
            },
            yAxis: {
            title: {
            text: 'Números máximos totais'
            }

            },
            legend: {
            enabled: false
            },
            plotOptions: {
            series: {
            borderWidth: 0,
                    dataLabels: {
                    enabled: true,
                            format: '{y}'
                    }
            }
            },
            tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> do total<br/>'
            },
            series: [{
            name: 'Indicador',
                    colorByPoint: true,
                    data: [
<?php foreach ($byReferral as $referrer) { ?>
                        {
                        name: '<?= $referrer['referrer'] ?>',
                                y: <?= $referrer['num'] ?>,
                                drilldown: '<?= $referrer['referrer'] ?>'
                        },
<?php } ?>
                    ]
            }]
    });
    });
    /*
     * Chart for orders by mount/year 
     */
    $(function () {
    Highcharts.chart('container-by-month', {
    title: {
    text: 'Pedidos Mensais',
            x: - 20
    },
            subtitle: {
            text: 'Fonte: Tabela de pedidos',
                    x: - 20
            },
            xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
            title: {
            text: 'Pedidos'
            },
                    plotLines: [{
                    value: 0,
                            width: 1,
                            color: '#808080'
                    }]
            },
            tooltip: {
            valueSuffix: ' Pedidos'
            },
            legend: {
            layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
            },
            series: [
<?php foreach ($ordersByMonth['years'] as $year) { ?>
                {
                name: '<?= $year ?>',
                        data: [<?= implode(',', $ordersByMonth['orders'][$year]) ?>]
                },
<?php } ?>
            ]
    });
    });
</script>
