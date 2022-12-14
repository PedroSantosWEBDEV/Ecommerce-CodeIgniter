<script src="<?= base_url('assets/js/jquery-ui.min.js') ?>"></script>
<link href="<?= base_url('assets/css-gradient-generator/src/css-gradient-generator.css') ?>" rel="stylesheet" type="text/css" media="all">
<link href="<?= base_url('assets/css-gradient-generator/resources/icomoon/sprites.css') ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url('assets/css-gradient-generator/resources/bootstrap-colorpickersliders/bootstrap.colorpickersliders.css') ?>" rel="stylesheet" type="text/css" media="all">

<h1><img src="<?= base_url('assets/imgs/pages-styling.png') ?>" class="header-img" style="margin-top:-3px;">Estilo</h1>
<hr>
<div class="alert alert-info">
    <b>Siga os passos:</b><br>
    <ol>
        <li>Gere a cor que você deseja</li>
        <li>Clique em OBTER CSS</li>
        <li>Cole-o no campo NOVO ESTILO na parte inferior da página e clique em SALVAR</li>
    </ol>
    <b>Deixe em branco para o estilo padrão</b>
</div>
<div class="container" id="styling-page">
    <div class="css-gradient-editor-container layout-init clearfix">
        <div class="row toolbar">
            <div class="col-md-12 text-right">
                <div class="btn-group btn-group-sm">
                    <a href="#" class="btn btn-default css-gradient-editor-configuration" data-toggle="modal" data-target="#configmodal"><span class="pngicon-wrench"></span> Config</a>
                    <a href="" class="btn btn-default css-gradient-editor-permalink"><span class="pngicon-share"></span> Compartilhar link permanente</a>
                    <a href="#" class="btn btn-default css-gradient-editor-qrcode" title="Link permanente do QR code" data-toggle="modal" data-target="#qrmodal"><span class="pngicon-qrcode"></span> QR Code</a>
                    <a target="_blank" href="<?= base_url('assets/css-gradient-generator/gradient.php') ?>" class="btn btn-default css-gradient-editor-imagegradient" style="margin-right:10px"><span class="pngicon-picture"></span> Obter PNG</a>
                    <button type="button" class="btn btn-primary css-gradient-editor-getcss" data-toggle="modal" data-target="#cssoutmodal" style="margin-right:10px"><span class="pngicon-file-css"></span> Obter CSS</button>
                    <button type="button" class="btn css-gradient-editor-undo"><span class="pngicon-undo"></span> Desfazer</button>
                    <button type="button" class="btn css-gradient-editor-redo"><span class="pngicon-redo"></span> Refazer</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel css-gradient-editor-swatches-wrapper">
                    <div class="panel-heading"><h2 class="panel-title pull-left">Predefinições</h2>
                        <div class="clearfix">
                            <div class="pull-right btn-group">
                                <button type="button" class="btn btn-default btn-sm css-gradient-editor-export" title="Adicionar gradient às amostras" data-toggle="modal" data-target="#exportallmodal"><span class="pngicon-arrow-up2"></span> Exportar tudo</button>
                                <button type="button" class="btn btn-default btn-sm css-gradient-editor-import" title="Adicionar gradient às amostras" data-toggle="modal" data-target="#importmodal"><span class="pngicon-arrow-down2"></span> Importar</button>
                                <div class="css-gradient-editor-preset current btn pull-left"><span></span></div>
                                <button type="button" class="btn btn-primary btn-sm css-gradient-editor-save" title="Add gradient to swatches"><span class="pngicon-disk"></span> Salvar</button>
                                <button type="button" class="btn btn-primary btn-sm css-gradient-editor-delete" title="Remove gradient from swatches"><span class="pngicon-remove"></span> Excluir</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="content css-gradient-editor-swatches">
                            <ul class="clearfix"></ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="css-gradient-editor panel css-gradient-editor-preview-panel">
                    <div class="panel-heading"><h2 class="panel-title pull-left">Preview</h2>
                        <div class="clearfix">
                            <div class="pull-right btn-group">
                                <button type="button" class="btn btn-primary btn-sm css-gradient-editor-adjustcolor"><span class="pngicon-settings"></span> Ajustar cor</button>
                                <button type="button" class="btn btn-primary btn-sm css-gradient-editor-previewpopout"><span class="pngicon-popup"></span> Pop out</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="css-gradient-editor-preview-container">
                            <div class="css-gradient-editor-preview">
                                <div class="ajax-loader"><span class="css-gradient-editor-preview-resize-handler"></span></div>
                                <span class="css-gradient-controls">
                                    <button type="button" class="btn btn-primary btn-sm css-gradient-editor-previewpopout"><span class="pngicon-collapse"></span></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel gradient-properties">
            <div class="panel-heading"><h2 class="panel-title pull-left">Propriedades de Gradient</h2>
                <div class="clearfix">
                    <div class="pull-right btn-group">
                        <a href="" class="btn btn-hover btn-primary btn-sm css-gradient-editor-layout-easy" title="IE6+, Android 2.3+, iOS 3.2+ CSS, filtro, antigos gradientes lineares do webkit ">Simples</a>
                        <a href="" class="btn btn-hover btn-primary btn-sm css-gradient-editor-layout-advanced" title="IE9+, Android 3.0+, iOS 3.2+, WP7.5+ CSS, gradientes radiais dinâmicos SVG ">Avançado</a>
                        <a href="" class="btn btn-hover btn-primary btn-sm css-gradient-editor-layout-expert" title="IE10+, Android 4.0+, iOS 5.0+ Somente para navegadores com suporte a CSS3 experimental ">Especialista</a>
                    </div>
                </div>
            </div>
            <div class="panel-body nopadding">

                <div class="layout-warning-box">
                    <div class="label-warning layout-warning-advanced">
                    O gradiente atual precisa de recursos avançados para que o layout desejado seja substituído! ... <a href="" class="force-layout-change">Forçar mudança</a>
                    </div>

                    <div class="label-warning layout-warning-expert">
                    O gradiente atual precisa de recursos especializados para que o layout desejado seja substituído! ... <a href="" class="force-layout-change">Forçar mudança</a>
                    </div>
                </div>

                <div class="row gradient-preferences-easy">
                    <div class="col-sm-5 col-xs-12">
                        <input name="color_from">
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="css-gradient-editor-linear-direction-implicit">
                            <div class="btn-row">
                                <button class="btn btn-default btn-sm css-gradient-editor-controller css-gradient-editor-direction-top" data-control-group="linear-direction" data-name="gradient_direction" data-value="top"><span class="pngicon-arrow-up"></span></button>
                            </div>
                            <div class="btn-row">
                                <button class="btn btn-default btn-sm css-gradient-editor-controller css-gradient-editor-direction-left" data-control-group="linear-direction" data-name="gradient_direction" data-value="left"><span class="pngicon-arrow-left"></span></button>
                                <button class="btn btn-default btn-sm css-gradient-editor-controller css-gradient-editor-direction-right pull-right" data-control-group="linear-direction" data-name="gradient_direction" data-value="right"><span class="pngicon-arrow-right"></span></button>
                            </div>
                            <div class="btn-row">
                                <button class="btn btn-default btn-sm css-gradient-editor-controller css-gradient-editor-direction-bottom" data-control-group="linear-direction" data-name="gradient_direction" data-value="bottom"><span class="pngicon-arrow-down"></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-xs-12">
                        <input name="color_to">
                    </div>
                </div>

                <div class="row gradient-preferences-advanced">
                    <div class="col-md-6">

                        <div class="css-gradient-editor-preferences form-horizontal block">

                            <div class="form-group">
                                <label class="col-xs-3">Recorrente: </label>
                                <div class="col-xs-9 btn-group">
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="repeat" data-name="gradient_repeat" data-value="on">repetir</button>
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="repeat" data-name="gradient_repeat" data-value="off">não repetir</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-3">Gradient type: </label>
                                <div class="col-xs-9 btn-group">
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="gradient_type" data-name="gradient_type" data-value="linear">linear</button>
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="gradient_type" data-name="gradient_type" data-value="radial">radial</button>
                                </div>
                            </div>

                            <div class="css-gradient-editor-linear-preferences form-group">
                                <label class="col-xs-3">Direção:</label>
                                <div class="col-xs-9">
                                    <div class="css-gradient-editor-linear-direction">
                                        <div class="css-gradient-editor-linear-direction-implicit">
                                            <div class="btn-row">
                                                <button class="btn btn-default btn-sm css-gradient-editor-controller css-gradient-editor-direction-top-left" data-control-group="linear-direction" data-name="gradient_direction" data-value="top left"><span class="pngicon-arrow-up-left"></span></button>
                                                <button class="btn btn-default btn-sm css-gradient-editor-controller css-gradient-editor-direction-top" data-control-group="linear-direction" data-name="gradient_direction" data-value="top"><span class="pngicon-arrow-up"></span></button>
                                                <button class="btn btn-default btn-sm css-gradient-editor-controller css-gradient-editor-direction-top-right" data-control-group="linear-direction" data-name="gradient_direction" data-value="top right"><span class="pngicon-arrow-up-right"></span></button>
                                            </div>
                                            <div class="btn-row">
                                                <button class="btn btn-default btn-sm css-gradient-editor-controller css-gradient-editor-direction-left" data-control-group="linear-direction" data-name="gradient_direction" data-value="left"><span class="pngicon-arrow-left"></span></button>
                                                <button class="btn btn-default btn-sm css-gradient-editor-controller css-gradient-editor-direction-right" data-control-group="linear-direction" data-name="gradient_direction" data-value="right"><span class="pngicon-arrow-right"></span></button>
                                            </div>
                                            <div class="btn-row">
                                                <button class="btn btn-default btn-sm css-gradient-editor-controller css-gradient-editor-direction-bottom-left" data-control-group="linear-direction" data-name="gradient_direction" data-value="bottom left"><span class="pngicon-arrow-down-left"></span></button>
                                                <button class="btn btn-default btn-sm css-gradient-editor-controller css-gradient-editor-direction-bottom" data-control-group="linear-direction" data-name="gradient_direction" data-value="bottom"><span class="pngicon-arrow-down"></span></button>
                                                <button class="btn btn-default btn-sm css-gradient-editor-controller css-gradient-editor-direction-bottom-right" data-control-group="linear-direction" data-name="gradient_direction" data-value="bottom right"><span class="pngicon-arrow-down-right"></span></button>
                                            </div>
                                        </div>

                                        <div class="css-gradient-editor-linear-direction-explicit">
                                            <span class="css-gradient-editor-controller css-gradient-editor-direction-angle" data-control-group="linear-direction" data-name="gradient_direction" data-value="angle"><span></span></span>
                                            <span class="css-gradient-editor-controller css-gradient-editor-direction-angle-input" data-control-group="linear-direction" data-name="gradient_direction" data-value="angle"><input type="text" name="angle" class="input-sm"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="css-gradient-editor-radial-preferences form-group">
                                <div class="form-group css-gradient-editor-radial-shape">
                                    <label class="col-xs-3">Forma: </label>
                                    <div class="col-xs-9 btn-group">
                                        <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="gradient_shape" data-name="gradient_shape" data-value="circle">círculo</button>
                                        <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="gradient_shape" data-name="gradient_shape" data-value="ellipse">elipse</button>
                                    </div>
                                </div>

                                <div class="form-group css-gradient-editor-radial-size">
                                    <label class="col-xs-3">Tamanho: </label>
                                    <div class="col-xs-9">
                                        <div class="controls">
                                            <label>Implícito</label>
                                            <div class="btn-group">
                                                <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="gradient_size" data-name="gradient_size" data-value="closest-side">closest-side</button>
                                                <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="gradient_size" data-name="gradient_size" data-value="closest-corner">closest-corner</button>
                                                <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="gradient_size" data-name="gradient_size" data-value="farthest-side">farthest-side</button>
                                                <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="gradient_size" data-name="gradient_size" data-value="farthest-corner">farthest-corner</button>
                                            </div>
                                        </div>
                                        <div class="controls">
                                            <label>Explícito</label>
                                            <span class="span css-gradient-editor-controller css-gradient-editor-size-explicit" data-control-group="gradient_size" data-name="gradient_size" data-value="explicit"><input type="text" name="gradient_size" data-units='["px"]' class="input-sm"> <input type="text" name="gradient_size_major" data-units='["px"]' class="input-sm"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group css-gradient-editor-radial-horizontal-position">
                                    <label class="col-xs-3">Posição horizontal: </label>
                                    <div class="col-xs-9">
                                        <div class="controls">
                                            <label>Implícito</label>
                                            <div class="btn-group">
                                                <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="gradient_position_horizontal" data-name="gradient_position_horizontal" data-value="left">left</button>
                                                <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="gradient_position_horizontal" data-name="gradient_position_horizontal" data-value="center">center</button>
                                                <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="gradient_position_horizontal" data-name="gradient_position_horizontal" data-value="right">right</button>
                                            </div>
                                        </div>
                                        <div class="controls">
                                            <label>Explícito</label>
                                            <span class="css-gradient-editor-controller css-gradient-editor-position-horizontal-explicit" data-control-group="gradient_position_horizontal" data-name="gradient_position_horizontal" data-value="explicit"><input type="text" name="gradient_position_horizontal" data-units='["%","px"]' class="input-sm"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group css-gradient-editor-radial-vertical-position">
                                    <label class="col-xs-3">Posição vertical: </label>
                                    <div class="col-xs-9">
                                        <div class="controls">
                                            <label>Implícito</label>
                                            <div class="btn-group">
                                                <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="gradient_position_vertical" data-name="gradient_position_vertical" data-value="top">top</button>
                                                <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="gradient_position_vertical" data-name="gradient_position_vertical" data-value="center">center</button>
                                                <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="gradient_position_vertical" data-name="gradient_position_vertical" data-value="bottom">bottom</button>
                                            </div>
                                        </div>
                                        <div class="controls">
                                            <label>Explícito</label>
                                            <span class="css-gradient-editor-controller css-gradient-editor-position-vertical-explicit" data-control-group="gradient_position_vertical" data-name="gradient_position_vertical" data-value="explicit"><input type="text" name="gradient_position_vertical" data-units='["px","%"]' class="input-sm"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="css-gradient-editor-colorstops-easy">
                            <div class="css-gradient-editor-stopeditor"><span></span><div class="css-gradient-editor-stoppointmarkers"></div></div>
                        </div>

                        <div class="css-gradient-editor-colorstops-advanced clearfix">
                            <div class="css-gradient-editor-stoppointlist"></div>
                            <button type="button" class="col-md-4 btn btn-sm btn-default css-gradient-editor-reorder-stoppoints"><span class="pngicon-random"></span> Atualizar ordem</button>
                            <button type="button" class="col-md-offset-4 col-md-4 btn btn-sm btn-primary css-gradient-editor-add-stoppoint"><span class="pngicon-plus"></span> Adicionar ponto de parada</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- Modal -->
        <div class="modal bs-modal-lg" id="cssoutmodal" tabindex="-1" role="dialog" aria-labelledby="cssModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Generated CSS</h4>
                    </div>
                    <div class="modal-body">
                        <div class="css-gradient-editor-cssoutput-container">
                            <textarea class="css-gradient-editor-cssoutput" style="width:100%;" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal bs-modal-lg" id="qrmodal" tabindex="-1" role="dialog" aria-labelledby="permalinkModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Gradient permalink <small>Teste o gradiente atual em seu navegador móvel</small></h4>
                    </div>
                    <div class="modal-body">
                        <div id="permalinkqr" class="text-center"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal bs-modal-lg" id="exportallmodal" tabindex="-1" role="dialog" aria-labelledby="permalinkModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Export presets <small>save the content to a file</small></h4>
                    </div>
                    <div class="modal-body">
                        <textarea class="css-gradient-editor-textarea-exportall" readonly="readonly"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal bs-modal-lg" id="importmodal" tabindex="-1" role="dialog" aria-labelledby="permalinkModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Import presets <small>paste the previously saved data into the textarea</small></h4>
                    </div>
                    <div class="modal-body">
                        <textarea class="css-gradient-editor-textarea-import"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link loaddefaults">Load defaults</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Import</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal bs-modal-lg" id="configmodal" tabindex="-1" role="dialog" aria-labelledby="permalinkModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Configuration</h4>
                    </div>
                    <div class="modal-body">

                        <form class="form-horizontal" role="form">

                            <div class="form-group">
                                <label class="col-xs-3 text-right">CSS selector:</label>
                                <div class="col-xs-2">
                                    <input type="text" class="form-control" data-name="config_cssselector" name="config-cssselector" placeholder=".gradient">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-3 text-right">Color format: </label>
                                <div class="col-xs-9 btn-group">
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="config_colorformat" data-name="config_colorformat" data-value="rgb">rgb</button>
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="config_colorformat" data-name="config_colorformat" data-value="hsl">hsl</button>
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="config_colorformat" data-name="config_colorformat" data-value="hex">hex</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-3 text-right">Color picker visible sliders: </label>
                                <div class="col-xs-9 btn-group">
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-name="config_colorpicker_hsl">hsl</button>
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-name="config_colorpicker_rgb">rgb</button>
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-name="config_colorpicker_cie">cie</button>
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-name="config_colorpicker_opacity">opacity</button>
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-name="config_colorpicker_swatches">color swatches</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-3 text-right">Mixed stop point units: </label>
                                <div class="col-xs-9 btn-group">
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="config_mixedstoppointunits" data-name="config_mixedstoppointunits" data-value="enabled">enabled</button>
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-control-group="config_mixedstoppointunits" data-name="config_mixedstoppointunits" data-value="disabled">disabled</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-3 text-right">Code generation: </label>
                                <div class="col-xs-9 btn-group">
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-name="config_generation_bgcolor" title="Weighted average background color fallback">bg color</button>
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-name="config_generation_iefilter" title="IE 6-8">IE filter</button>
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-name="config_generation_svg" title="IE 9, iOS 3.2-4.3, WP 7.5">SVG</button>
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-name="config_generation_oldwebkit" title="SVG and SVG with old-webkit if justified (radial gradients only, and only needed for Android 2.3 and older where SVG is not supported but the SVG definition deletes the old webkit syntax if placed after that, which is needed for radial gradients because the `-webkit-gradient` syntax with radial shape lacks support for percentage-defined size)">old webkit</button>
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-name="config_generation_webkit" title="Android 3.0+, iOS 5.0+ - but they supports SVG as well">newer webkit</button>
                                    <button class="btn btn-default btn-sm css-gradient-editor-controller" data-name="config_generation_ms" title="IE10 consumer preview - there is really no need to use it">-ms</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-3 text-right">Fallback width:</label>
                                <div class="col-xs-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-name="config_fallbackwidth" name="config-fallbackwidth">
                                        <span class="input-group-addon">px</span>
                                    </div>
                                </div>
                                <p class="help-block">Used in some circumstances with old webkit and SVG generation. Using preview size if not specified.</p>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 text-right">Fallback height:</label>
                                <div class="col-xs-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-name="config_fallbackheight" name="config-fallbackheight">
                                        <span class="input-group-addon">px</span>
                                    </div>
                                </div>
                                <p class="help-block">Used in some circumstances with old webkit and SVG generation. Using preview size if not specified.</p>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <form method="POST" action="">
        <div class="form-group">
            <label for="new-style">Colar novo estilo:</label>
            <textarea class="form-control" name="newStyle" rows="15" id="new-style" placeholder="Deixe em branco para carregar os estilos padrão"><?= $newStyle ?></textarea>
        </div>
        <button type="submit" class="btn btn-lg btn-default">Salvar</button>
        <a href="javascript:void(0)" class="btn btn-lg btn-default clear-style">Limpar Estilos</a>
    </form>
