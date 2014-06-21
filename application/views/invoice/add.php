<div class='boxcontent row'>
		<h2 class='pull-left'>Add / Edit <?php echo ucfirst($this->uri->segment(1))." ".ucfirst($this->uri->segment(2)); ?></h2>
		<div class='pull-right'><?php echo form_submit('submit','Simpan Data','class="btn btn-success" form="invoiceForm"'); ?><?php echo anchor($page,'Kembali','class="btn btn-warning"'); ?></div>
	</div>

<div class='boxContent'>
    <?php echo form_open($page."/save",array("id"=>"invoiceForm")); ?>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Customer</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->company_lists("customer_id",(!empty($data['customer_id']) ? $data['customer_id'] : ""),array("placeHolder"=>"Customer","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">No Invoice</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("no_invoice",(!empty($data['no_invoice']) ? $data['no_invoice'] : ""),array("placeHolder"=>"No Invoice","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Faktur Pajak</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->faktur_lists("faktur_pajak_id",(!empty($data['faktur_pajak_id']) ? $data['faktur_pajak_id'] : ""),array("placeHolder"=>"Faktur Pajak","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Due Date</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("due_date",(!empty($data['due_date']) ? $data['due_date'] : ""),array("placeHolder"=>"Due Date","","class"=>"form-control datepicker")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Payment Date</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("payment_date",(!empty($data['payment_date']) ? $data['payment_date'] : ""),array("placeHolder"=>"Payment Date","","class"=>"form-control datepicker")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Down Payment</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("down_payment",(!empty($data['down_payment']) ? $data['down_payment'] : ""),array("placeHolder"=>"Down Payment","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->textarea("description",(!empty($data['description']) ? $data['description'] : ""),array("placeHolder"=>"Description","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">User</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->user_lists("user_id",(!empty($data['user_id']) ? $data['user_id'] : ""),array("placeHolder"=>"User","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Date</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("date",(!empty($data['date']) ? $data['date'] : ""),array("placeHolder"=>"Date","","class"=>"form-control datepicker")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Faktur Pajak</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->status_lists("status",(!empty($data['status']) ? $data['status'] : ""),array("placeHolder"=>"status","","class"=>"form-control")); ?>
        </div>
    </div>

    <p>&nbsp;</p>
    <a href='#' class='btn btn-primary pull-right cloneRow'>Clone Button</a>
    <table class='table table-striped'>
        <tr>
            <th>Transaction</th>
            <th></th>
        </tr>
        <!-- hidden tr disediakan untuk di clone di baris selanjutnya -->
        <tr class='hide rowPrivilege'>
            <td>
                <?php echo $this->inputfields->transaction_lists("transaksi_id[]",(!empty($data['transaksi_id']) ? $data['transaksi_id'] : ""),array("placeHolder"=>"Transaksi","","class"=>"form-control")); ?>
            </td>
        <td>
             <a href='#' title='tes' data-toggle='tooltip'>[ ? ]</a>
        </td>
        </tr>
        
        <?php if(!empty($data)) : ?>
        <tr class='displayPrivilege'>
            <td>
                <?php echo $this->inputfields->transaction_lists("transaksi_id[]",(!empty($data['transaksi_id']) ? $data['transaksi_id'] : ""),array("placeHolder"=>"Transaksi","","class"=>"form-control")); ?>
            </td>
        <td>
            <a href='#' title='tes' data-toggle='tooltip'>[ ? ]</a>
        </td>
        </tr>

        <?php else : ?>
        <tr class='displayPrivilege'>
            <td>
                <?php echo $this->inputfields->transaction_lists("transaksi_id[]",(!empty($data['transaksi_id']) ? $data['transaksi_id'] : ""),array("placeHolder"=>"Transaksi","","class"=>"form-control")); ?>
            </td>
        <td>
            <a href='#' title='tes' data-toggle='tooltip'>[ ? ]</a>
        </td>
        </tr>
        <?php endif; ?>
    </table>
    <?php echo form_close(); ?>
</div>
