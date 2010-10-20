<?php
class MWarehouse extends CI_Model
{
    function __construct ()
    {
        parent::CI_Model();
        
    }
    
    function form(){

    $data['warehouse_name'] = array('name'=>'warehouse_name','size'=>'30', 'maxlength'=>'30', 'id'=>'warehouse_name');
    $data['code']       = array('name'=>'code','size'=>'30', 'maxlength'=>'30', 'id'=>'code');
    $data['address']    = array('name'=>'address','size'=>'30', 'maxlength'=>'30', 'id'=>'address');
    $data['phone']      = array('name'=>'phone','size'=>'30', 'maxlength'=>'30', 'id'=>'phone');
	$data['desc']       = array('name'=>'desc','cols'=>'25', 'rows'=>'5','id'=>'desc','value'=>'');
	return $data;
  }
  
    
    function getAll(){
        $this->db->select('*');
        $this->db->from('warehouses');
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
    
        return $query->result();
    }
    
    function save(){
        $name = $this->input->post('warehouse_name');
        $code = $this->input->post('code');
        $address= $this->input->post('address');
        $phone= $this->input->post('phone');
        $desc = $this->input->post('desc');
        $data = array(
          'name'=>$name,
          'code'=>$code,
          'address'=>$address,
          'phone'=>$phone,
          'desc'=>$desc
        );
        $this->db->insert('warehouses',$data);
    }
  
    function update(){
        $id   = $this->input->post('id');
        $name = $this->input->post('warehouse_name');
        $code = $this->input->post('code');
        $address= $this->input->post('address');
        $phone= $this->input->post('phone');
        $desc = $this->input->post('desc');
        $data = array(
          'name'=>$name,
          'desc'=>$desc
        );
    $this->db->where('id',$id);
    $this->db->update('warehouses',$data);    
    }
}
