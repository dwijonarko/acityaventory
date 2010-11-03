<script type="text/javascript" language="javascript" charset="utf-8">var base_url = "<?php echo base_url(); ?>";</script>
<script type="text/javascript" src="<?php echo base_url(); ?>javascript/form_js/pre_order_delete.js"></script>
<b><?php echo $title; ?></b>
<table style="width:800px; border:1px solid;">
 <tr>
 <th style="border:1px solid;">No</th>
 <th style="border:1px solid;">No Pre Order</th>
 <th style="border:1px solid;">Pre Order Date</th>
 <th style="border:1px solid;">Term Date</th>
 <th style="border:1px solid;">Supplier</th>
 <th style="border:1px solid;">Total</th>
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
 echo    "<td style=\"border:1px solid;\">$row->po_number</td>";
 echo    "<td style=\"border:1px solid;\">$row->date</td>";
 echo    "<td style=\"border:1px solid;\">$row->term_date</td>";
 echo    "<td style=\"border:1px solid;\">$row->supplier_name</td>";
 echo    "<td style=\"border:1px solid; text-align:right;\">$row->total</td>";
 echo    "<td style=\"border:1px solid;\">$row->description</td>";
 echo    "<td style=\"border:1px solid;\"><a class=\"editbutton\" id=\"$row->id\" href=\"#\">Edit</a></td>";
 echo    "<td style=\"border:1px solid;\"><a class=\"delbutton\" id=\"$row->id\" href=\"#\" >Delete</a></td>";
 echo  "</tr>";
 }
 ?>
</table>
