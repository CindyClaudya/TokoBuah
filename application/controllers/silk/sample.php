<?php
defined('BASEPATH') OR exit ('no direct cript access allowed');
class sample extends or CI_Controller
{
    public function _construct()
    {
        parrent::_construct();
    }
    public function index()
{
    $this->load->view("sample/sample_view");
}
}