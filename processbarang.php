<?php

	include_once 'koneksi.php';

	$do = $_GET['do'];
	if($do == 'add')
	{
		$kodebarang = $_POST['kodebarang'];
		$namabarang = $_POST['namabarang'];
		$quantity	= $_POST['quantity'];
		$harga		= $_POST['harga'];
		$supplier	= $_POST['supplier'];

		$query = mysqli_query($koneksi, "INSERT INTO m_item (item_code,item_name,item_quantity,item_price,item_supplier_id) VALUES ('$kodebarang','$namabarang','$quantity','$harga','$supplier')") or die(mysqli_error($koneksi));

		if($query)
		{
			setcookie("sukses", "DATA BERHASIL DITAMBAHKAN!", time() + 10, "/");
			load();
		}
		else
		{
			echo 'GAGAL';
		}
	}

	elseif ($do == 'wantedit') {
		$id = $_GET['id'];
		$barang 	= mysqli_query($koneksi,"SELECT * FROM m_item WHERE item_id='$id'");
		$data = mysqli_fetch_array($barang);
		echo json_encode($data);

	}

	elseif ($do == 'edit') {
		$id = $_GET['id'];

		$kodebarang = $_POST['kodebarang'];
		$namabarang = $_POST['namabarang'];
		$quantity	= $_POST['quantity'];
		$harga		= $_POST['harga'];
		$supplier	= $_POST['supplier'];

		$query = mysqli_query($koneksi, "UPDATE m_item SET item_code='$kodebarang', item_name='$namabarang', item_quantity='$quantity', item_price='$harga', item_supplier_id='$supplier' WHERE item_id='$id'") or die(mysqli_error($koneksi));

		if($query)
		{
			setcookie("sukses", "DATA BERHASIL DI EDIT!", time() + 10, "/");
			load();
		}
		else
		{
			echo 'GAGAL';
		}
	}

	elseif ($do = 'delete') {
		$id = $_GET['id'];
		$query = mysqli_query($koneksi, "DELETE FROM m_item WHERE item_id='$id'") or die(mysqli_error($koneksi));
		if($query)
		{
			setcookie("sukses", "DATA BERHASIL DIHAPUS!", time() + 10, "/");
			load();
		}
		else
		{
			echo 'GAGAL';
		}
	}

	function load(){

		echo '<script type="text/javascript">
				window.location.replace("barang.php");
			 </script>';
	}

?>