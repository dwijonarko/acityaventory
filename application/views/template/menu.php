<script type="text/javascript">

		// initialise plugins
		jQuery(function(){
			jQuery('ul.sf-menu').superfish();
		});

		</script>
<?
    $pos_id = $this->dx_auth->get_role_id();
	$Q1 = mysql_query("SELECT * FROM menu_cat ORDER BY id ASC");
	
	
	while($data=mysql_fetch_array($Q1)){
		echo "<ul class=sf-menu>";
			echo "<li class=current>";
			
			if($data['url'] != '')
			{
				$url = $data['url'];
			}
			else
			{
				$url = '/#';
			}
			
				echo anchor($url,$data['menu_cat_name']);
				echo "<ul>";
				
				$qry = "
					SELECT
						user_menu.role_id,user_menu.menu_id,
						menu.menu_name AS menu_name,
						menu.menu_url AS menu_url ,
						menu.menu_cat_id AS menu_cat_id 
						FROM
						(user_menu) 
						JOIN menu ON user_menu.menu_id = menu.id
						JOIN roles ON user_menu.role_id = roles.id
						WHERE
						menu.menu_cat_id='$data[id]' 
						AND user_menu.role_id='$pos_id' ORDER BY menu.menu_name ASC				
				";
				$Q2 = mysql_query($qry);
				
				while($data2=mysql_fetch_array($Q2)){
					echo "<li class=current>".anchor($data2['menu_url'],$data2['menu_name'])."</li>";
				}
				echo "</ul>";
			echo "</li>";
		echo "</ul>";
	}
	?>
