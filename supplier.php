<?php
	include_once 'koneksi.php';
	if(isset($_COOKIE['sukses']))
	{
		echo '<script type="text/javascript">
			alert('.$_COOKIE["sukses"].')
			</script>';
	}
	$supplier 	= mysqli_query($koneksi,"SELECT * FROM m_supplier");

?>
<!DOCTYPE html>
<html>
	<head>
		<title>StockGudang | Supplier - Kelola gudang barang anda dengan cepat</title>
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
		      		<li class="nav-item active">
		        		<a class="nav-link" href="supplier.php">Daftar Supplier <span class="sr-only">(current)</span></a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="barang.php">Daftar Barang</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="mutasi.php">Mutasi Barang</a>
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
			      <th scope="col">Nama Supplier</th>
			      <th scope="col">Kontak</th>
			      <th scope="col">Alamat</th>
			      <th scope="col">Action <a type="button" class="btn btn-sm ml-2" href="javascript:void(0)" onclick="modal_supplier()" style="background-color: #CD853F"><i class="fa fa-plus" style="color: #fff"></i></a></th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $no=1; foreach($supplier as $datasupplier) { ?>
			    <tr>
			      <th scope="row"><?php echo $no; ?></th>
			      <td><?php echo $datasupplier['supplier_name']; ?></td>
			      <td><?php echo $datasupplier['supplier_contact']; ?></td>
			      <td><?php echo $datasupplier['supplier_address']; ?></td>
			      <td>
			      	<a href="javascript:void(0)" onclick="edit_supplier('<?php echo $datasupplier['supplier_id']?>')" class="btn btn-sm bg-warning" title="Edit"><i class="fa fa-pencil" style="color: #fff"></i></a>
			      	<a href="processsupplier.php?do=delete&id=<?php echo $datasupplier['supplier_id']?>" class="btn btn-sm bg-danger" title="Hapus!"><i class="fa fa-trash" style="color: #fff"></i></a>
			      </td>
			    </tr>
			    <?php $no++; } ?>
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
		        <h5 class="modal-title" id="formjudul">Tambah Supplier</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="processsupplier.php?do=add" method="POST">
		        	<div class="form-group row">
		        		<label for="namasupplier" class="col-sm-4 col-form-label">Nama Supplier</label>
		        		<div class="col-sm-8">
		        			<input type="text" class="form-control" placeholder="Nama Supplier" id="namasupplier" name="namasupplier">
		        		</div>
		        	</div>
		        	<div class="form-group row">
		        		<label for="kontaksupplier" class="col-sm-4 col-form-label">Kontak</label>
		        		<div class="col-sm-8">
		        			<input type="text" class="form-control" placeholder="Kontak Supplier" id="kontaksupplier" name="kontaksupplier">
		        		</div>
		        	</div>
		        	<div class="form-group row">
		        		<label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
		        		<div class="col-sm-8">
		        			<textarea name="alamat" id="alamat" class="form-control"></textarea>
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