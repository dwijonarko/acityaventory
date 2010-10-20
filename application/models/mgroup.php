<?php
class MGroup extends CI_Model
{
    function __construct ()
    {
        parent::CI_Model();
        
    }
    
    function form(){

    $data['group_name'] = array('name'=>'group_name','size'=>'30', 'maxlength'=>'30', 'id'=>'group_name');
	$data['desc']       = array('name'=>'desc','cols'=>'25', 'rows'=>'5','id'=>'desc','value'=>'');
	return $data;
  }
  
    
    function getAll(){
        $this->db->select('*');
        $this->db->from('groups');
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
    
        return $query->result();
    }
    
    function save(){
        $name = $this->input->post('group_name');
        $desc = $this->input->post('desc');
        $data = array(
          'name'=>$name,
          'desc'=>$desc
        );
        $this->db->insert('groups',$data);
    }
  
    function update(){
        $id   = $this->input->post('id');
        $name = $this->input->post('group_name');
        $desc = $this->input->post('desc');
        $data = array(
          'name'=>$name,
          'desc'=>$desc
        );
    $this->db->where('id',$id);
    $this->db->update('groups',$data);    
    }
    
    function getList(){
        $result = array();
        $this->db->select('*');
        $this->db->from('groups');
        $this->db->order_by('name','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Select Groups-';
            $result[$row->id]= $row->name;
        }
        
        return $result;
    }
}
