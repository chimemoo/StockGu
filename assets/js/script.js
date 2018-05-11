function mutasi_barang(id){
	$.ajax({
		url:"processmutasi.php?do=wantadd&id="+id,
		type:"GET",
		dataType:"JSON",
		success: function(data)
		{
			$('#formtitle').text('Mutasi Barang');
			$('[name="kodemutasibarang"]').val(data.item_id);
			$('[name="mutasiquantity"]').attr('max', data.item_quantity);
			$('#formmutasi').modal('show');
			$('#formmutasiform').attr('action', 'processmutasi.php?do=add&id='+id);
		}
	})
}


function modal_barang(){
	$('#formjudul').text('Tambah Barang');
	$('[name="kodebarang"]').val('');
	$('[name="namabarang"]').val('');
	$('[name="quantity"]').val('');
	$('[name="harga"]').val('');
	$('[name="supplier"]').val(1);
	$('#form').modal('show');
	$('#formbarang').attr('action', 'processbarang.php?do=add');
}

function modal_supplier(){
	$('#formjudul').text('Tambah Supplier');
	$('[name="namasupplier"]').val('');
	$('[name="kontaksupplier"]').val('');
	$('[name="alamat"]').val('');
	$('#form').modal('show');
	$('form').attr('action', 'processsupplier.php?do=add');

}

function edit_barang(id){
	$.ajax({
		url:"processbarang.php?do=wantedit&id="+id,
		type:"GET",
		dataType:"JSON",
		success: function(data)
		{
			$('#formjudul').text('Edit Barang');
			$('[name="kodebarang"]').val(data.item_code);
			$('[name="namabarang"]').val(data.item_name);
			$('[name="quantity"]').val(data.item_quantity);
			$('[name="harga"]').val(data.item_price);
			$('[name="supplier"]').val(data.item_supplier_id);
			$('#form').modal('show');
			$('#formbarang').attr('action', 'processbarang.php?do=edit&id='+id);
		}
	})
}
$('#formjudul').text('Tambah Barang');

function edit_supplier(id){
	$.ajax({
		url:"processsupplier.php?do=wantedit&id="+id,
		type:"GET",
		dataType:"JSON",
		success: function(data)
		{
			$('#formjudul').text('Edit Supplier');
			$('[name="namasupplier"]').val(data.supplier_name);
			$('[name="kontaksupplier"]').val(data.supplier_contact);
			$('[name="alamat"]').val(data.supplier_address);
			$('#form').modal('show');
			$('form').attr('action', 'processsupplier.php?do=edit&id='+id);
		}
	})
}



