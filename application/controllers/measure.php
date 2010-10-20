<?php
#doc
#    classname:    Measure
#    scope:        PUBLIC
#
#/doc

class Measure extends Controller
{
    
    function __construct ()
    {
       parent::Controller();
       $this->load->model('MMeasure');
       
    }
    
    public function index()
    {
        $this->input();
    }
    
    public function input()
    {
        $data               = $this->MMeasure->form();
        $data['title']      = 'Measure';
        $data['subheader']  = 'Setup Measure';
        
        $data['query'] = $this->MMeasure->getAll(); //get data from database
        $data['main']  =  'measure/input';
        $this->load->view('template',$data);
    }
    
    function submit()
    {
                
        if ($this->input->post('ajax')){ // submited data with ajax
            $this->form_validation->set_rules('measure_name', 'Measure Name', 'required');
            $this->form_validation->set_rules('desc', 'Description', 'required');
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
                    $this->MMeasure->update();
                    $data['title']      = 'Measure';
                    $data['query'] = $this->MMeasure->getAll();
                    $this->load->view('measure/show',$data);
                }else{ //don't have id then save / add data
                    $this->MMeasure->save();
                    $data['title']      = 'Measure';
                    $data['query'] = $this->MMeasure->getAll();
                    $this->load->view('measure/show',$data);
                }
                
            }
        }else{ //submited without ajax (if javascript disabled)
            if ($this->input->post('submit')){
                $this->form_validation->set_rules('measure_name', 'Measure Name', 'required');
                $this->form_validation->set_rules('desc', 'Description', 'required');
                if ($this->form_validation->run() == FALSE){
                    $data               = $this->MMeasure->form();                   
                    
                    $data['title']          = 'Measure';
                    $data['subheader']      = 'Setup Measure';
                    $data['message']        = validation_errors();
                    $data['measure_name']['value']  = set_value('measure_name');
                    $data['desc']['value']  = set_value('desc');
                    $data['query'] = $this->MMeasure->getAll(); //get data from database
                    $data['main']  =  'measure/input';
                    $this->load->view('template',$data);
                }else{
                    if ($this->input->post('id')>0){
                        $this->MMeasure->update();
                        redirect('measure');
                    }else{
                        $this->MMeasure->save();
                        redirect('measure');
                    }
                }
            }
        }
    }
    
    function delete(){
        $id = $this->input->post('id');
        $this->db->delete('measures',array('id'=>$id));
    }
}
