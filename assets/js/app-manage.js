$(document).ready(function() {

    if ($('#tbl-scdb-log').length !== 0) {
        var url = 'log/table_log';

        $('#tbl-scdb-log').dataTable({
            // dom: 'Bfrtip',
            dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: [
                'copy', 'excel', 'print'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });
    }

    if ($('#tbl-scdb-pns').length !== 0) {
        var url = 'kepegawaian/isian_pns';

        $('#tbl-scdb-pns').dataTable({
            // dom: 'Bfrtip',
            dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: [
                'copy', 'excel', 'print'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });

        // Untuk sunting
        $('#editpns').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#nox').attr("value",div.data('no'));
            modal.find('#nipx').attr("value",div.data('nip'));
            modal.find('#nama_lengkapx').attr("value",div.data('nama_lengkap'));
            modal.find('#bagianx').attr("value",div.data('bagian'));
            modal.find('#tempat_lahirx').attr("value",div.data('tempat_lahir'));
            modal.find('#tanggal_lahirx').attr("value",div.data('tanggal_lahir'));
            modal.find('#no_urut_pangkatx').attr("value",div.data('no_urut_pangkat'));
            modal.find('#pangkatx').attr("value",div.data('pangkat'));
            modal.find('#gol_ruangx').attr("value",div.data('gol_ruang'));
            modal.find('#tmt_pangkatx').attr("value",div.data('tmt_pangkat'));
            modal.find('#jabatanx').attr("value",div.data('jabatan'));
            modal.find('#tmt_jabatanx').attr("value",div.data('tmt_jabatan'));
            modal.find('#jurusanx').attr("value",div.data('jurusan'));
            modal.find('#nama_ptx').attr("value",div.data('nama_pt'));
            modal.find('#tahun_lulusx').attr("value",div.data('tahun_lulus'));
            modal.find('#tingkat_pendidikanx').val(div.data('tingkat_pendidikan'));
            modal.find('#masa_kerjax').attr("value",div.data('masa_kerja'));
            modal.find('#catatan_mutasix').attr("value",div.data('catatan_mutasi'));
            modal.find('#no_kapregx').attr("value",div.data('no_kapreg'));
            modal.find('#eselonx').attr("value",div.data('eselon'));
        });

        $('#hapuspns').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#nipxx').attr("value",div.data('nip'));
            modal.find('#nama_lengkapxx').attr("value",div.data('nama_lengkap'));
        });
    }

    if ($('#tbl-scdb-dosen-dikti').length !== 0) {
        var url = 'dosen_dikti/table_dosen_dikti';

        $('#tbl-scdb-dosen-dikti').dataTable({
            // dom: 'Bfrtip',
            dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: [
                'copy', 'excel', 'print'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });

        // Untuk sunting
        $('#editdosen-dikti').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#idx').attr("value",div.data('id')); 
            modal.find('#namax').attr("value",div.data('nama')); 
            modal.find('#tempat_lahirx').attr("value",div.data('tempat_lahir')); 
            modal.find('#jenis_kelaminx').attr("value",div.data('jenis_kelamin')); 
            modal.find('#tanggal_lahirx').attr("value",div.data('tanggal_lahir')); 
            modal.find('#agamax').val(div.data('agama')); 
            modal.find('#nama_ibux').attr("value",div.data('nama_ibu')); 
            modal.find('#status_aktifx').val(div.data('status_aktif')); 
            modal.find('#nidn_nup_nidkx').attr("value",div.data('nidn_nup_nidk')); 
            modal.find('#nikx').attr("value",div.data('nik')); 
            modal.find('#nipx').attr("value",div.data('nip')); 
            modal.find('#npwpx').attr("value",div.data('npwp')); 
            modal.find('#ikatan_kerjax').attr("value",div.data('ikatan_kerja')); 
            modal.find('#status_pegawaix').val(div.data('status_pegawai')); 
            modal.find('#jenis_pegawaix').attr("value",div.data('jenis_pegawai')); 
            modal.find('#no_sk_cpnsx').attr("value",div.data('no_sk_cpns')); 
            modal.find('#tanggal_sk_cpnsx').attr("value",div.data('tanggal_sk_cpns')); 
            modal.find('#no_sk_pengangkatanx').attr("value",div.data('no_sk_pengangkatan')); 
            modal.find('#tanggal_sk_pengangkatanx').attr("value",div.data('tanggal_sk_pengangkatan')); 
            modal.find('#lembaga_pengangkatanx').attr("value",div.data('lembaga_pengangkatan')); 
            modal.find('#pangkat_golonganx').attr("value",div.data('pangkat_golongan')); 
            modal.find('#sumber_gajix').attr("value",div.data('sumber_gaji'));
            modal.find('#alamatx').val(div.data('alamat'));
            modal.find('#dusunx').attr("value",div.data('dusun')); 
            modal.find('#rtx').attr("value",div.data('rt')); 
            modal.find('#rwx').attr("value",div.data('rw')); 
            modal.find('#kelurahanx').attr("value",div.data('kelurahan')); 
            modal.find('#kodeposx').attr("value",div.data('kodepos')); 
            modal.find('#kecamatanx').attr("value",div.data('kecamatan')); 
            modal.find('#teleponx').attr("value",div.data('telepon')); 
            modal.find('#hpx').attr("value",div.data('hp')); 
            modal.find('#emailx').attr("value",div.data('email')); 
            modal.find('#status_pernikahanx').val(div.data('status_pernikahan')); 
            modal.find('#nama_suami_istrix').attr("value",div.data('nama_suami_istri')); 
            modal.find('#nip_suami_istrix').attr("value",div.data('nip_suami_istri')); 
            modal.find('#tmt_pnsx').attr("value",div.data('tmt_pns')); 
            modal.find('#pekerjaanx').attr("value",div.data('pekerjaan')); 
            modal.find('#mampu_menghandle_kebutuhan_khususx').val(div.data('mampu_menghandle_kebutuhan_khusus'));
            modal.find('#mampu_menghandle_brailex').val(div.data('mampu_menghandle_braile'));
            modal.find('#mampu_menghandle_bahasa_isyaratx').val(div.data('mampu_menghandle_bahasa_isyarat')); 
            modal.find('#sertifikasi_dosenx').val(div.data('sertifikasi_dosen'));
            modal.find('#bidang_ilmux').val(div.data('bidang_ilmu'));
            modal.find('#jabatanx').val(div.data('jabatan')); 
            modal.find('#sk_jabatanx').attr("value",div.data('sk_jabatan')); 
            modal.find('#tmt_jabatanx').attr("value",div.data('tmt_jabatan')); 
            modal.find('#tahun_ajaranx').attr("value",div.data('tahun_ajaran')); 
            modal.find('#perguruan_tinggix').attr("value",div.data('perguruan_tinggi')); 
            modal.find('#program_studix').attr("value",div.data('program_studi')); 
            modal.find('#no_surat_tugasx').attr("value",div.data('no_surat_tugas')); 
            modal.find('#tanggal_surat_tugasx').attr("value",div.data('tanggal_surat_tugas')); 
            modal.find('#tmt_surat_tugasx').attr("value",div.data('tmt_surat_tugas')); 
            modal.find('#judul_penelitianx').val(div.data('judul_penelitian'));
            modal.find('#lembagax').attr("value",div.data('lembaga')); 
            modal.find('#tahun_penelitianx').attr("value",div.data('tahun_penelitian'));

        });

        $('#hapusdosen-dikti').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#idxx').attr("value",div.data('id')); 
            modal.find('#namaxx').attr("value",div.data('nama')); 

        });
    }
    
    if ($('#tbl-scdb-dosen').length !== 0) {
        var url = 'isian_dosen';

        $('#tbl-scdb-dosen').dataTable({
            // dom: 'Bfrtip',
            dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: [
                'copy', 'excel', 'print'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });

        // Untuk sunting
        $('#editdosen').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id_dosenx').attr("value",div.data('id_dosen'));
            modal.find('#namax').attr("value",div.data('nama'));
            modal.find('#nipx').attr("value",div.data('nip'));
            modal.find('#nidnx').attr("value",div.data('nidn'));
            modal.find('#serdosx').val(div.data('serdos'));
            modal.find('#bidang_ilmux').val(div.data('bidang_ilmu'));
            modal.find('#nikx').attr("value",div.data('nik'));
            modal.find('#alamatx').attr("value",div.data('alamat'));
            modal.find('#jabatanx').attr("value",div.data('jabatan'));
            modal.find('#pangkatx').attr("value",div.data('pangkat'));
        });

        $('#hapusdosen').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id_dosenxx').attr("value",div.data('id_dosen'));
            modal.find('#namaxx').attr("value",div.data('nama'));
        });
    }

    if ($('#tbl-scdb-nidn').length !== 0) {
        var url = 'isian_nidn';

        $('#tbl-scdb-nidn').dataTable({
            // dom: 'Bfrtip',
            dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: [
                'copy', 'excel', 'print'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });

        // Untuk sunting
        $('#editdosen').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id_dosenx').attr("value",div.data('id_dosen'));
            modal.find('#namax').attr("value",div.data('nama'));
            modal.find('#nipx').attr("value",div.data('nip'));
            modal.find('#nidnx').attr("value",div.data('nidn'));
            modal.find('#serdosx').val(div.data('serdos'));
            modal.find('#bidang_ilmux').val(div.data('bidang_ilmu'));
            modal.find('#nikx').attr("value",div.data('nik'));
            modal.find('#alamatx').attr("value",div.data('alamat'));
            modal.find('#jabatanx').attr("value",div.data('jabatan'));
            modal.find('#pangkatx').attr("value",div.data('pangkat'));
        });

        $('#hapusdosen').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id_dosenxx').attr("value",div.data('id_dosen'));
            modal.find('#namaxx').attr("value",div.data('nama'));
        });
    }

    if ($('#tbl-scdb-thl').length !== 0) {
        var url = 'isian_thl';

        $('#tbl-scdb-thl').dataTable({
            // dom: 'Bfrtip',
            dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: [
                'copy', 'excel', 'print'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });

        // Untuk sunting
        $('#editthl').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id_thlx').attr("value",div.data('id_thl'));
            modal.find('#nipx').attr("value",div.data('nip'));
            modal.find('#namax').attr("value",div.data('nama'));
            modal.find('#tempat_lahirx').attr("value",div.data('tempat_lahir'));
            modal.find('#tanggal_lahirx').attr("value",div.data('tanggal_lahir'));
            modal.find('#dikx').val(div.data('dik'));
            modal.find('#penugasanx').attr("value",div.data('penugasan'));
            modal.find('#nama_satkerx').val(div.data('nama_satker'));
        });

        // Untuk sunting
        $('#hapusthl').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id_thlxx').attr("value",div.data('id_thl'));
            modal.find('#namaxx').attr("value",div.data('nama'));
        });
    }
});