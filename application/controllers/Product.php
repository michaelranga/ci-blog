<?php
class Product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('product_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    function index()
    {
        $this->load->view('product/index', ['product' => $this->product_model->get_product()]);
    }

    function add()
    {
        return $this->load->view('product/add');
    }

    function edit()
    {
        $product_id = $this->uri->segment(3);
        if (empty($product_id)) {
            $this->session->set_flashdata('message', 'Some data is missing');
            return redirect('product');
        }

        $result = $this->product_model->get_product_by_id($product_id);

        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = [
                'product_id'    => $i['product_id'],
                'product_name'  => $i['product_name'],
                'product_price' => $i['product_price']
            ];
            return $this->load->view('product/edit', $data);
        }

        $this->session->set_flashdata('message', 'Data not found');
        return redirect('product');
    }

    function save()
    {
        //Validate before you use - eg: adding trim to your validation will make the below data dirty
        $this->validateInput();
        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('message', validation_errors());
            return redirect('product/add');
        }

        $product_name = $this->input->post('product_name');
        $product_price = $this->input->post('product_price');

        $res = $this->product_model->insert($product_name, $product_price);
        if(!$res)
        {
            $this->session->set_flashdata('message', 'Failed to create new product');
        } 
        return redirect('product');
    }

    function update()
    {
        $product_id = $this->input->post('product_id');
        if (empty($product_id)) {
            $this->session->set_flashdata('message', 'Some data is missing');
            return redirect('product');
        }

        //Validate before you use - eg: adding trim to your validation will make the below data dirty
        $this->validateInput();
        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('message', validation_errors());
            return redirect('product/edit/' . $product_id);
        }

        $product_name = $this->input->post('product_name');
        $product_price = $this->input->post('product_price');

        $res = $this->product_model->update($product_id, $product_name, $product_price);
        if(!$res)
        {
            $this->session->set_flashdata('message', 'Failed to update');
        } 
        return redirect('product');
    }

    function delete()
    {
        $product_id = $this->uri->segment(3);
        if (empty($product_id)) {
            $this->session->set_flashdata('message', 'Data not found');
            return redirect('product');
        }
        
        $res = $this->product_model->delete($product_id);
        if(!$res)
        {
            $this->session->set_flashdata('message', 'Failed to delete');
        } 

        return redirect('product');
    }

    function validateInput()
    {
        //Consider the below
        //$this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|min_length[2]|max_length[30]');

        $this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|min_length[2]|max_length[30]');
        $this->form_validation->set_rules('product_price', 'Price', 'trim|required|min_length[1]');
    }
}
