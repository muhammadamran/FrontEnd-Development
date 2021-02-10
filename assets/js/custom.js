function get_fakultas() {
    var data = $("#dosen").val();
    var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1] ;
	if(data) {
		$.ajax({
			type: 'POST',
			url: `${base_url}/kemeng/fakultas`,
			data: { 
				'data': data
			},
			success: function(data){
				$("#fakultas").html('<option value="">Pilih</option>'); 
				var dataObj = jQuery.parseJSON(data);
				if(dataObj) {
					$(dataObj).each(function() {
						var option = $('<option />');
						option.attr('value', this.id_fakultas).text(this.nama_fakultas);           
						$("#fakultas").append(option);
					});
				}
				else {
					$("#fakultas").html('<option value="">Pilihan tidak ada</option>');
				}
			}
		}); 
	}
	else {
		$("#fakultas").html('<option value="">Pilihan tidak ada</option>');
	}	
}

function get_prodi() {
	var fakultas = $("#fakultas").val();
	var nip = $("#dosen").val();
    var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1] ;
	if(fakultas && nip) {
		$.ajax({
			type: 'POST',
			url: `${base_url}/kemeng/prodi`,
			data: { 
				'nip': nip,
				'fakultas': fakultas
			},
			success: function(data){
				$("#prodi").html('<option value="">Pilih</option>'); 
				var dataObj = jQuery.parseJSON(data);
				if(dataObj) {
					$(dataObj).each(function() {
						var option = $('<option />');
						option.attr('value', this.id_prodi).text(this.nama_prodi);           
						$("#prodi").append(option);
					});
				}
				else {
					$("#prodi").html('<option value="">Pilihan tidak ada</option>');
				}
			}
		}); 
	}
	else {
		$("#prodi").html('<option value="">Pilihan tidak ada</option>');
	}	
}

function get_matkul() {
	var fakultas = $("#fakultas").val();
	var nip = $("#dosen").val();
    var prodi = $("#prodi").val();
    var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1] ;
	if(fakultas && nip && prodi) {
		$.ajax({
			type: 'POST',
			url: `${base_url}/kemeng/matkul`,
			data: { 
				'nip': nip,
				'fakultas': fakultas,
				'prodi': prodi,
			},
			success: function(data){
				$("#matkul").html('<option value="">Pilih</option>'); 
				var dataObj = jQuery.parseJSON(data);
				if(dataObj) {
					$(dataObj).each(function() {
						var option = $('<option />');
						option.attr('value', this.id_matkul).text(this.nama_matkul);           
						$("#matkul").append(option);
					});
				}
				else {
					$("#matkul").html('<option value="">Pilihan tidak ada</option>');
				}
			}
		}); 
	}
	else {
		$("#matkul").html('<option value="">Pilihan tidak adas</option>');
	}	
}

function get_sks() {
	var fakultas = $("#fakultas").val();
	var nip = $("#dosen").val();
	var prodi = $("#prodi").val();
	var matkul = $("#matkul").val();
    var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1] ;
	$.ajax({
		type: 'POST',
		url: `${base_url}/kemeng/sks`,
		data: { 
			'nip': nip,
			'fakultas': fakultas,
			'prodi': prodi,
			'matkul': matkul,
		},
		success: function(data){
			var dataObj = jQuery.parseJSON(data);
			if(dataObj) {
				$(dataObj).each(function() {
					$("#nama_dosen").val(this.nama);
					$("#indeks").val(this.indeks);
					$("#sks").val(this.sks);
				});
			}
		}
	}); 	
}

$(document).ready(function() {
	$('#dosen').change(get_fakultas);
    $('#fakultas').change(get_prodi);
	$('#prodi').change(get_matkul);
	$('#matkul').change(get_sks);
	
    $('#dosen').select2();
});