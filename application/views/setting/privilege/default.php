<?php
//hak akses users
//disesuaikan dengan halaman dan actionnya view | add | edit | delete
$is_allow = $this->privilege->is_allow($page,"view");
if($is_allow == "allow"):
?>
<div class='boxContent row'>
	<h2 class='pull-left'>Privilege (Hak Akses)</h2>
	<div class='pull-right'><?php echo anchor($page."/add","<button class='btn btn-success'>Add New</button>"); ?></div>
</div>
<div class='boxContent'>
    <table class='table table-striped dataTable'>
        <thead>
            <tr>
                <th>Tipe User</th>
                <th>User</th>
                <th>Menu</th>
                <th>Privilege</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($data)): foreach($data as $row):?>
            <tr>
                <td><?php echo $row['user_type_id']; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['menu']; ?></td>
                <td><?php echo $row['action']; ?></td>
                <td><div class='btn-group'>
				<button class='btn dropdown-toggle btn-default' data-toggle='dropdown'>Action<span class='caret'></span></button>
					<ul class='dropdown-menu'>								
						<li><?php echo anchor($page.'/add/'.$row['id'],'<i class="icon-user"></i>Edit'); ?></li>
						<li><?php echo anchor($page.'/delete/'.$row['id'],'<i class="icon-remove-sign"></i>Delete','class="deleteData"'); ?></li>
					</ul>
				</div></td>
            </tr>
            <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>