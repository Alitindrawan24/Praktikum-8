<h1>Edit Pinjaman</h1>
<a href="<?php echo base_url().'index.php/pinjaman'; ?>"><button class="btn btn-primary">Kembali ke List Pinjaman</button></a>
<div class="container">
	<div class="box">
		<div class="box-body">
	        <div class="row">
	        	<form id="formUpdate" method="post">
	        	<table class="table" style="margin-top: 20px;width: 80%">	
	        		<?php foreach ($pinjaman as $val): ?>
	        			<input type="hidden" name="kd_pinjam" value="<?php echo $val['kd_pinjam']; ?>">
		        	<tr>
		        		<td>Nama Anggota</td>
						<td>
							<?php echo $val['nama1']; ?>
						</td>
					</tr>
					<tr>
		        		<td>Nama Petugas</td>
						<td>
							<?php echo $val['nama2']; ?>
						</td>
					</tr>
					<?php foreach ($buku as $val): ?>	
					<tr>
		        		<td>Judul Buku</td>
						<td>
								<?php echo $val['judul_buku']; ?>							
						</td>
					</tr>
					<tr>
						<td>Tanggal Pinjam</td>
						<td><?php echo $val['tgl_pinjam']; ?></td>
					</tr>
					<tr>
						<td>Tanggal Kembali</td>
						<td>
							<input type="date" name="tgl_kembali[]" value="<?php echo $val['tgl_kembali']; ?>">
						</td>
					</tr>
					<?php endforeach; ?>
					<?php endforeach; ?>
					<tr>
						<td align="center" colspan="2">
							<button type="submit" class="btn btn-success">Simpan</button>
						</td>
					</tr>
				</table>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
 $(function() {
    $("#formUpdate").submit(function(e){
      dataForm = $(this).serializeArray();
      $.ajax({
        method : 'POST',
        url : '<?php echo base_url().'index.php/pinjaman/update'; ?>',
        data : dataForm,
        success : function(data){
            alert(data);            
        }        
      })
      e.preventDefault();
    });
});
 </script>