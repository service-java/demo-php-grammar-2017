<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{
  public function index()
  {
    $this->load->model('Studentmodel'); // 加载model

    $records = $this->Studentmodel->get_last_two_entries();
    $data['records'] = $records; // 封装返回记录集结果

    $this->Studentmodel->insert_sam();
    $this->Studentmodel->update_sam();

    $all = $this->Studentmodel->get_all();
    $data['all'] = $all; // 没有return 但是照样传过去了

    $this->load->view('showstudent', $data); // 传递数据给view
  }
}
