<?php
class Item extends CI_Controller{

    function __construct(){
        parent::CI_Controller();
        $this->load->Model('MItem');
    }
    
    public function index(){
        $this->input();
    }
    
    public function input()
    {
        $this->load->Model('MBrand');
        $this->load->Model('MGroup');
        $this->load->Model('MMeasure');
        $data                = $this->MItem->form();
        $data['title']       = "Items";
        $data['subheader']   = "Setup Items";
        $data['brand_list']  = $this->MBrand->getList(); // get brand list from table brands
        $data['group_list']  = $this->MGroup->getList(); // get group list from table groups
        $data['measure_list']= $this->MMeasure->getList(); // get group list from table measures
        $data['query']       = $this->MItem->getAll(); //get data from database
        $data['main']        = 'item/input';
        $this->load->view('template',$data);
               
    }
    
    function submit()
    {
        
        if ($this->input->post('ajax')){ // submited data with ajax
            $this->form_validation->set_rules('item_name', 'Item Name', 'required');
            $this->form_validation->set_rules('code', 'Item Code', 'required');
            $this->form_validation->set_rules('sell_price', 'Item Sell Price', 'required|numeric');
            $this->form_validation->set_rules('brand_id', 'Brand', 'is_natural_no_zero');
            $this->form_validation->set_rules('group_id', 'Group', 'is_natural_no_zero');
            $this->form_validation->set_rules('measure_id', 'Measure', 'is_natural_no_zero');
            $this->form_validation->set_rules('min_stock', 'Minimal Stock', 'required|numeric');
            $this->form_validation->set_rules('desc', 'Supplier Description', 'required');
            
            $this->form_validation->set_message('is_natural_no_zero','Please select %s');
            
            if ($this->form_validation->run() == FALSE){ // if validation error
                $validation = validation_errors();
                $message = preg_replace("/(\r|\n)/","",$validation); //clear break
                echo "
                    <script type=\"text/javascript\" language=\"javascript\" charset=\"utf-8\">
                        addNotice(\"<p>Error</p>$message\");
                    </script>
                ";
                
                
            }else{ // validation true
                if ($this->input->post('id')>0){ //if have id then update                    
                    $this->MItem->update();
                    $data['title']      = 'Items';
                    $data['query'] = $this->MItem->getAll();
                    $this->load->view('item/show',$data);
                }else{ //don't have id then save / add data
                    $this->MItem->save();
                    $data['title']      = 'Items';
                    $data['query'] = $this->MItem->getAll();
                    $this->load->view('item/show',$data);
                }
                
            }
        }else{ //submited without ajax (if javascript disabled)
            
            if ($this->input->post('submit')){
                $this->form_validation->set_rules('item_name', 'Item Name', 'required');
                $this->form_validation->set_rules('code', 'Item Code', 'required');
                $this->form_validation->set_rules('sell_price', 'Item Sell Price', 'required|numeric');
                $this->form_validation->set_rules('brand_id', 'Brand', 'is_natural_no_zero');
                $this->form_validation->set_rules('group_id', 'Group', 'is_natural_no_zero');
                $this->form_validation->set_rules('measure_id', 'Measure', 'is_natural_no_zero');
                $this->form_validation->set_rules('min_stock', 'Minimal Stock', 'required|numeric');
                $this->form_validation->set_rules('desc', 'Supplier Description', 'required');
                
                $this->form_validation->set_message('is_natural_no_zero','Please select %s');
                if ($this->form_validation->run() == FALSE){
                    $data               = $this->MItem->form();                   
                    
                    $data['title']          = 'Items';
                    $data['subheader']      = 'Setup Items';
                    $data['message']        = validation_errors();
                    $data['item_name']['value']  = set_value('item_name');
                    $data['code']['value']       = set_value('code');
                    $data['sell_price']['value'] = set_value('sell_price');
                    $data['brand']['value']      = set_value('brand_id');
                    $data['group']['value']      = set_value('group_id');
                    $data['measure']['value']    = set_value('measure_id');
                    $data['status_id']['value']  = set_value('status_id');
                    $data['min_stock']['value']  = set_value('min_stock');
                    $data['desc']['value']  = set_value('desc');
                    $data['query'] = $this->MItem->getAll(); //get data from database
                    $data['main']  =  'item/input';
                    $this->load->view('template',$data);
                }else{
                    if ($this->input->post('id')>0){
                        $this->MItem->update();
                        redirect('item');
                    }else{
                        $this->MItem->save();
                        redirect('item');
                    }
                }
            }
        }
    }
    
    function delete(){
        $id = $this->input->post('id');
        $this->db->delete('suppliers',array('id'=>$id));
    }
    
    function edit(){
        $this->load->Model('MBrand');
        $this->load->Model('MGroup');
        $this->load->Model('MMeasure');
        $data                = $this->MItem->form();
        $data['brand_list']  = $this->MBrand->getList(); // get brand list from table brands
        $data['group_list']  = $this->MGroup->getList(); // get group list from table groups
        $data['measure_list']= $this->MMeasure->getList(); // get group list from table measures
        $query = $this->MItem->getItem();
		$data['id']['value'] 		 = $query['id'];
		$data['item_name']['value'] = $query['name'];
		$data['code']['value']      = $query['code'];
		$data['sell_price']['value']= $query['sell_price'];
		$data['brand']['value']     = $query['brand_id'];
		$data['group']['value']     = $query['group_id'];
		$data['measure']['value']   = $query['measure_id'];
		$data['min_stock']['value'] = $query['min_stock'];
		$data['desc']['value']= $query['desc'];
		$data['status_id']['value']     = $query['status'];
        $this->load->view('item/edit',$data);
    }
    
    function lookup_item()
    {
       // process posted form data (the requested product)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->MItem->seek($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach( $query as $row )
            {
                $data['message'][] = array( 
                                        'id'=>$row->id,
                                        'label' => $row->code."|".$row->name,
                                        'value'=>$row->code,
                                        'sell_price'=>$row->sell_price,
                                        'name'=>$row->name,
                                        'brand_name'=>$row->brand_name,
                                        ''
                                     );  //Add a row to array
            }
        }
        if('IS_AJAX')
        {
            echo json_encode($data); //echo json string if ajax request
            
        }
        else
        {
            $this->load->view('autocomplete/index',$data); //Load html view of search results
        }
    }

}
