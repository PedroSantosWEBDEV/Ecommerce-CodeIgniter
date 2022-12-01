<?php

/*
 * @Author:    Pedro Santos
 *  Gitgub:    https://github.com/PedroSantosWEBDEV
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Pages extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pages_model');
    }

    public function index()
    {
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administração - Gerenciamento de Páginas';
        $head['description'] = '!';
        $head['keywords'] = '';
        $data['pages'] = $this->Pages_model->getPages(null, true);
        if (isset($_POST['pname'])) {
            $this->Pages_model->setPage($_POST['pname']);
            $this->saveHistory('Adicionar nova página com nome - ' . $_POST['pname']);
            redirect('admin/pages');
        }
        if (isset($_GET['delete'])) {
            $this->Pages_model->deletePage($_GET['delete']);
            $this->saveHistory('Excluir página');
            redirect('admin/pages');
        }
        $this->load->view('_parts/header', $head);
        $this->load->view('settings/pages', $data);
        $this->load->view('_parts/footer');
        $this->saveHistory('Ir para Gerenciar páginas');
    }

}
