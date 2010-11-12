<?php
class Jqgrid_test extends CI_Controller{
	function __construct(){
		parent::CI_Controller();
		$this->load->model('MPre_order');
	}
	
	function index(){
		$this->ciGridTest()	;
	}
	
	function ciGridTest(){
		$data['title'] = 'jQGrid Codeigniter Integration Demo';
		$data['subheader'] = 'jQGrid Codeigniter Integration Demo';
		$data['main'] = 'jqgrid_test/jqgrid';
		$this->load->vars($data);
		$this->load->view('template');
	}
	
	function gridServerPart(){
		$page = isset($_POST['page'])?$_POST['page']:1; // get the requested page
		$limit = isset($_POST['rows'])?$_POST['rows']:10; // get how many rows we want to have into the grid
		$sidx = isset($_POST['sidx'])?$_POST['sidx']:'name'; // get index row - i.e. user click to sort
		$sord = isset($_POST['sord'])?$_POST['sord']:''; // get the direction
 
		if(!$sidx) $sidx =1;
		$query = $this->MPre_order->getAll();
	 
		$count = count($query);
 
		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);    //calculating total number of pages
		} else {
			$total_pages = 0;
		}
	
		if ($page > $total_pages) $page=$total_pages;
		
		$start = $limit*$page - $limit; // do not put $limit*($page - 1)
		$start = ($start<0)?0:$start;  // make sure that $start is not a negative value 
 
		$responce->page = $page; 
		$responce->total = $total_pages; 
		$responce->records = $count; 
		$i=0; 
		foreach($query as $row) { 
			$responce->rows[$i]['id']=$row->id; 
			$responce->rows[$i]['cell']=array($row->id,$row->po_number,$row->date,$row->term_date,$row->supplier_name,$row->total,$row->description); $i++; 
		} 
		echo json_encode($responce); 
}
}
