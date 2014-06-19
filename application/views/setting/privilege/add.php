<?php
$is_allow = $this->privilege->is_allow($page,"add");
if($is_allow == "allow"):
?>
	<div class='boxcontent row'>
		<h2 class='pull-left'>Add / Edit <?php echo ucfirst($this->uri->segment(1))." ".ucfirst($this->uri->segment(2)); ?></h2>
		<div class='pull-right'><?php echo form_submit('submit','Simpan Data','class="btn btn-success" form="privilegeForm"'); ?><?php echo anchor($page,'Kembali','class="btn btn-warning"'); ?></div>
	</div>

<div class='boxContent'>
    <?php echo form_open($page."/save",array("id"=>"privilegeForm")); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label">User Type Id</label>
        <div class="col-sm-10">
            <?php 
			echo $this->inputfields->defineInput("user_type_id",(!empty($data['user_type_id']) ? $data['user_type_id'] : ""),array("placeHolder"=>"User Type Lists","type"=>"user_type_lists","class"=>"form-control"));
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">User Id (Optional)</label>
        <div class="col-sm-10">
            <?php 
			echo $this->inputfields->defineInput("user_id",(!empty($data['user_id']) ? $data['user_id'] : ""),array("placeHolder"=>"User Type Lists","type"=>"user_lists","class"=>"form-control"));
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Date</label>
        <div class="col-sm-10">
            <?php 
			echo $this->inputfields->defineInput("date",(!empty($data['user_id']) ? $data['user_id'] : ""),array("placeHolder"=>"Date YYYY-mm-dd","type"=>"date","class"=>"form-control"));
            ?>
        </div>
    </div>
    
    <p>&nbsp;</p>
    <a href='#' class='btn btn-primary pull-right cloneRow'>Clone Button</a>
    <table class='table table-striped'>
        <tr>
            <th>Menu</th>
            <th>Action</th>
            <th></th>
        </tr>
        <!-- hidden tr disediakan untuk di clone di baris selanjutnya -->
        <tr class='hide rowPrivilege'>
            <td><input type='text' name='menu[]' class='form-control' placeHolder='Menu' /></td>
            <td>
                <input type='text' name='action[]' class='form-control' placeHolder='view;edit;add;delete' />
            </td>
            <td>
                 <a href='#' title='asfasdfasdfasdf' data-toggle='tooltip'>[ ? ]</a>
                <!-- <select name='action[]' multiple='multiple' class='form-control'>
                    <option value='view'>View</option>
                    <option value='add'>Add</option>
                    <option value='edit'>Edit</option>
                    <option value='delete'>Delete</option>
                </select>-->
            </td>
        </tr>
        
        <?php if(!empty($data)): ?>
        <tr class='displayPrivilege'>
            <td><input type='text' name='menu[]' class='form-control' placeHolder='Menu' value='<?php echo $data['menu']; ?>' /></td>
            <td><input type='text' name='action[]' class='form-control' placeHolder='view;edit;add;delete' value='<?php echo $data['action']; ?>' />
            </td>
            <td>
                <a href='#' title='asfasdfasdfasdf' data-toggle='tooltip'>[ ? ]</a>
                <!-- 
                <select name='action[]' multiple='multiple' class='form-control'>
                    <option value='view'>View</option>
                    <option value='add'>Add</option>
                    <option value='edit'>Edit</option>
                    <option value='delete'>Delete</option>
                </select>-->
            </td>
        </tr>
        <?php else: ?>
        <tr class='displayPrivilege'>
            <td><input type='text' name='menu[]' class='form-control' placeHolder='Menu' /></td>
            <td><input type='text' name='action[]' class='form-control' placeHolder='view;edit;add;delete' />
            </td>
            <td>
                <a href='#' title='asfasdfasdfasdf' data-toggle='tooltip'>[ ? ]</a>
                <!-- 
                <select name='action[]' multiple='multiple' class='form-control'>
                    <option value='view'>View</option>
                    <option value='add'>Add</option>
                    <option value='edit'>Edit</option>
                    <option value='delete'>Delete</option>
                </select>-->
            </td>
        </tr>
        <?php endif; ?>
    </table>
    <?php echo form_close(); ?>
</div>
<?php endif; ?>