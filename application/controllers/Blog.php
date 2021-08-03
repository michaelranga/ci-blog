<?php
class Blog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['title']   = "CI Warm Up";
        $data['content'] = "This Is The Contents of Blog";
        
        return $this->load->view('blog_view', $data);
    }
}
