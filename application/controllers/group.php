<?php
#doc
#    classname:    Group
#    scope:        PUBLIC
#
#/doc

class Group extends Controller
{
    
    function __construct ()
    {
       parent::Controller();
       $this->load->model('MGroup');
       
    }
    
    public function index()
    {
        $this->input();
    }
    
    function input()
    {
        $data               = $this->MGroup->form();
        $data['title']      = 'Groups';
        $data['subheader']  = 'Setup Groups';
        
        $data['query'] = $this->MGroup->getAll(); //get data from database
        $data['main']  =  'group/input';
        $this->load->view('template',$data);
    }
    
    function submit()
    {
                
        if ($this->input->post('ajax')){ // submited data with ajax
            $this->form_validation->set_rules('group_name', 'Group Name', 'required');
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
                    $this->MGroup->update();
                    $data['title']      = 'Groups';
                    $data['query'] = $this->MGroup->getAll();
                    $this->load->view('group/show',$data);
                }else{ //don't have id then save / add data
                    $this->MGroup->save();
                    $data['title']      = 'Groups';
                    $data['query'] = $this->MGroup->getAll();
                    $this->load->view('group/show',$data);
                }
                
                
            }
        }else{ //submited without ajax (if javascript disabled)
            if ($this->input->post('submit')){
                $this->form_validation->set_rules('group_name', 'Group Name', 'required');
                $this->form_validation->set_rules('desc', 'Description', 'required');
                if ($this->form_validation->run() == FALSE){
                    $data               = $this->MGroup->form();                   
                    
                    $data['title']          = 'Groups';
                    $data['subheader']      = 'Setup Groups';
                    $data['message']        = validation_errors();
                    $data['group_name']['value']  = set_value('group_name');
                    $data['desc']['value']  = set_value('desc');
                    $data['query'] = $this->MGroup->getAll(); //get data from database
                    $data['main']  =  'group/input';
                    $this->load->view('template',$data);
                }else{
                    if ($this->input->post('id')>0){
                        $this->MGroup->update();
                        redirect('group');
                    }else{
                        $this->MGroup->save();
                        redirect('group');
                    }
                }
            }
        }
    }
    
    function delete(){
        $id = $this->input->post('id');
        $this->db->delete('groups',array('id'=>$id));
    }
}
