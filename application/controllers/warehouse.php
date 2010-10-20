<?php
#doc
#    classname:    Warehouse
#    scope:        PUBLIC
#
#/doc

class Warehouse extends Controller
{
    
    function __construct ()
    {
       parent::Controller();
       $this->load->model('MWarehouse');
       
    }
    
    public function index()
    {
        $this->input();
    }
    
    public function input()
    {
        $data               = $this->MWarehouse->form();
        $data['title']      = 'Warehouses';
        $data['subheader']  = 'Setup Warehouses';
        
        $data['query'] = $this->MWarehouse->getAll(); //get data from database
        $data['main']  =  'warehouse/input';
        $this->load->view('template',$data);
    }
    
    function submit()
    {
                
        if ($this->input->post('ajax')){ // submited data with ajax
            $this->form_validation->set_rules('warehouse_name', 'Warehouse Name', 'required');
            $this->form_validation->set_rules('code', 'Warehouse Code', 'required');
            $this->form_validation->set_rules('address', 'Warehouse address', 'required');
            $this->form_validation->set_rules('phone', 'Warehouse Phone', 'required|numeric');
            $this->form_validation->set_rules('desc', 'Warehouse Description', 'required');
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
                    $this->MWarehouse->update();
                    $data['title']      = 'Warehouses';
                    $data['query'] = $this->MWarehouse->getAll();
                    $this->load->view('warehouse/show',$data);
                }else{ //don't have id then save / add data
                    $this->MWarehouse->save();
                    $data['title']      = 'Warehouses';
                    $data['query'] = $this->MWarehouse->getAll();
                    $this->load->view('warehouse/show',$data);
                }
                
            }
        }else{ //submited without ajax (if javascript disabled)
            if ($this->input->post('submit')){
                $this->form_validation->set_rules('warehouse_name', 'Warehouse Name', 'required');
                $this->form_validation->set_rules('code', 'Warehouse Code', 'required');
                $this->form_validation->set_rules('address', 'Warehouse address', 'required');
                $this->form_validation->set_rules('phone', 'Warehouse Phone', 'required|numeric');
                $this->form_validation->set_rules('desc', 'Warehouse Description', 'required');
                if ($this->form_validation->run() == FALSE){
                    $data               = $this->MWarehouse->form();                   
                    
                    $data['title']          = 'Warehouses';
                    $data['subheader']      = 'Setup Warehouses';
                    $data['message']        = validation_errors();
                    $data['warehouse_name']['value']  = set_value('warehouse_name');
                    $data['desc']['value']  = set_value('desc');
                    $data['query'] = $this->MWarehouse->getAll(); //get data from database
                    $data['main']  =  'warehouse/input';
                    $this->load->view('template',$data);
                }else{
                    if ($this->input->post('id')>0){
                        $this->MWarehouse->update();
                        redirect('warehouse');
                    }else{
                        $this->MWarehouse->save();
                        redirect('warehouse');
                    }
                }
            }
        }
    }
    
    function delete(){
        $id = $this->input->post('id');
        $this->db->delete('warehouses',array('id'=>$id));
    }
}
