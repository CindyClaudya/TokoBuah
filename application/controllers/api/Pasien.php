<?php
require APPPATH . 'libraries/REST_Controller.php';
class Pasien extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function index_get($id = 0)
    {
        if(!empty($id)){
        $data = $this->db->get_where("pasien", ['no_rm'=> $id])->result();
        }else{
            $data = $this->db->get("pasien")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('pasien',$input);
        $this->response(['Pasien cerate successfull'], REST_Controller::HTTP_OK);

    }
        public function index_put($id)
        { 
            $input = $this->input->put();
            $this->db->put('pasien', $input,array('no_rm'=>$id));
            $this->response(['Pasien put successfull'], REST_Controller::HTTP_OK);
        }
    
    public function index_delete($id)
        { 
            $this->db->delete('pasien', $input,array('no_rm'=>$id));
            $this->response(['Pasien delete successfull'], REST_Controller::HTTP_OK);
        }

}