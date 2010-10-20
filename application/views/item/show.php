<script type="text/javascript" language="javascript" charset="utf-8">
    var base_url = "<?php echo base_url(); ?>";
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>javascript/form_js/item_delete.js"></script>
<?php
        echo validation_errors();
?>
<b><?php echo $title; ?></b>
<table style="width:800px; border:1px solid;">
 <tr>
 <th style="border:1px solid;">No</th>
 <th style="border:1px solid;">Name</th>
 <th style="border:1px solid;">Sell Price</th>
 <th style="border:1px solid;">Brand</th>
 <th style="border:1px solid;">Group</th>
 <th style="border:1px solid;">Measure</th>
 <th style="border:1px solid;">Status</th>
 <th style="border:1px solid;">Min Stock</th>
 <th style="border:1px solid;">Description</th>
 <th style="border:1px solid;">Edit</th>
 <th style="border:1px solid;">Delete</th>
 </tr>
 <?
 $i=0;
 foreach ($query as $row){
 $i++;
 if ($row->status=='1'){
    $status = "Active";
 }else{
    $status = "Non Active";
 }
 echo "<tr class=\"record\">";
 echo    "<td style=\"border:1px solid;\">$i</td>";
 echo    "<td style=\"border:1px solid;\">$row->name</td>";
 echo    "<td style=\"border:1px solid; text-align:right;\">$row->sell_price</td>";
 echo    "<td style=\"border:1px solid;\">$row->brand_name</td>";
 echo    "<td style=\"border:1px solid;\">$row->group_name</td>";
 echo    "<td style=\"border:1px solid;\">$row->measure_name</td>";
 echo    "<td style=\"border:1px solid;\">$status</td>";
 echo    "<td style=\"border:1px solid; text-align:right;\">$row->min_stock</td>";
 echo    "<td style=\"border:1px solid;\">$row->desc</td>";
 echo    "<td style=\"border:1px solid;\"><a class=\"editbutton\" id=\"$row->id\" href=\"#\">Edit</a></td>";
 echo    "<td style=\"border:1px solid;\"><a class=\"delbutton\" id=\"$row->id\" href=\"#\" >Delete</a></td>";
 echo  "</tr>";
 }
 ?>
</table>
