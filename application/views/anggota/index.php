<h1>List Anggota</h1>
<a href="anggota/create"><button class="btn btn-success">Tambah Anggota</button></a>
<div class="container">
	<table class="table table-hover table-bordered" style="margin:10px;width: 80%">
		<thead>
			<tr>
				<td>Nama Anggota</td>
				<td>Prodi</td>
				<td>Jenjang</td>
				<td>Alamat</td>
				<td>Aksi</td>
			</tr>
		</thead>
		<tbody>
		<?php foreach($anggota as $val): ?>
			<tr>
				<td><?php echo $val['nama']; ?></td>
				<td><?php echo $val['prodi']; ?></td>
				<td><?php echo $val['jenjang']; ?></td>
				<td><?php echo $val['alamat']; ?></td>
				<td>
					<a href="anggota/edit/<?php echo $val['kd_anggota']; ?>"><button class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</button></a>
					<a href="anggota/destroy/<?php echo $val['kd_anggota']; ?>"><button class="btn btn-xs btn-danger"><i class="fa fa-thrash"></i> Hapus</button></a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>