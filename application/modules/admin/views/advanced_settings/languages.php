<div id="languages">
    <h1><img src="<?= base_url('assets/imgs/small-globe.png') ?>" class="header-img" style="margin-top:-3px;"> Idiomas</h1> 
    <hr>
    <?php
    if (isset($writable)) {
        ?>
        <div class="alert alert-danger"><?= $writable ?></div>
        <?php
    }
    if (validation_errors()) {
        ?>
        <hr>
        <div class="alert alert-danger"><?= validation_errors() ?></div>
        <hr>
        <?php
    }
    if ($this->session->flashdata('result_add')) {
        ?>
        <hr>
        <div class="alert alert-success"><?= $this->session->flashdata('result_add') ?></div>
        <hr>
        <?php
    }
    if ($this->session->flashdata('result_delete')) {
        ?>
        <hr>
        <div class="alert alert-success"><?= $this->session->flashdata('result_delete') ?></div>
        <hr>
        <?php
    }
    if (!isset($writable)) {
        ?>
        <a href="javascript:void(0);" data-toggle="modal" data-target="#addLanguage" class="btn btn-primary btn-xs pull-right" style="margin-bottom:10px;"><b>+</b> Adicionar novo idioma</a>
        <div class="clearfix"></div>
        <?php
    }
    if ($languages) {
        ?>
        <div class="table-responsive">
            <table class="table table-striped custab">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Imagem</th>
                        <th>Abre</th>
                        <th>Nome</th>
                        <th>Moeda</th>
                        <th class="text-center">Ação</th>
                    </tr>
                </thead>
                <?php foreach ($languages as $language) { ?>
                    <tr>
                        <td><?= $language->id ?></td>
                        <td><img src="<?= base_url('attachments/lang_flags/' . $language->flag) ?>" alt="No country flag" style="width:16px; height:11px;"></td>
                        <td><?= strtoupper($language->abbr) ?></td>
                        <td><?= ucfirst($language->name) ?></td>
                        <td><?= $language->currency ?></td>
                        <td class="text-center">
                            <?php if (MY_DEFAULT_LANGUAGE_ABBR != $language->abbr) { ?>
                                <a href="<?= base_url('admin/languages/?delete=' . $language->id) ?>" class="btn btn-danger btn-xs confirm-delete"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                            <?php } else { ?>
                                Seu padrão
                            <?php } ?>
                            <a href="<?= base_url('admin/languages/?editLang=' . $language->name) ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php } else { ?>
        <div class="clearfix"></div><hr>
        <div class="alert alert-info">Nenhum idioma encontrado!</div>
    <?php } ?>
    <div class="alert alert-warning">
        <b>Como adicionar idioma em 2 etapas fáceis</b>
        <ul>
            <li>Adicione idiomas aqui (defina abreviação, nome e imagem)</li>
            <li>Editar idioma adicionado e definir valores</li>
        </ul>
    </div>

    <?php
    if (isset($_GET['editLang'])) {
        ?>
        <form method="POST" id="saveLang">
            <input type="hidden" name="goDaddyGo" value="">
            <div class="alert alert-info"><span class="glyphicon glyphicon-alert"></span> Agora você edita o idioma: <b><?= ucfirst(htmlspecialchars($_GET['editLang'])) ?></b></div>
            <?php
            $o = 1;
            $countValuesForEdit = 0;
            foreach ($arrPhpFiles as $phpFile => $langFinal) {
                if (!empty($langFinal)) {
                    foreach ($langFinal as $key => $val) {
                        ?>
                        <div class="divLangs">
                            <span><b><?= $o ?>.</b> <?= $val ?></span>
                            <input type="hidden" name="php_files[]" value="<?= $phpFile ?>">
                            <input type="hidden" name="php_keys[]" value="<?= $key ?>">
                            <input type="text" value="<?= $val ?>" class="form-control" name="php_values[]">
                        </div>
                        <?php
                        $o++;
                        $countValuesForEdit++;
                    }
                }
            }

            foreach ($arrJsFiles as $jsFile => $langFinal) {
                $i = 0;
                foreach ($langFinal[1] as $aaIam) {
                    ?>
                    <div class="divLangs">
                        <span><b><?= $o ?>.</b> <?= $langFinal[2][$i] ?></span>
                        <input type="hidden" name="js_files[]" value="<?= $jsFile ?>">
                        <input type="hidden" name="js_keys[]" value="<?= trim(str_replace(':', '', $aaIam)) ?>">
                        <input type="text" class="form-control" value="<?= $langFinal[2][$i] ?>" name="js_values[]">
                    </div>
                    <?php
                    $i++;
                    $o++;
                    $countValuesForEdit++;
                }
            }
            if ($countValuesForEdit * 6 > $max_input_vars) {
                ?>
                <div class="alert alert-danger">
                    Você não pode editar este idioma porque o
                    servidor tem restrição para <b>max_input_vars</b>, deve ser mais que
                    <b><?= $countValuesForEdit * 6 ?></b> e agora é <b><?= $max_input_vars ?></b>.<br>
                    Entre em contato com o administrador do sistema.
                </div>
            <?php } else { ?>
                <a href="javascript:void(0);" data-form-id="saveLang" style="margin-left: 10px;" class="btn btn-lg btn-info confirm-save">Salve-me</a>
            <?php } ?>
            <a href="<?= base_url('admin/languages') ?>" class="btn btn-lg btn-default">Cancelar</a>
        </form>
        <?php
    }
    ?>

    <!-- add edit languages -->
    <div class="modal fade" id="addLanguage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Adicionar idioma</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="abbr">Abreviação</label>
                            <input type="text" name="abbr" class="form-control" id="abbr">
                        </div>
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="currency">Moeda</label>
                            <input type="text" name="currency" class="form-control" id="currency">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Chave da moeda:</label>
                            <select class="selectpicker form-control" data-live-search="true" name="currencyKey">
                                <?php
                                $curr = currencies();
                                foreach ($curr as $key => $val) {
                                    ?>
                                    <option value="<?= $key ?>"><?= $key ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="file" name="userfile"">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>