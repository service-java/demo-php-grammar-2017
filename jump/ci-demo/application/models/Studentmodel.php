<?php
class Studentmodel extends CI_Model
{
  // 貌似失败了
  function __construc()
  {
    parent::__construc();
    $this->load->database(); // 加载数据库配置信息
  }

  function get_last_two_entries()
  {
    $this->load->database();  // 不要忘记这一句
    $query = $this->db->get('students', 2); // 取students最新10条数据
    return $query->result();
  }

  function get_all()
  {
    $this->load->database();
    $result = $this->db->query('select * from students');
    if($result->num_rows() > 0) {
      foreach($result->result() as $row) {
        echo $row->name, " : " , $row->gender, "<br>";
      }
      // return $result;
    }

  }

  function insert_sam()
  {
    $this->load->database();
    $data = array(
      'name' => 'sam',
      'gender' => 'M',
      'grade' => '2'
    );

    $this->db->insert('students', $data);
  }

  function update_sam()
  {
    $this->load->database();
    $data = array(
      'gender' => 'F',
      'grade' => '99'
    );

    $where = " name = 'sam' ";
    $str = $this->db->update_string('students', $data, $where); // 只是生成sql
    // echo $str;
    $this->db->query($str);
  }
}
