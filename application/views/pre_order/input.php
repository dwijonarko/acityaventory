<script type="text/javascript" src="<?php echo base_url()?>javascript/form_js/pre_order.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>javascript/form_js/add_item_preorder.js"></script>
<script type="text/javascript" language="javascript" charset="utf-8">var base_url = "<?php echo base_url()?>"; var base_controller = "<?php echo base_url()?>pre_order/";</script>
<div id="form_po">
    <script type="text/javascript" src="<?php echo base_url(); ?>javascript/form_js/form.js"></script>
<?php echo form_open('pre_order/save','id=itemForm'); ?>
        <table width="100%" >
            <tr>
                <td>Pre Order No</td>
                <td><?php echo form_input($po_number)?></td><td>&nbsp;</td>
                <td>Supplier</td>
                <td><?php echo form_input($supplier);?><input type="hidden" name="supplier_id" id="supplier_id"></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><?php echo form_input($date)?></td><td>&nbsp;</td>                
                <td rowspan="2">Address</td>
                <td rowspan="2"><?php echo form_textarea($address);?></td>
            </tr>
            <tr >
                <td>Term Date</td>
                <td><?php echo form_input($term_date)?></td><td>&nbsp;</td>
            </tr>
        </table>
        <p></p>
        <p></p>
        <div id="nav" style="padding-left:10px;"><a href="#boxfg" id="add">Add Item</a> </div>
        <table width="960px">
        	<tr>
        		<td>No</td>
        		<td>Code</td>
        		<td>Name</td>
        		<td>Brand</td>
        		<td>Amount</td>
        		<td>Price</td>
        		<td>Sub Total</td>
        		<td>Desc</td>
        		<td>Delete</td>
        	</tr>
        	<tbody id="container">
        	
        	</tbody>
        	<tr><td colspan="8"><?php echo form_submit('submit','Simpan'); ?></td></tr>
        </table>
<?php echo form_close();?></div>
