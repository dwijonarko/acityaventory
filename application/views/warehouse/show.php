<script type="text/javascript" language="javascript" charset="utf-8">
    var base_url = "<?php echo base_url(); ?>";
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>javascript/form_js/warehouse_delete.js"></script>
<?php
        echo validation_errors();
?>
<b><?php echo $title; ?></b>
<table style="width:600px; border:1px solid;">
 <tr>
 <th style="border:1px solid;">No</th>
 <th style="border:1px solid;">Name</th>
 <th style="border:1px solid;">Code</th>
 <th style="border:1px solid;">Address</th>
 <th style="border:1px solid;">Phone</th>
 <th style="border:1px solid;">Description</th>
 <th style="border:1px solid;">Edit</th>
 <th style="border:1px solid;">Delete</th>
 </tr>
 <?
 $i=0;
 foreach ($query as $row){
 $i++;
 echo "<tr class=\"record\">";
 echo    "<td style=\"border:1px solid;\">$i</td>";
 echo    "<td style=\"border:1px solid;\">$row->name</td>";
 echo    "<td style=\"border:1px solid;\">$row->code</td>";
 echo    "<td style=\"border:1px solid;\">$row->address</td>";
 echo    "<td style=\"border:1px solid;\">$row->phone</td>";
 echo    "<td style=\"border:1px solid;\">$row->desc</td>";
 echo    "<td style=\"border:1px solid;\"><a class=\"editbutton\" id=\"$row->id\" name=\"$row->name\" code=\"$row->code\" address=\"$row->address\" phone=\"$row->phone\" desc=\"$row->desc\" href=\"#\">Edit</a></td>";
 echo    "<td style=\"border:1px solid;\"><a class=\"delbutton\" id=\"$row->id\" href=\"#\" >Delete</a></td>";
 echo  "</tr>";
 }
 ?>
</table>
