<div class='boxContent'>
	<h2>Development Wiki</h2>
</div>

<div class='boxContent'>
    <ul class="nav nav-tabs" role="tablist">
      <li class="active"><a href="#info" role="tab" data-toggle="tab">Information</a></li>
      <li><a href="#task" role="tab" data-toggle="tab">Task</a></li>
      <li><a href="#issue" role="tab" data-toggle="tab">Issue</a></li>
        <li><a href="#feedback" role="tab" data-toggle="tab">Feedback</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        
        <!-- Info Tab -->
        <div class="tab-pane active" id="info">
            <p>Selamat datang sahabat developer, ini adalah dashboard informasi untuk panduan tim dalam melakukan pembangunan program.</p>
            
            <h3>#informasi</h3>
            <p>Baca terlebih dahulu halaman ini, ada beberapa tab disini antara lain task (pembagian tugas), issue (issue bug, solve, problem yang menyangkut teknis pekerjaan) masukkan atau tulis di #issue jika menemukan issue baru</p>
            
            <h3>#Rule</h3>
            <p>
                <li>Lakukan Sync github (Commit / Sync) setiap hari mulai dari jam 8, walaupun pekerjaan belum selesai commit saja dan lanjutkan pekerjaan</li>
                <li>Setiap pekerjaan utamakan crud terlebih dahulu (Create, update, delete), bagian bagian yang sulit seperti jquery dan lainnya belakangan saja</li>
                <li>Lakukan komunikasi jika terdapat kesulitan, sambil mencari solusi bersama, explore semaksimal mungkin jika stack dan dirasa tidak mampu mengerjakan komunikasi kembali dengan tim agar bagian tersebut di handle tim lain, jadi progress tetap berjalan, waktu explore maksimal 3 hari</li>
                <li>Semoga rule ini tidak menjadi beban malah menambah produktifitas kita sekalian</li>
            </p>
            
            <h3>#Pesan pesan Sponsor</h3>
            <p class='alert alert-warning'>Komunikasi tolong di jaga yah, banyak cara untuk komunikasi sms, whatsapp, line, kik, email, walaupun kita punya kepentingan lain
                    diluar usahakan untuk profesional menjaga apa yang sudah menjadi tanggung jawab kita, tolong kalau ada masalah apapun bisa komunikasi kesesama tim #thanks</p>
            
            <address>
                Slamet <br/>
                Email : temals.mulyadi@gmail.com <br />
                Phone : 082114411992 include (whatsapp)
            </address>
        </div>
        
        <!-- Task Tab -->
        <div class="tab-pane" id="task">
            <h2> Pembagian Tugas Project <small>part #2</small> </h2>
            <p class='alert alert-info'><i>Kawan - kawan mendekati inti program seperti biasa atau umumnya dan sudah menjadi kebiasaan kita akan mengalami banyak kesulitan di sana di sini, untuk itu saya mohon jika menemukan kesulitan lakukan komunikasi dan coba cari solusi dengan explore , tolong explore semaksimal mungkin karena itu untuk kebaikan kawan kawan sekalian agar ilmu kawan kawan makin berkembang. manfaatkan moment project ini sebaik mungkin. dan jika kawan kawan sudah merasa stack atau mentok lakukan komunikasi kembali untuk mencari solusi bersama. thanks</i></p>
            
            <p>Master Data <span class="label label-success">Sementara Selesai</span> kecuali jika ditemukan bug atau ada penambahan (Revisi)</p>
            
            <p>
                <h3>Sultan</h3>
                <ul>
                    <li>Jurnal <span class="label label-success">Baru</span></li>
                    <li>Invoice <span class="label label-success">Menunggu Transaction</span></li>
                </ul>
            </p>
        
            <p>
                <h3>Fajrin</h3>
                 <ul>
                    <li>Transaction <span class="label label-success"> Masih Dalam Progress</span></li>
                    <li>Shipment <span class="label label-success"> Sementara Selesai</span></li>
                </ul>    
                
            </p>
            <p>
                <h3>Slamet</h3>
                <ul>
                    <li>Analisa System</li>
                </ul>
            </p>

            <p>
                <h3>Upcoming Task</h3>
                <ul>
                    <li>Settings/Profile</li>
                    <li>Settings/General Settings</li>
                    <li>Reports/Transaction</li>
                    <li>Reports/Shipment</li>
                    <li>Reports/Buku Besar</li>
                    <li>Trace & Tracking</li>
                    <li>Accounting/Faktur Pajak</li>
                    <li>Operasional/Schedule</li>
                </ul>
            </p>

            <!-- sultan 
            <ul>
                <li>Master Harga Charter Kendaraan</li>
                <li>Master COA</li>
                <li>Master Lokasi</li>
                <li>Master Kendaraan</li>
            </ul>

            Fajrin
            <ul>
                <li>Master Staff</li>
                <li>Master Unit</li>
                <li>Master Harga</li>
                <li>Faktur Pajak</li>
            </ul>
            -->
        </div>

        <!-- Issue Tab -->
        <div class="tab-pane" id="issue">
            <h3>#issue</h3>
            <p class='alert alert-info'><i>Kawan - kawan halaman ini adalah digunakan untuk post bug, solve, problem, atau lainnya. tolong masukkan di bagian ini atau hubungi sesama tim langsung lewat media apapun, maksud dari halaman ini terkadang kita menemukan permasalahan panjang, karena jika lewat sms terlalu panjang dan agak berlibet boleh ditulis di sini panjang2 dan jelas agar sesama tim bisa paham</i></p>
            <ul>
                <li>Folder Common atau asset sama, karena sudah terlanjur menggunakan folder common saya sudah menyatukan js dan css dari asset ke common agar setiap file terpusat</li>                        
                <li>Untuk JQuery UI Datepicker telah saya satukan di common/js/ics.js, untuk menggunakan datepicker cukup menggunakan type date pada library inputfields, jadi tidak perlu menulis kode pada jquery terlalu banyak. dan jika ingin menambahkan code jquery lainnya sebaiknya tambahkan di ics.js</li>
                <li>Rubah field database pada table master_charter_price delivery_time menjadi int(3), dan delivery_time int(3)</li>
                <li>Untuk transaction, jurnal, invoice, dan shipment <b>utamakan crudnya (Create, Update, Delete) berjalan</b>, contoh clone ada pada menu setting/privilege/add, <b>dan untuk halaman tersebut gunakan view sendiri</b>, karena setiap formnya berbeda tidak seperti master yang viewnya digunakan bersama</li>
            </ul>
        </div>

        <!-- Feedback Tab -->
        <div class="tab-pane" id="feedback"></div>
    </div>
</div>

