$(document).ready(function() {

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