<?php

/*
 * @Author:    Pedro Santos
 *  Gitgub:    https://github.com/PedroSantosWEBDEV
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Settings extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Languages_model', 'Settings_model']);
    }

    public function index()
    {
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administração - Configurações';
        $head['description'] = '';
        $head['keywords'] = '';

        $this->postChecker();

        $value_stores = $this->getValueStores();
        if(!is_null($value_stores)) {
            // Map to data
            foreach($value_stores as $value_s) {
                if (!array_key_exists($value_s['thekey'], $data)) {
                    $data[$value_s['thekey']] = $value_s['value'];
                }
            }
            unset($value_stores);
        }
        
        $data['cookieLawInfo'] = $this->getCookieLaw();
        $data['languages'] = $this->Languages_model->getLanguages();
        $data['law_themes'] = array_diff(scandir('.' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'imgs' . DIRECTORY_SEPARATOR . 'cookie-law-themes' . DIRECTORY_SEPARATOR), array('..', '.'));
        $data['cookieLawInfo'] = $this->getCookieLaw();
        $this->load->view('_parts/header', $head);
        $this->load->view('settings/settings', $data);
        $this->load->view('_parts/footer');
        $this->saveHistory('Ir para a página de configurações');
    }

    private function getValueStores()
    {
        $values = $this->Settings_model->getValueStores();
        if(is_array($values) && count($values) > 0) {
            return $values;
        }
        return null;
    }

    private function postChecker()
    {
        if (isset($_POST['uploadimage'])) {
            $config['upload_path'] = '.' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'site_logo' . DIRECTORY_SEPARATOR;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1500;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('sitelogo')) {
                $this->session->set_flashdata('resultSiteLogoPublish', $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
                $newImage = $data['upload_data']['file_name'];
                $this->Home_admin_model->setValueStore('sitelogo', $newImage);
                $this->saveHistory('Change site logo');
                $this->session->set_flashdata('resultSiteLogoPublish', 'Novo logotipo definido!');
            }
            redirect('admin/settings');
        }
        if (isset($_POST['naviText'])) {
            $this->Home_admin_model->setValueStore('navitext', $_POST['naviText']);
            $this->session->set_flashdata('resultNaviText', 'Novo texto de navegação definido!');
            $this->saveHistory('Change navigation text');
            redirect('admin/settings');
        }
        if (isset($_POST['footerCopyright'])) {
            $this->Home_admin_model->setValueStore('footercopyright', $_POST['footerCopyright']);
            $this->session->set_flashdata('resultFooterCopyright', 'Novo texto de navegação definido!');
            $this->saveHistory('Change footer copyright');
            redirect('admin/settings');
        }
        if (isset($_POST['contactsPage'])) {
            $this->Home_admin_model->setValueStore('contactspage', $_POST['contactsPage']);
            $this->session->set_flashdata('resultContactspage', 'A página de contatos está atualizada!');
            $this->saveHistory('Change contacts page');
            redirect('admin/settings');
        }
        if (isset($_POST['footerContacts'])) {
            $this->Home_admin_model->setValueStore('footerContactAddr', $_POST['footerContactAddr']);
            $this->Home_admin_model->setValueStore('footerContactPhone', $_POST['footerContactPhone']);
            $this->Home_admin_model->setValueStore('footerContactEmail', $_POST['footerContactEmail']);
            $this->session->set_flashdata('resultfooterContacts', 'Contatos no rodapé atualizados!');
            $this->saveHistory('Alterar contatos do rodapé');
            redirect('admin/settings');
        }
        if (isset($_POST['footerSocial'])) {
            $this->Home_admin_model->setValueStore('footerSocialFacebook', $_POST['footerSocialFacebook']);
            $this->Home_admin_model->setValueStore('footerSocialTwitter', $_POST['footerSocialTwitter']);
            $this->Home_admin_model->setValueStore('footerSocialGooglePlus', $_POST['footerSocialGooglePlus']);
            $this->Home_admin_model->setValueStore('footerSocialPinterest', $_POST['footerSocialPinterest']);
            $this->Home_admin_model->setValueStore('footerSocialYoutube', $_POST['footerSocialYoutube']);
            $this->session->set_flashdata('resultfooterSocial', 'As redes sociais no rodapé estão atualizadas!');
            $this->saveHistory('Alterar contatos do rodapé');
            redirect('admin/settings');
        }
        if (isset($_POST['googleMaps'])) {
            $this->Home_admin_model->setValueStore('googleMaps', $_POST['googleMaps']);
            $this->Home_admin_model->setValueStore('googleApi', $_POST['googleApi']);
            $this->session->set_flashdata('resultGoogleMaps', 'As coordenadas do Google Maps e a chave da API foram atualizadas!');
            $this->saveHistory('Atualizada as coordenadas do Google Maps e chave de API');
            redirect('admin/settings');
        }
        if (isset($_POST['footerAboutUs'])) {
            $this->Home_admin_model->setValueStore('footerAboutUs', $_POST['footerAboutUs']);
            $this->session->set_flashdata('resultFooterAboutUs', 'O texto do rodapé "sobre nós" foi alterado!');
            $this->saveHistory('Alterado o rodapé "sobre nós"');
            redirect('admin/settings');
        }
        if (isset($_POST['contactsEmailTo'])) {
            $this->Home_admin_model->setValueStore('contactsEmailTo', $_POST['contactsEmailTo']);
            $this->session->set_flashdata('resultEmailTo', 'E-mail alterado!');
            $this->saveHistory('Alterado para onde vão os e-mails do formulário de contato');
            redirect('admin/settings');
        }
        if (isset($_POST['shippingOrder'])) {
            $this->Home_admin_model->setValueStore('shippingOrder', $_POST['shippingOrder']);
            $this->session->set_flashdata('shippingOrder', 'Mudança de preço do pedido de envio!');
            $this->saveHistory('Alterado frete grátis para pedidos acima de ' . $_POST['shippingOrder']);
            redirect('admin/settings');
        }
        if (isset($_POST['shippingAmount'])) {
            $this->Home_admin_model->setValueStore('shippingAmount', $_POST['shippingAmount']);
            $this->session->set_flashdata('shippingAmount', 'Preço do valor do frete alterado!');
            $this->saveHistory('Alterado o valor do frete para pedidos ' . $_POST['shippingAmount']);
            redirect('admin/settings');
        }
        if (isset($_POST['addJs'])) {
            $this->Home_admin_model->setValueStore('addJs', $_POST['addJs']);
            $this->session->set_flashdata('addJs', 'O código JavaScript foi adicionado');
            $this->saveHistory('Adicionado JS ao site');
            redirect('admin/settings');
        }
        if (isset($_POST['publicQuantity'])) {
            $this->Home_admin_model->setValueStore('publicQuantity', $_POST['publicQuantity']);
            $this->session->set_flashdata('publicQuantity', 'Visibilidade da quantidade de dados públicos alterado');
            $this->saveHistory('Alterado a visibilidade da quantidade de dados públicos');
            redirect('admin/settings');
        }
        if (isset($_POST['publicDateAdded'])) {
            $this->Home_admin_model->setValueStore('publicDateAdded', $_POST['publicDateAdded']);
            $this->session->set_flashdata('publicDateAdded', 'Visibilidade dos dados públicos alterado');
            $this->saveHistory('Alterado a visibilidade dos dados públicos');
            redirect('admin/settings');
        }
        if (isset($_POST['outOfStock'])) {
            $this->Home_admin_model->setValueStore('outOfStock', $_POST['outOfStock']);
            $this->session->set_flashdata('outOfStock', 'Visibilidade das configurações de falta de estoque (changeOut) alterado a visibilidade das configurações de estoque');
            $this->saveHistory('Alterar a visibilidade da página final de checkout');
            redirect('admin/settings');
        }
        if (isset($_POST['moreInfoBtn'])) {
            $this->Home_admin_model->setValueStore('moreInfoBtn', $_POST['moreInfoBtn']);
            $this->session->set_flashdata('moreInfoBtn', 'A visibilidade do botão Mais informações foi alterada');
            $this->saveHistory('Alterar a visibilidade do botão Mais informações na lista de produtos');
            redirect('admin/settings');
        }
        if (isset($_POST['showBrands'])) {
            $this->Home_admin_model->setValueStore('showBrands', $_POST['showBrands']);
            $this->session->set_flashdata('showBrands', 'Visibilidade das marcas alterada');
            $this->saveHistory('Visibilidade das marcas alterado');
            redirect('admin/settings');
        }
        if (isset($_POST['virtualProducts'])) {
            $this->Home_admin_model->setValueStore('virtualProducts', $_POST['virtualProducts']);
            $this->session->set_flashdata('virtualProducts', 'Visibilidade de produtos virtuais alterada');
            $this->saveHistory('Visibilidade de produtos virtuais alterado');
            redirect('admin/settings');
        }
        if (isset($_POST['showInSlider'])) {
            $this->Home_admin_model->setValueStore('showInSlider', $_POST['showInSlider']);
            $this->session->set_flashdata('showInSlider', 'A visibilidade dos produtos Slider foi alterada');
            $this->saveHistory('A visibilidade dos produtos Slider foi alterado');
            redirect('admin/settings');
        }
        if (isset($_POST['multiVendor'])) {
            $this->Home_admin_model->setValueStore('multiVendor', $_POST['multiVendor']);
            $this->session->set_flashdata('multiVendor', 'Suporte a vários fornecedores alterado');
            $this->saveHistory('Suporte a vários fornecedores alterado');
            redirect('admin/settings');
        }
        if (isset($_POST['setCookieLaw'])) {
            unset($_POST['setCookieLaw']);
            $this->setCookieLaw($_POST);
            $this->saveHistory('Informações sobre a lei de cookies alteradas');
            redirect('admin/settings');
        }
        if (isset($_POST['hideBuyButtonsOfOutOfStock'])) {
            $this->Home_admin_model->setValueStore('hideBuyButtonsOfOutOfStock', $_POST['hideBuyButtonsOfOutOfStock']);
            $this->session->set_flashdata('hideBuyButtonsOfOutOfStock', 'A visibilidade dos botões de compra de produtos fora de estoque foi alterada');
            $this->saveHistory('A visibilidade dos botões de compra foi alterado para produtos fora de estoque');
            redirect('admin/settings');
        }
        if (isset($_POST['refreshAfterAddToCart'])) {
            $this->Home_admin_model->setValueStore('refreshAfterAddToCart', $_POST['refreshAfterAddToCart']);
            $this->session->set_flashdata('refreshAfterAddToCart', 'Salvou');
            $this->saveHistory('A opção de abrir o carrinho de compras depois de clicar no botão adicionar ao carrinho foi alterado');
            redirect('admin/settings');
        }
    }

    private function setCookieLaw($post)
    {
        $this->Home_admin_model->setCookieLaw($post);
    }

    private function getCookieLaw()
    {
        return $this->Home_admin_model->getCookieLaw();
    }

}
