    <div class='boxcontent row'>
		<h2 class='pull-left'>Add / Edit <?php echo ucfirst($this->uri->segment(1))." ".ucfirst($this->uri->segment(2)); ?></h2>
		<div class='pull-right'><?php echo form_submit('submit','Simpan Data','class="btn btn-success" form="jurnalForm"'); ?><?php echo anchor($page,'Kembali','class="btn btn-warning"'); ?></div>
	</div>

<div class='boxContent'>
    <?php echo form_open($page."/save",array("id"=>"jurnalForm")); ?>

            <?php echo $this->inputfields->hidden("id",(!empty($data['id']) ? $data['id'] : ""),array("type"=>"hidden","","class"=>"form-control")); ?>
   
    
    <div class="form-group">
        <label class="col-sm-2 control-label">No Jurnal</label>
        <div class="col-sm-10">
            <?php 
			echo $this->inputfields->defineInput("no_jurnal",(!empty($data['no_jurnal']) ? $data['no_jurnal'] : ""),array("placeHolder"=>"No Jurnal","","class"=>"form-control"));
            ?>
        </div>
    </div>
    
    <p>&nbsp;</p>
    <a href='#' class='btn btn-primary pull-right cloneRow'>Clone Button</a>
    <table class='table table-striped'>
        <tr>
            <th>COA id</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Date</th>
            <th></th>
        </tr>
        <!-- hidden tr disediakan untuk di clone di baris selanjutnya -->
        <tr class='hide rowPrivilege'>
            <td>
    <?php echo $this->inputfields->coa_lists("coa_id[]",(!empty($data['coa_id']) ? $data['coa_id'] : ""),array("placeHolder"=>"COA","","class"=>"form-control")); ?>
            </td>
            <td><input type='text' name='debit[]' class='form-control' placeHolder='Debit'/></td>
            <td><input type='text' name='credit[]' class='form-control' placeHolder='Credit'/></td>
            <td><input type='text' name='date[]' class='form-control datepicker' placeHolder='Date'/></td>
            <td>
                 <a href='#' title='tes' data-toggle='tooltip'>[ ? ]</a>
            </td>
        </tr>
        
        <?php if(!empty($data)): ?>
        <tr class='displayPrivilege'>
            <td>
    <?php echo $this->inputfields->coa_lists("coa_id[]",(!empty($data['coa_id']) ? $data['coa_id'] : ""),array("placeHolder"=>"COA","","class"=>"form-control")); ?>
            </td>
            <td><input type='text' name='debit[]' class='form-control' placeHolder='Debit' value='<?php echo $data['debit']; ?>' /></td>
            <td><input type='text' name='credit[]' class='form-control' placeHolder='Credit' value='<?php echo $data['credit']; ?>' /></td>
            <td><input type='text' id="date" name='date[]' class='form-control datepicker' placeHolder='Date' value='<?php echo $data['date']; ?>' /></td>
            <td>
                <a href='#' title='tes' data-toggle='tooltip'>[ ? ]</a>
            </td>
        </tr>

        <?php else: ?>
        <tr class='displayPrivilege'>
            <td>
    <?php echo $this->inputfields->coa_lists("coa_id[]",(!empty($data['coa_id']) ? $data['coa_id'] : ""),array("placeHolder"=>"COA","","class"=>"form-control")); ?>
            </td>
            <td><input type='text' name='debit[]' class='form-control' placeHolder='Debit'/></td>
            <td><input type='text' name='credit[]' class='form-control' placeHolder='Credit'/></td>
            <td><input type='text' name='date[]' class='form-control datepicker' placeHolder='Date'/></td>
            <td>
                <a href='#' title='tes' data-toggle='tooltip'>[ ? ]</a>
            </td>
        </tr>
        <?php endif; ?>
    </table>
    <?php echo form_close(); ?>
</div>
