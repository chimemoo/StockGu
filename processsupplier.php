<?php

	include_once 'koneksi.php';

	$do = $_GET['do'];
	if($do == 'add')
	{
		$namasupplier 	= $_POST['namasupplier'];
		$kontaksupplier	= $_POST['kontaksupplier'];
		$alamat			= $_POST['alamat'];

		$query = mysqli_query($koneksi, "INSERT INTO m_supplier (supplier_name,supplier_contact,supplier_address) VALUES ('$namasupplier','$kontaksupplier','$alamat')") or die(mysqli_error($koneksi));

		if($query)
		{
			setcookie("sukses", "DATA BERHASIL DITAMBAHKAN!", time() + 5, "/");
			load();
		}
		else
		{
			echo 'GAGAL';
		}
	}

	elseif ($do == 'wantedit') {
		$id = $_GET['id'];
		$supplier = mysqli_query($koneksi,"SELECT * FROM m_supplier WHERE supplier_id='$id'");
		$data = mysqli_fetch_array($supplier);
		echo json_encode($data);

	}

	elseif ($do == 'edit') {
		$id = $_GET['id'];

		$namasupplier 	= $_POST['namasupplier'];
		$kontaksupplier	= $_POST['kontaksupplier'];
		$alamat			= $_POST['alamat'];

		$query = mysqli_query($koneksi, "UPDATE m_supplier SET supplier_name='$namasupplier', supplier_contact='$kontaksupplier', supplier_address='$alamat' WHERE supplier_id='$id'") or die(mysqli_error($koneksi));

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
		$query = mysqli_query($koneksi, "DELETE FROM m_supplier WHERE supplier_id='$id'") or die(mysqli_error($koneksi));
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
				window.location.replace("supplier.php");
			 </script>';
	}

?>

