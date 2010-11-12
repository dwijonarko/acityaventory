<html>
<head>
<title>Welcome to Acitya Ventory</title>
<style type="text/css">
body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}

</style>

</head>
demo program :
<?php
	echo "<ul>";
	echo 	"<li>".anchor("brand","Setup Brands","target='_blank'")."</li>";
	echo 	"<li>".anchor("group","Setup Groups","target='_blank'")."</li>";
	echo 	"<li>".anchor("item","Setup Items","target='_blank'")."</li>";
	echo 	"<li>".anchor("measure","Setup Measures","target='_blank'")."</li>";
	echo 	"<li>".anchor("supplier","Setup Suppliers","target='_blank'")."</li>";
	echo 	"<li>".anchor("warehouse","Setup Warehouse","target='_blank'")."</li>";
	echo 	"<li>".anchor("pre_order","Setup Pre Orders","target='_blank'")."</li>";
	echo 	"<li>".anchor("pre_order/show","List Pre Orders","target='_blank'")."</li>";
	echo 	"<li>".anchor("jqgrid_test","List Pre Orders in jgGrid","target='_blank'")."</li>";
	echo "</ul>";
?>
<p><br />Page rendered in {elapsed_time} seconds</p>
</body>
</html>
