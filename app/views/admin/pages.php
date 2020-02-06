<?php echo \helpers\session::pull('message');?>

<p><a href='<?php echo DIR;?>admin/pages/add' class='btn btn-info'>Add Page</a></p>

<table class='table table-striped table-hover table-bordered responsive'>
<tr>
	<th>Title</th>
	<th>Desc</th>
	<th>Action</th>
</tr>
<?php
if($data['pages']){
	foreach($data['pages'] as $row){
		echo "<tr>";
		echo "<td>$row->pageTitle</td>";
		echo "<td>$row->pageDesc</td>";
		echo "<td>
		<a href='".DIR."admin/pages/edit/$row->pageID'>Edit</a>
		<a href=\"javascript:delpage('$row->pageID','$row->pageTitle');\">Delete</a>
		</td>";
		echo "</tr>";
	}
}
?>
</table>