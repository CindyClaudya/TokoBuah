<?php
require APPPATH . 'libraries/REST_Controller.php';
class Dokter extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function index_get($id = 0)
    {
        if(!empty($id)){
        $data = $this->db->get_where("Dokter", ['id_dokter'=> $id])->result();
        }else{
            $data = $this->db->get("Dokter")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('Dokter',$input);
        $this->response(['Dokter cerate successfull'], REST_Controller::HTTP_OK);

    }
        public function index_put($id)
        { 
            $input = $this->input->put();
            $this->db->put('Dokter', $input,array('id_dokter'=>$id));
            $this->response(['Dokter put successfull'], REST_Controller::HTTP_OK);
        }
    
    public function index_delete($id)
        { 
            $this->db->delete('Dokter', $input,array('id_dokter'=>$id));
            $this->response(['Dokter delete successfull'], REST_Controller::HTTP_OK);
        }

}