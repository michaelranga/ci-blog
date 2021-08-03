<?php
class Product_model extends CI_Model
{
    private $table = 'product';
    private $product_id = 'product_id';

    function get_product()
    {
        $result = $this->db->get($this->table);

        return $result;
    }

    function get_product_by_id($product_id)
    {
        $query = $this->db->get_where($this->table, [$this->product_id => $product_id]);

        return $query;
    }

    function insert($product_name, $product_price)
    {
        $data = [
            'product_name' => $product_name,
            'product_price' => $product_price
        ];

        return $this->db->insert($this->table, $data);
    }

    function update($product_id, $product_name, $product_price)
    {
        $data = [
            'product_name' => $product_name,
            'product_price' => $product_price
        ];
        $this->db->where($this->product_id, $product_id);

        return $this->db->update($this->table, $data);
    }

    function delete($product_id)
    {
        $this->db->where($this->product_id, $product_id);

        return $this->db->delete($this->table);
    }
}