</div>

<div id="coloroffsethtml" style="display:none;">
    <div class="coloroffset-container">
        <div class="offset-hue slider-container">
            <div class="slider-inner">
                <span class="slider-controller"></span>
            </div>
        </div>
        <div class="offset-chroma slider-container">
            <div class="slider-inner">
                <span class="slider-controller"></span>
            </div>
        </div>
        <div class="offset-lightness slider-container">
            <div class="slider-inner">
                <span class="slider-controller"></span>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/css-gradient-generator/resources/bootstrap-touchspin/bootstrap.touchspin.js') ?>"></script>
<script src="<?= base_url('assets/css-gradient-generator/resources/tinycolor/tinycolor.js') ?>"></script>
<script src="<?= base_url('assets/css-gradient-generator/resources/bootstrap-colorpickersliders/bootstrap.colorpickersliders.js') ?>"></script>
<script src="<?= base_url('assets/css-gradient-generator/src/css-gradient-generator.js') ?>"></script>
<script src="<?= base_url('assets/css-gradient-generator/resources/jquery.base64/jquery.base64.min.js') ?>"></script>
<script src="<?= base_url('assets/css-gradient-generator/resources/qrcode/qrcode.min.js') ?>"></script>
<script>
    var ge = new CSSGradientEditor($('.css-gradient-editor-container'));
    function increase_brightness(hex, percent) {
        hex = hex.replace(/^\s*#|\s*$/g, '');
        if (hex.length == 3) {
            hex = hex.replace(/(.)/g, '$1$1');
        }
        var r = parseInt(hex.substr(0, 2), 16),
                g = parseInt(hex.substr(2, 2), 16),
                b = parseInt(hex.substr(4, 2), 16);
        return '#' +
                ((0 | (1 << 8) + r + (256 - r) * percent / 100).toString(16)).substr(1) +
                ((0 | (1 << 8) + g + (256 - g) * percent / 100).toString(16)).substr(1) +
                ((0 | (1 << 8) + b + (256 - b) * percent / 100).toString(16)).substr(1);
    }
    $(document).ready(function () {
        $('button, a').tooltip();
        $('.clear-style').click(function(){
            $('#new-style').val('');
        });
    });
</script>