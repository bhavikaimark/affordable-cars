<?php

/*

Plugin Name: Affordable Cars Subscribers

Description: Shows Affordable Cars Subscribers

Author: Imark

*/



if (is_admin())

{   

  function subscribers_section() 

	 {  

	add_menu_page("Subscribers","Subscribers",1,"subscribers","");

	add_submenu_page("subscribers","Subscribers","Subscribers",8,"subscribers","subscribers");

	 }  

   add_action('admin_menu','subscribers_section'); 

   

   

   

}

function subscribers()

{
?>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<?
include('../wp-config.php');

global $wpdb;

$plugin_url = plugin_dir_url( __FILE__ );

?>

<link rel='stylesheet' href='<?php echo $plugin_url; ?>css/style.css' type='text/css'/>

<link rel='stylesheet' href='<?php echo $plugin_url; ?>css/bootstrap.min.css' type='text/css'/>



<h1>Affordable Cars Subscribers</h1>

<table class="table table-striped view-details" id="myTable" style="width: 40%" align="left">


<thead>
<tr>

<th>S.no</th>

<th>Email Id</th>

</tr>
</thead>
<tbody>
<?php 

$i=1;

foreach( $wpdb->get_results("SELECT * FROM `wp_subscribe`") as $key => $row)

	{

	?>

		<tr>

		<td><?php echo $i; ?></td>

		<td><?php echo $row->email_id; ?></td>

		</tr>

		<?php $i++; 

	} ?>

</tbody>

</tbody>

</table>

  <script type="text/javascript">
  	jQuery(document).ready(function(){
    jQuery('#myTable').DataTable();
	});
  </script>
  <script src="http://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<?php


  }
  ?>