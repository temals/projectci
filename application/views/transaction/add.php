<div class='boxcontent row'>
  <h2 class='pull-left'>Add / Edit <?php echo ucfirst($this->uri->segment(1))." ".ucfirst($this->uri->segment(2)); ?></h2>
  <div class='pull-right'><?php echo form_submit('submit','Simpan Data','class="btn btn-success" form="transactionForm"'); ?><?php echo anchor($page,'Kembali','class="btn btn-warning"'); ?></div>
</div>

<div class='boxContent'>
    <?php echo form_open($page."/save",array("id"=>"transactionForm")); ?>

	<?php echo $this->inputfields->hidden("id",(!empty($data['id']) ? $data['id'] : ""),array("type"=>"hidden","","class"=>"form-control")); ?>


    <div class="form-group">
        <label class="col-sm-2 control-label">Customer Name</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->customer_lists("customer_id",(!empty($data['customer_id']) ? $data['customer_id'] : ""),array("placeHolder"=>"Customer Name","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Quantity</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("quantity",(!empty($data['quantity']) ? $data['quantity'] : ""),array("placeHolder"=>"Quantity","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Gross Weight</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("gross_weight",(!empty($data['gross_weight']) ? $data['gross_weight'] : ""),array("placeHolder"=>"Gross Weight","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Volume</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("volume",(!empty($data['volume']) ? $data['volume'] : ""),array("placeHolder"=>"Volume","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Volume Weight</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("volume_weight",(!empty($data['volume_weight']) ? $data['volume_weight'] : ""),array("placeHolder"=>"Volume Weight","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Description Goods</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->textarea("drescription",(!empty($data['drescription']) ? $data['drescription'] : ""),array("placeHolder"=>"Description","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Transport Type</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->transport_type_lists("transport_type",(!empty($data['transport_type']) ? $data['transport_type'] : ""),array("placeHolder"=>"Transport Type","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Special Instruction</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->textarea("special_instruction",(!empty($data['special_instruction']) ? $data['special_instruction'] : ""),array("placeHolder"=>"Special Instruction","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Penyerah</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("penyerah",(!empty($data['penyerah']) ? $data['penyerah'] : ""),array("placeHolder"=>"Penyerah","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Penerima</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("penerima",(!empty($data['penerima']) ? $data['penerima'] : ""),array("placeHolder"=>"Penerima","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Total</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("price",(!empty($data['price']) ? $data['price'] : ""),array("placeHolder"=>"Total","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Picked By</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("picked_by",(!empty($data['picked_by']) ? $data['picked_by'] : ""),array("placeHolder"=>"Picked By","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">DeliveredBy</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("delivered_by",(!empty($data['delivered_by']) ? $data['delivered_by'] : ""),array("placeHolder"=>"Delivered By","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Handover By</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("handover_by",(!empty($data['handover_by']) ? $data['handover_by'] : ""),array("placeHolder"=>"Handover By","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Received By</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("received_by",(!empty($data['received_by']) ? $data['received_by'] : ""),array("placeHolder"=>"Received By","","class"=>"form-control")); ?>
        </div>
    </div>

    <p>&nbsp;</p>
    <label class="col-sm-2 control-label">Pembayaran</label>
    <a href='#' class='btn btn-primary pull-right cloneRow'>Clone Button</a>
    <table class='table table-striped'>
        <tr>
            <th>Master Price</th>
        </tr>
        <!-- hidden tr disediakan untuk di clone di baris selanjutnya -->
        <tr class='hide rowPrivilege'>
            <td>
                <?php echo $this->inputfields->type_pembayaran_lists("master_price_id[]",(!empty($data['master_price_id']) ? $data['master_price_id'] : ""),array("placeHolder"=>"Transaksi","","class"=>"form-control")); ?>
            </td>
        </tr>

        <?php if(!empty($data1)): ?>
            <tr class='displayPrivilege'>
               <td>
                <?php echo $this->inputfields->type_pembayaran_lists("master_price_id[]",(!empty($data['master_price_id']) ? $data['master_price_id'] : ""),array("placeHolder"=>"Transaksi","","class"=>"form-control")); ?>
            </td>
        </tr>

    <?php else: ?>
        <tr class='displayPrivilege'>
            <td>
                <?php echo $this->inputfields->type_pembayaran_lists("master_price_id[]",(!empty($data['master_price_id']) ? $data['master_price_id'] : ""),array("placeHolder"=>"Transaksi","","class"=>"form-control")); ?>
            </td>
        </tr>
    <?php endif; ?>
</table>
<p>&nbsp;</p>
<label class="col-sm-2 control-label">Document</label>
<a href='#' class='btn btn-primary pull-right cloneRow'>Clone Button</a>
<table class='table table-striped'>
    <tr>
        <th>Document Number</th>
    </tr>
    <!-- hidden tr disediakan untuk di clone di baris selanjutnya -->
    <tr class='hide rowPrivilege'>
        <td>
            <?php echo $this->inputfields->text("attachment_no",(!empty($datas['attachment_no']) ? $datas['attachment_no'] : ""),array("placeHolder"=>"Transaksi","","class"=>"form-control")); ?>
        </td>
    </tr>

    <?php if(!empty($datas)): ?>
        <tr class='displayPrivilege'>
           <td>
            <?php echo $this->inputfields->text("attachment_no",(!empty($datas['attachment_no']) ? $datas['attachment_no'] : ""),array("placeHolder"=>"Transaksi","","class"=>"form-control")); ?>
        </td>
    </tr>

<?php else: ?>
    <tr class='displayPrivilege'>
        <td>
            <?php echo $this->inputfields->text("attachment_no",(!empty($datas['attachment_no']) ? $datas['attachment_no'] : ""),array("placeHolder"=>"Transaksi","","class"=>"form-control")); ?>
        </td>
    </tr>
<?php endif; ?>
</table>
<?php echo form_close(); ?>
</div>
