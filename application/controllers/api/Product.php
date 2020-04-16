<?php
require APPPATH . 'libraries/REST_Controller.php';
class Product extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function index_get($id = 0)
    {
        if(!empty($id)){
        $data = $this->db->get_where("products", ['product_id'=> $id])->result();
        }else{
            $data = $this->db->get("products")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('products',$input);
        $this->response(['Product cerate successfull'], REST_Controller::HTTP_OK);

    }
        public function index_put($id)
        { 
            $input = $this->input->put();
            $this->db->put('products', $input,array('product_id'=>$id));
            $this->response(['Product put successfull'], REST_Controller::HTTP_OK);
        }
    
    public function index_delete($id)
        { 
            $this->db->delete('products', $input,array('product_id'=>$id));
            $this->response(['Product delete successfull'], REST_Controller::HTTP_OK);
        }

}