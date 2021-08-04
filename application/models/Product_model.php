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

    ///What happens if the vars are empty?
    function insert($product_name, $product_price)
    {
        $data = [
            'product_name' => $product_name,
            'product_price' => $product_price
        ];

        return $this->db->insert($this->table, $data);
    }

    //This is dangerous - let me know why you think that is?
    function update($product_id, $product_name, $product_price)
    {
        $data = [
            'product_name' => $product_name,
            'product_price' => $product_price
        ];
        $this->db->where($this->product_id, $product_id);

        return $this->db->update($this->table, $data);
    }

    //What happens if $product_id = NULL
    function delete($product_id)
    {
        $this->db->where($this->product_id, $product_id);

        return $this->db->delete($this->table);
    }
}
