<?php echo \helpers\session::pull('message');?>



<ul class="nav nav-pills">

<?php
if($data['menus']){

    function fMenuTree($menuPID,$menuItems) {
        
        $menuHtml = "";
        foreach ($menuItems as $menuItem) {

            if ($menuPID == $menuItem->menuPID) {
                $menuHtml .= "<li data-menuid='$menuItem->menuID'><a href='#'>";
                $menuHtml .= $menuItem->menuTitle;
                
                if ($menuItem->menuID != $menuPID) {
                    $altMenu = fMenuTree($menuItem->menuID,$menuItems);
                    if ($altMenu) {
                        $menuHtml .= '<ul>' . fMenuTree($menuItem->menuID,$menuItems) . '</ul>';
                    }
                }
                $menuHtml .= '</a></li>';
            }
        }
        return $menuHtml;
    }

    echo fMenuTree(0,$data['menus']);
}
?>

</ul>

<p><a href='<?php echo DIR;?>admin/menus/add' class='btn btn-info'>Add Menu</a></p>

<table class='table table-striped table-hover table-bordered responsive'>
<tr>
	<th>Title</th>
	<th>Action</th>
</tr>
<?php
if($data['menus']){
	foreach($data['menus'] as $row){
		echo "<tr>";
		echo "<td>$row->menuTitle</td>";
		echo "<td>
		<a href='".DIR."admin/menus/edit/$row->menuID'>Edit</a>
		<a href=\"javascript:delmenu('$row->menuID','$row->menuTitle');\">Delete</a>
		</td>";
		echo "</tr>";
	}
}
?>
</table>