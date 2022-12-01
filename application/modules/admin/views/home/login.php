<style>
    body {
        background-image:url('<?php echo base_url('assets/imgs/login-back.jpg') ?>');
        background-position: bottom  right;
        background-repeat: no-repeat;
        background-color:#548fd0;
    }
    .avatar {background-image:url('<?php echo base_url('assets/imgs/login-cover.png') ?>')}
</style>
<div class="container">
    <div class="login-container">
        <div id="output">       
            <?php
            if ($this->session->flashdata('err_login')) {
                ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('err_login') ?></div>
                <?php
            }
            ?></div>
        <div class="avatar"></div>
        <div class="form-box">
            <form action="" method="POST">
                <input type="text" name="username" placeholder="usuario">
                <input type="password" name="password" placeholder="senha">
                <button class="btn btn-info btn-block login" type="submit">Entrar</button>
            </form>
        </div>
    </div>
</div>