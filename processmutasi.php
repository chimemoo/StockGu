<?php

	include_once 'koneksi.php';
	
	$do = $_GET['do'];
	if($do == 'wantadd')
	{
		$id = $_GET['id'];

		$barang 	= mysqli_query($koneksi,"SELECT * FROM m_item WHERE item_id='$id'");

		if($barang)
		{
			$data = mysqli_fetch_array($barang);

			echo json_encode($data);
		}
		else
		{
			echo 'GAGAL';
		}
	}

	elseif ($do == 'add') {
		$id = $_GET['id'];

		$barang 	= mysqli_query($koneksi,"SELECT * FROM m_item WHERE item_id='$id'");
		$databarang = mysqli_fetch_array($barang);

		$tanggalmutasi		= $_POST['tanggalmutasi'];
		$mutasiquantity		= $_POST['mutasiquantity'];
		$harga 				= $databarang['item_price'] * $mutasiquantity;
		$quantity = $databarang['item_quantity'] - $mutasiquantity;

		$mutasi = mysqli_query($koneksi, "INSERT INTO m_mutasi (mutasi_item_id,mutasi_date,mutasi_quantity,mutasi_price) VALUES ('$id','$tanggalmutasi','$mutasiquantity','$harga')");

		if($mutasi)
		{
			$quantityupdate = mysqli_query($koneksi,"UPDATE m_item SET item_quantity='$quantity' WHERE item_id='$id'
				");
			if($quantityupdate)
			{
				setcookie("sukses", "DATA BERHASIL DITAMBAHKAN!", time() + 10, "/");
				load();
				
			}
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