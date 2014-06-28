<div class='boxcontent row'>
  <h2 class='pull-left'>Add / Edit <?php echo ucfirst($this->uri->segment(1))." ".ucfirst($this->uri->segment(2)); ?></h2>
  <div class='pull-right'><?php echo form_submit('submit','Simpan Data','class="btn btn-success" form="shipmentForm"'); ?><?php echo anchor($page,'Kembali','class="btn btn-warning"'); ?></div>
</div>

<div class='boxContent'>
    <?php echo form_open($page."/save",array("id"=>"shipmentForm")); ?>

       <?php echo $this->inputfields->hidden("id",(!empty($data['id']) ? $data['id'] : ""),array("type"=>"hidden","","class"=>"form-control")); ?>


    <div class="form-group">
        <label class="col-sm-2 control-label">SPPB</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("sppb",(!empty($data['sppb']) ? $data['sppb'] : ""),array("placeHolder"=>"SPPB","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Vehicle Type</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->vehicle_type_lists("vehicle_id",(!empty($data['vehicle_id']) ? $data['vehicle_id'] : ""),array("placeHolder"=>"Vehicle Type","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Driver</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->staff_lists("driver_id",(!empty($data['driver_id']) ? $data['driver_id'] : ""),array("placeHolder"=>"Driver","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Second Driver</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->staff_lists("second_driver_id",(!empty($data['second_driver_id']) ? $data['second_driver_id'] : ""),array("placeHolder"=>"Second Driver","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Active Location</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->location_lists("active_location_id",(!empty($data['active_location_id']) ? $data['active_location_id'] : ""),array("placeHolder"=>"Active Location","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->textarea("description",(!empty($data['description']) ? $data['description'] : ""),array("placeHolder"=>"Description","","class"=>"form-control")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Date</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("date",(!empty($data['date']) ? $data['date'] : ""),array("placeHolder"=>"Date","","class"=>"form-control datepicker")); ?>
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
    <label class="col-sm-2 control-label">Shipping Date</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("shipping_date",(!empty($data['shipping_date']) ? $data['shipping_date'] : ""),array("placeHolder"=>"Shipping Date","","class"=>"form-control datepicker")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Arrived Date</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("arrived_date",(!empty($data['arrived_date']) ? $data['arrived_date'] : ""),array("placeHolder"=>"Arrived Date","","class"=>"form-control datepicker")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">complete Date</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->text("complete_date",(!empty($data['complete_date']) ? $data['complete_date'] : ""),array("placeHolder"=>"complete Date","","class"=>"form-control datepicker")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Status</label>
        <div class="col-sm-10">
            <?php echo $this->inputfields->shipment_lists("status",(!empty($data['status']) ? $data['status'] : ""),array("placeHolder"=>"Status","","class"=>"form-control")); ?>
        </div>
    </div>

    <p>&nbsp;</p>
    <a href='#' class='btn btn-primary pull-right cloneRow'>Clone Button</a>
    <table class='table table-striped'>
        <tr>
            <th>Transaction id</th>
            <th>Penyerah</th>
            <th>Penerima</th>
            <th>Date</th>
            <th>Shipping Date</th>
            <th>Arrived Date</th>
            <th>complete Date</th>
            <th>Remark</th>
            <th>Status</th>
        </tr>
        <!-- hidden tr disediakan untuk di clone di baris selanjutnya -->
        <tr class='hide rowPrivilege'>
            <td>
                <?php echo $this->inputfields->transactions_lists("transaction_id[]",(!empty($data['transaction_id']) ? $data['transaction_id'] : ""),array("placeHolder"=>"Transaksi","","class"=>"form-control")); ?>
            </td>
            <td><input type='text' name='detail_penyerah[]' class='form-control' placeHolder='Penyerah'/></td>
            <td><input type='text' name='detail_penerima[]' class='form-control' placeHolder='Penerima'/></td>
            <td><input type='text' name='detail_date[]' class='form-control datepicker' placeHolder='Date'/></td>
            <td><input type='text' name='detail_shipping_date[]' class='form-control datepicker' placeHolder='Shipping Date'/></td>
            <td><input type='text' name='detail_arrived_date[]' class='form-control datepicker' placeHolder='Arrived Date'/></td>
            <td><input type='text' name='detail_complete_date[]' class='form-control datepicker' placeHolder='complete Date'/></td>
            <td><input type='textarea' name='remark[]' class='form-control' placeHolder='Remark'/></td>
            <td>
    <?php echo $this->inputfields->shipment_lists("detail_status[]","",array("placeHolder"=>"Status","","class"=>"form-control")); ?>
            </td>
        </tr>
        
        <?php if(!empty($data1)): ?>
        <tr class='displayPrivilege'>
           <td>
                <?php echo $this->inputfields->transactions_lists("transaction_id[]",(!empty($data['transaction_id']) ? $data['transaction_id'] : ""),array("placeHolder"=>"Transaksi","","class"=>"form-control")); ?>
            </td>
            <td><input type='text' name='detail_penyerah[]' class='form-control' placeHolder='Penyerah' value="<?php echo $data['penyerah'] ?>"/></td>
            <td><input type='text' name='detail_penerima[]' class='form-control' placeHolder='Penerima' value="<?php echo $data['penerima'] ?>"/></td>
            <td><input type='text' id="date" name='detail_date[]' class='form-control datepicker' placeHolder='Date' value="<?php echo $data['date'] ?>"/></td>
            <td><input type='text' id="date" name='detail_shipping_date[]' class='form-control datepicker' placeHolder='Shipping Date' value="<?php echo $data['shipping_date'] ?>"/></td>
            <td><input type='text' id="date" name='detail_arrived_date[]' class='form-control datepicker' placeHolder='Arrived Date' value="<?php echo $data['arrived_date'] ?>"/></td>
            <td><input type='text' id="date" name='detail_complete_date[]' class='form-control datepicker' placeHolder='complete Date' value="<?php echo $data['complete_date'] ?>"/></td>
            <td><input type='textarea' name='remark[]' class='form-control' placeHolder='Remark'/></td>
            <td>
    <?php echo $this->inputfields->shipment_lists("detail_status[]","",array("placeHolder"=>"Status","","class"=>"form-control")); ?>
            </td>
        </tr>

        <?php else: ?>
        <tr class='displayPrivilege'>
                <td>
                <?php echo $this->inputfields->transactions_lists("transaction_id[]",(!empty($data['transaction_id']) ? $data['transaction_id'] : ""),array("placeHolder"=>"Transaksi","","class"=>"form-control")); ?>
            </td>
            <td><input type='text' name='detail_penyerah[]' class='form-control' placeHolder='Penyerah'/></td>
            <td><input type='text' name='detail_penerima[]' class='form-control' placeHolder='Penerima'/></td>
            <td><input type='text' name='detail_date[]' class='form-control datepicker' placeHolder='Date'/></td>
            <td><input type='text' name='detail_shipping_date[]' class='form-control datepicker' placeHolder='Shipping Date'/></td>
            <td><input type='text' name='detail_arrived_date[]' class='form-control datepicker' placeHolder='Arrived Date'/></td>
            <td><input type='text' name='detail_complete_date[]' class='form-control datepicker' placeHolder='complete Date'/></td>
            <td><input type='textarea' name='remark[]' class='form-control' placeHolder='Remark'/></td>
            <td>
    <?php echo $this->inputfields->shipment_lists("detail_status[]","",array("placeHolder"=>"Status","","class"=>"form-control")); ?>
            </td>
        </tr>
        <?php endif; ?>
    </table>
<?php echo form_close(); ?>
</div>
