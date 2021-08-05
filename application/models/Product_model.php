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

    //Review my changes here
    function get_product_by_id($product_id = FALSE) //init product_id to FALSE
    {
        if(!$product_id) return false; //this will return if product_id = FALSE, 0, NULL

        $this->db->limit(1); //Set it so we only want one result
        $query = $this->db->get_where($this->table, [$this->product_id => $product_id]);

        //check to see we only have one result
        if($query->num_rows() == 1)
        {
            return $query->row(); //we only want the one row, and return the Object
        }
        return FALSE;
    }

    ///What happens if the vars are empty?
    function insert($product_name, $product_price)
    {
        if (empty($product_name) || empty($product_price))
        {
            return false;
        }

        $data = [
            'product_name' => $product_name,
            'product_price' => $product_price
        ];

        return $this->db->insert($this->table, $data);
    }

    //This is dangerous - let me know why you think that is?
    function update($product_id, $product_name, $product_price)
    {
        if (empty($product_id) || empty($product_name) || empty($product_price))
        {
            return false;
        }

        $data = [
            'product_name' => $product_name,
            'product_price' => $product_price
        ];
        $this->db->where($this->product_id, $product_id);

        return $this->db->update($this->table, $data);
    }

    //What happens if $product_id = NULL
    function delete($product_id = FALSE)
    {
        if(!$product_id) return false;

        $this->db->where($this->product_id, $product_id);

        return $this->db->delete($this->table);
    }
}
