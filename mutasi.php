<?php

	include_once 'koneksi.php';
	if(isset($_COOKIE['sukses']))
	{
		echo '<script type="text/javascript">
			alert('.$_COOKIE["sukses"].')
			</script>';
	}
	$mutasi 	= mysqli_query($koneksi, "SELECT * FROM m_mutasi");
	$supplier 	= mysqli_query($koneksi,"SELECT * FROM m_supplier");
	$barang 	= mysqli_query($koneksi,"SELECT * FROM m_item");

?>
<!DOCTYPE html>
<html>
	<head>
		<title>StockGudang | Mutasi - Kelola gudang barang anda dengan cepat</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/fonts/css/font-awesome.min.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-white">
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  	</button>
		  	<a class="navbar-brand" href="#"><img src="assets/img/trolley.png" alt="" style="max-width: 35px;"></a>
		  	<div class="collapse navbar-collapse" id="navbar">
		    	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		      		<li class="nav-item">
		        		<a class="nav-link" href="index.php">Home</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="supplier.php">Daftar Supplier</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="barang.php">Daftar Barang</span></a>
		      		</li>
		      		<li class="nav-item active">
		        		<a class="nav-link" href="mutasi.php">Mutasi Barang <span class="sr-only">(current)</span></a>
		      		</li>
		    	</ul>
		  	</div>
		</nav>
		<br><br>
		<div class="container">
			<table class="table" style="border-top: #CD853F 4px solid;">
			  <thead class="thead">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Kode Barang</th>
			      <th scope="col">Tanggal Mutasi</th>
			      <th scope="col">Quantity</th>
			      <th scope="col">Harga</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $no=1; foreach($mutasi as $datamutasi) { ?>
			    <tr>
			      <th scope="row"><?php echo $no; ?></th>
			      <td><?php echo $datamutasi['mutasi_item_id']; ?></td>
			      <td><?php echo $datamutasi['mutasi_date']; ?></td>
			      <td id="tablequantity"><?php echo $datamutasi['mutasi_quantity']; ?></td>
			      <td><?php echo $datamutasi['mutasi_price']; ?></td>
			    </tr>
			    <?php $no++;} ?>
			  </tbody>
			</table>

		</div>

		<div class="container-fluid  fixed-bottom bg-light" style=" color: #999;">
			<div class="row">
				<div class="col-sm-12">
					<p align="center">&copy; Christ Memory</p>
				</div>
			</div>
		</div>

		<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="formjudul">Tambah Barang</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="processbarang.php?do=add" method="POST">
		        	<div class="form-group row">
		        		<label for="kodebarang" class="col-sm-4 col-form-label">Kode Barang</label>
		        		<div class="col-sm-8">
		        			<input type="text" class="form-control" placeholder="Kode Barang" id="kodebarang" name="kodebarang">
		        		</div>
		        	</div>
		        	<div class="form-group row">
		        		<label for="namabarang" class="col-sm-4 col-form-label">Nama Barang</label>
		        		<div class="col-sm-8">
		        			<input type="text" class="form-control" placeholder="Nama Barang" id="namabarang" name="namabarang">
		        		</div>
		        	</div>
		        	<div class="form-group row">
		        		<label for="quantity" class="col-sm-4 col-form-label">Quantity</label>
		        		<div class="col-sm-8">
		        			<input type="number" class="form-control" placeholder="Quantity" id="quantity" name="quantity">
		        		</div>
		        	</div>
		        	<div class="form-group row">
		        		<label for="harga" class="col-sm-4 col-form-label">Harga</label>
		        		<div class="col-sm-8">
		        			<input type="number" class="form-control" placeholder="harga" id="harga" name="harga">
		        		</div>
		        	</div>
		        	<div class="form-group row">
		        		<label for="supplier" class="col-sm-4 col-form-label">Supplier</label>
		        		<div class="col-sm-8">
		        			<select name="supplier" id="supplier" class="form-control">
		        				<?php
		        					foreach($supplier as $supplierdata){
		        						echo '<option value="'.$supplierdata['supplier_id'].'">'.$supplierdata['supplier_name'].'</option>';
		        					}
		        				?>
		        			</select>
		        		</div>
		        	</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save changes</button>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>

		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/popper.js"></script>
		<script src="assets/js/script.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>