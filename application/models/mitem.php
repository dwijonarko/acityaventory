<?php
class MItem extends CI_Model{

    function __construct(){
        parent::CI_Model();
    }
    
    function form(){

    $data['item_name']  = array('name'=>'item_name','size'=>'30', 'maxlength'=>'30', 'id'=>'item_name');
    $data['code']  = array('name'=>'code','size'=>'30', 'maxlength'=>'30', 'id'=>'code');
	$data['sell_price'] = array('name'=>'sell_price','size'=>'30', 'maxlength'=>'30','id'=>'sell_price','value'=>'0');
	$data['status']     = array('0'=>'- Select Status -','1'=>'Active', '2'=>'Non Active');
	$data['min_stock']  = array('name'=>'min_stock','size'=>'30', 'maxlength'=>'30','id'=>'min_stock','value'=>'0');
	$data['desc']       = array('name'=>'desc','cols'=>'25', 'rows'=>'5','id'=>'desc','value'=>'');
	return $data;
  }
  
    
    function getAll(){
        $this->db->select('items.id,items.code,items.name,items.sell_price,items.status,items.min_stock,items.desc,brands.name AS brand_name,groups.name AS group_name,measures.name AS measure_name');
        $this->db->join('brands','brands.id=items.brand_id');
        $this->db->join('groups','groups.id=items.group_id');
        $this->db->join('measures','measures.id=items.measure_id');
        $this->db->from('items');
        $this->db->order_by('items.id','ASC');
        $query = $this->db->get();
    
        return $query->result();
    }
    
    function getItem(){
        $id = $this->input->post('id');
        $query = $this->db->getwhere('items',array('id'=>$id));
        return $query->row_array();		  
    }
    
    function save(){
        $name           = $this->input->post('item_name');
        $code           = $this->input->post('code');
        $sell_price    = $this->input->post('sell_price');
        $brand_id      = $this->input->post('brand_id');
        $group_id      = $this->input->post('group_id');
        $measure_id    = $this->input->post('measure_id');
        $min_stock     = $this->input->post('min_stock');
        $status         = $this->input->post('status_id');
        $desc           = $this->input->post('desc');
        $data = array(
          'name'=>$name,
          'code'=>$code,
          'sell_price'=>$sell_price,
          'brand_id'=>$brand_id,
          'group_id'=>$group_id,
          'measure_id'=>$measure_id,
          'min_stock'=>$min_stock,
          'status'=>$status,
          'desc'=>$desc
        );
        $this->db->insert('items',$data);
    }
  
    function update(){
        $id   = $this->input->post('id');
        $name           = $this->input->post('item_name');
        $code           = $this->input->post('code');
        $sell_price    = $this->input->post('sell_price');
        $brand_id      = $this->input->post('brand_id');
        $group_id      = $this->input->post('group_id');
        $measure_id    = $this->input->post('measure_id');
        $min_stock     = $this->input->post('min_stock');
        $status         = $this->input->post('status_id');
        $desc           = $this->input->post('desc');
        $data = array(
          'name'=>$name,
          'code'=>$code,
          'sell_price'=>$sell_price,
          'brand_id'=>$brand_id,
          'group_id'=>$group_id,
          'measure_id'=>$measure_id,
          'min_stock'=>$min_stock,
          'status'=>$status,
          'desc'=>$desc
        );
    $this->db->where('id',$id);
    $this->db->update('items',$data);    
    }
    
    
    function seek( $keyword )
    {
        
        $this->db->select('items.id, items.name, items.code, items.sell_price,brands.name AS brand_name')->from('items');
        $this->db->join('brands','brands.id=items.brand_id');
        $this->db->like('code',$keyword,'after');
        $query = $this->db->get();    
        
        return $query->result();
    }
    
}
