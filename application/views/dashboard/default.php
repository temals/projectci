<div class='boxContent'>
	<h2>Dashboard</h2>
</div>

<div class='boxContent'>
	Welcome to integrated cargo system
</div>

<div class='boxContent'>
	<h2> Pembagian Tugas Project </h2>
	<p class='alert alert-info'><i>Sementara ini kita assign tugas untuk mengerjakan master data, Silakan dikerjakan jika ada kendala tolong lapor waktu kurang lebih 3 hari kita report progress</i></p>
    <div class='row'>
        
        <div class='col-md-6'>
            <h3>#issue</h3>
            <ul>
                <li>Folder Common atau asset sama, karena sudah terlanjur menggunakan folder common saya sudah menyatukan js dan css dari asset ke common agar setiap file terpusat</li>                        
                <li>Untuk JQuery UI Datepicker telah saya satukan di common/js/ics.js, untuk menggunakan datepicker cukup menggunakan type date pada library inputfields, jadi tidak perlu menulis kode pada jquery terlalu banyak. dan jika ingin menambahkan code jquery lainnya sebaiknya tambahkan di ics.js</li>
                <li>Rubah field database pada table master_charter_price delivery_time menjadi int(3), dan delivery_time int(3)</li>
                <li>Untuk transaction, jurnal, invoice, dan shipment <b>utamakan crudnya (Create, Update, Delete) berjalan</b>, contoh clone ada pada menu setting/privilege/add, <b>dan untuk halaman tersebut gunakan view sendiri</b>, karena setiap formnya berbeda tidak seperti master yang viewnya digunakan bersama</li>
            </ul>
        </div>
        
        <div class='col-md-6'>
        <p><b>Sultan</b>
        <ul>
            <li>Jurnal <span class="label label-success">Baru</span></li>
            <li>Invoice <span class="label label-success">Baru</span></li>

        </ul>
        <ul>
            <li>Master Harga Charter Kendaraan</li>
            <li>Master COA</li>
            <li>Master Lokasi</li>
            <li>Master Kendaraan</li>
        </ul>
        </p>
        <p>
        <b>Fajrin</b>
         <ul>
            <li>Transaction <span class="label label-success"> Baru</span></li>
            <li>Shipment <span class="label label-success"> Baru</span></li>
        </ul>    
        <ul>
            <li>Master Staff</li>
            <li>Master Unit</li>
            <li>Master Harga</li>
            <li>Faktur Pajak</li>
        </ul>
        </p>
        <p><b>Slamet</b>
        <ul>
            <li>Master Company</li>
            <li>Master Users</li>
            <li>Analisa System</li>
            <li><?php echo anchor("setting/privilege/add","Privilege #contoh cloning data"); ?></li>
        </ul>
        </p>
        </div>
    </div>
	<div class='alert alert-danger'>Report Progress : ???</div>
</div>

