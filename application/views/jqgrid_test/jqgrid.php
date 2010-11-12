<?
	$ci =& get_instance();
	$base_url = base_url();
?>
<table id="list1"></table> <!--Grid table-->
<div id="pager1"></div>  <!--pagination div-->
 
<script type="text/javascript">
jQuery().ready(function (){
jQuery("#list1").jqGrid({
   	url:'<?=$base_url.'jqgrid_test/gridServerPart'?>',      //another controller function for generating XML data
	mtype : "post",             //Ajax request type. It also could be GET
	datatype: "json",            //supported formats XML, JSON or Arrray
   	colNames:['No','No Pre Order','Date','Term Date','Supplier','Total','Description'],       //Grid column headings
   	colModel:[
   		{name:'no',index:'no', width:5, align:"right"},
   		{name:'no_pre_order',index:'no_po', width:30, align:"left"},
   		{name:'date',index:'date', width:20, align:"left"},
   		{name:'term_date',index:'term_date', width:20, align:"left"},
   		{name:'supplier',index:'Supplier', width:20, align:"left"},
   		{name:'total',index:'total', width:20, align:"left"},
   		{name:'description',index:'description', width:50, align:"left"},
  	],
   	rowNum:10,
   	width: 800,
	height: 200,
   	rowList:[10,20,30],
   	pager: '#pager1',
   	sortname: 'id',
    viewrecords: true,
    caption:"Pre Orders"
}).navGrid('#pager1',{edit:false,add:false,del:false});
});
</script>
