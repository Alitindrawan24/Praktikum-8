<h1>List Pinjaman</h1>
<a href="pinjaman/create"><button class="btn btn-success">Buat Pinjaman</button></a>
<div class="container">
	<table class="table table-hover table-bordered" style="margin:10px;width: 80%">
		<thead>
			<tr>
				<td>Nama Anggota</td>
				<td>Nama Petugas</td>
				<td>Judul Buku</td>
				<td>Tanggal Pinjam</td>
				<td>Tanggal Kembali</td>
				<td>Aksi</td>
			</tr>
		</thead>
		<tbody>
		<?php foreach($pinjaman as $val): ?>
			<tr>
				<td><?php echo $val['anggota.nama']; ?></td>
				<td><?php echo $val['petugas.nama']; ?></td>
				<td><?php echo $val['judul_buku']; ?></td>
				<td><?php echo $val['tgl_pinjam']; ?></td>
				<td><?php echo $val['tgl_kembali']; ?></td>
				<td>
					<a href="pinjaman/edit/<?php echo $val['id_pinjam']; ?>"><button class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</button></a>
					<a href="pinjaman/destroy/<?php echo $val['id_pinjam']; ?>"><button class="btn btn-xs btn-danger"><i class="fa fa-thrash"></i> Hapus</button></a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>