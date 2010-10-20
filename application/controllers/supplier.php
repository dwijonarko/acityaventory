<?php
#doc
#    classname:    Supplier
#    scope:        PUBLIC
#
#/doc

class Supplier extends Controller
{
    
    function __construct ()
    {
       parent::Controller();
       $this->load->model('MSupplier');
       
    }
    
    public function index()
    {
        $this->input();
    }
    
    public function input()
    {
        $data               = $this->MSupplier->form();
        $data['title']      = 'Suppliers';
        $data['subheader']  = 'Setup Suppliers';
        
        $data['query'] = $this->MSupplier->getAll(); //get data from database
        $data['main']  =  'supplier/input';
        $this->load->view('template',$data);
    }
    
    function submit()
    {
                
        if ($this->input->post('ajax')){ // submited data with ajax
            $this->form_validation->set_rules('supplier_name', 'Supplier Name', 'required');
            $this->form_validation->set_rules('code', 'Supplier Code', 'required');
            $this->form_validation->set_rules('address', 'Supplier address', 'required');
            $this->form_validation->set_rules('phone', 'Supplier Phone', 'required|numeric');
            $this->form_validation->set_rules('desc', 'Supplier Description', 'required');
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
                    $this->MSupplier->update();
                    $data['title']      = 'Suppliers';
                    $data['query'] = $this->MSupplier->getAll();
                    $this->load->view('supplier/show',$data);
                }else{ //don't have id then save / add data
                    $this->MSupplier->save();
                    $data['title']      = 'Suppliers';
                    $data['query'] = $this->MSupplier->getAll();
                    $this->load->view('supplier/show',$data);
                }
                
            }
        }else{ //submited without ajax (if javascript disabled)
            if ($this->input->post('submit')){
                $this->form_validation->set_rules('supplier_name', 'Supplier Name', 'required');
                $this->form_validation->set_rules('code', 'Supplier Code', 'required');
                $this->form_validation->set_rules('address', 'Supplier address', 'required');
                $this->form_validation->set_rules('phone', 'Supplier Phone', 'required|numeric');
                $this->form_validation->set_rules('desc', 'Supplier Description', 'required');
                if ($this->form_validation->run() == FALSE){
                    $data               = $this->MSupplier->form();                   
                    
                    $data['title']          = 'Suppliers';
                    $data['subheader']      = 'Setup Suppliers';
                    $data['message']        = validation_errors();
                    $data['supplier_name']['value']  = set_value('supplier_name');
                    $data['desc']['value']  = set_value('desc');
                    $data['query'] = $this->MSupplier->getAll(); //get data from database
                    $data['main']  =  'supplier/input';
                    $this->load->view('template',$data);
                }else{
                    if ($this->input->post('id')>0){
                        $this->MSupplier->update();
                        redirect('supplier');
                    }else{
                        $this->MSupplier->save();
                        redirect('supplier');
                    }
                }
            }
        }
    }
    
    function delete(){
        $id = $this->input->post('id');
        $this->db->delete('suppliers',array('id'=>$id));
    }
    
    function lookup_supplier()
    {
       // process posted form data (the requested product)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->MSupplier->seek($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach( $query as $row )
            {
                $data['message'][] = array( 
                                        'id'=>$row->id,
                                        'label' => $row->code."|".$row->name,
                                        'value'=>$row->name,
                                        'address'=>$row->address,
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
