<?php
class Product_model extends CI_Model {

    public function get_all_products() {
        $this->db->select('products.*, categories.name AS category');
        $this->db->from('products');
        $this->db->join('categories', 'categories.id = products.category_id');
        return $this->db->get()->result();
    }

    public function get_categories() {
        return $this->db->get('categories')->result();
    }

    public function insert_product($data) {
        return $this->db->insert('products', $data);
    }

    public function get_product($id) {
        return $this->db->get_where('products', ['id' => $id])->row();
    }

    public function update_product($id, $data) {
        return $this->db->where('id', $id)->update('products', $data);
    }

    public function delete_product($id) {
        return $this->db->delete('products', ['id' => $id]);
    }
}
