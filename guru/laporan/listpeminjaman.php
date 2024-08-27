<?php  
$list_pinjam = $peminjaman->tampil();

?>

<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">DAFTAR PEMINJAMAN BUKU</h1>
	</div><!-- /.container-fluid -->
</div>
<hr>


<div class="card">
	<div class="card-header">
		<h3 class="card-title">Daftar Transaksi Peminjaman Buku</h3>
	</div>

	<div class="card-body">
		<div class="table-responsive">


			<table class="table table-borderless table-striped table-earning table-hover" id="example1">
				<thead class="thead-dark">
					<tr>
						<th width="15px" class="text-center">No.</th>
						<th class="text-center">Nama Peminjam</th>
						<th class="text-center">Nomor Anggota</th>
						<th class="text-center">Nama Petugas</th>
						<th class="text-center">Judul Buku</th>
						<th class="text-center">Tanggal Peminjaman</th>
						<th class="text-center">Tanggal Pengembalian</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($list_pinjam as $key => $value):?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value['nama_anggota'] ?></td>
							<td><?php echo $value['nomor_anggota'] ?></td>
							<td><?php echo $value['nama_petugas'] ?></td>
							<td><?php echo $value['judul'] ?></td>
							<td><?php echo $value['tanggal_pinjam'] ?></td>
							<td><?php echo $value['tanggal_kembali'] ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>