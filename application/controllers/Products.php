<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library(['upload', 'image_lib']);
        $this->load->helper(['form', 'url']);
    }

    public function index() {
        $data['products'] = $this->Product_model->get_all_products();
        $this->load->view('products/index', $data);
    }

    public function create() {
        $data['categories'] = $this->Product_model->get_categories();
        $this->load->view('products/create', $data);
    }

    public function store() {
        $image_name = $this->_upload_and_resize();

        $data = [
            'name'        => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'price'       => $this->input->post('price'),
            'category_id' => $this->input->post('category_id'),
            'image'       => $image_name
        ];

        $this->Product_model->insert_product($data);
        redirect('products');
    }

    public function edit($id) {
        $data['categories'] = $this->Product_model->get_categories();
        $data['product'] = $this->Product_model->get_product($id);
        $this->load->view('products/edit', $data);
    }

    public function update($id) {
        $image_name = $this->_upload_and_resize();

        $data = [
            'name'        => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'price'       => $this->input->post('price'),
            'category_id' => $this->input->post('category_id')
        ];

        if ($image_name) {
            $data['image'] = $image_name;
        }

        $this->Product_model->update_product($id, $data);
        redirect('products');
    }

    public function delete($id) {
        $this->Product_model->delete_product($id);
        redirect('products');
    }

    private function _upload_and_resize() {
        if ($_FILES['image']['name'] == '') return '';

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image')) {
            echo $this->upload->display_errors();
            exit;
        }

        $upload_data = $this->upload->data();

        // Resize
        $resize_config['image_library'] = 'gd2';
        $resize_config['source_image'] = $upload_data['full_path'];
        $resize_config['maintain_ratio'] = TRUE;
        $resize_config['width'] = 500;
        $resize_config['height'] = 500;

        $this->image_lib->initialize($resize_config);
        $this->image_lib->resize();

        return $upload_data['file_name'];
    }
}
