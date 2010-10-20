<?php
class MSupplier extends CI_Model
{
    function __construct ()
    {
        parent::CI_Model();
        
    }
    
    function form(){

    $data['supplier_name'] = array('name'=>'supplier_name','size'=>'30', 'maxlength'=>'30', 'id'=>'supplier_name');
    $data['code']       = array('name'=>'code','size'=>'30', 'maxlength'=>'30', 'id'=>'code');
    $data['address']    = array('name'=>'address','size'=>'30', 'maxlength'=>'30', 'id'=>'address');
    $data['phone']      = array('name'=>'phone','size'=>'30', 'maxlength'=>'30', 'id'=>'phone');
	$data['desc']       = array('name'=>'desc','cols'=>'25', 'rows'=>'5','id'=>'desc','value'=>'');
	return $data;
  }
  
    
    function getAll(){
        $this->db->select('*');
        $this->db->from('suppliers');
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
    
        return $query->result();
    }
    
    function save(){
        $name = $this->input->post('supplier_name');
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
        $this->db->insert('suppliers',$data);
    }
  
    function update(){
        $id   = $this->input->post('id');
        $name = $this->input->post('supplier_name');
        $code = $this->input->post('code');
        $address= $this->input->post('address');
        $phone= $this->input->post('phone');
        $desc = $this->input->post('desc');
        $data = array(
          'name'=>$name,
          'desc'=>$desc
        );
    $this->db->where('id',$id);
    $this->db->update('suppliers',$data);    
    }
    
    
    function seek( $keyword )
    {
        
        $this->db->select('*')->from('suppliers');
        $this->db->like('name',$keyword,'after');
        $query = $this->db->get();    
        
        return $query->result();
    }
}
