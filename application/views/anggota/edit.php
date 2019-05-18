<h1>Edit Anggota</h1>
<a href="<?php echo base_url().'index.php/anggota'; ?>"><button class="btn btn-primary">Kembali ke List Anggota</button></a>
<div class="container">
	<div class="box">
		<div class="box-body">
	        <div class="row">
	        	<form id="formUpdate" method="post">
	        	<table class="table" style="margin-top: 20px;width: 80%">	
	        		<?php foreach ($buku as $buku): ?>
	        			<input type="hidden" name="kd_anggota" value="<?php echo $buku['kd_anggota']; ?>">
		        	<tr>
		        		<td>Nama Anggota</td>
						<td><input type="text" name="nama" class="form-control" required value="<?php echo $buku['nama']; ?>"></td> 
					</tr>
					<tr>
		        		<td>Prodi</td>
						<td><input type="text" name="prodi" class="form-control" required value="<?php echo $buku['prodi']; ?>"></td>
					</tr>
					<tr>
		        		<td>Jenjang</td>
						<td><input type="text" name="jenjang" class="form-control" required value="<?php echo $buku['jenjang']; ?>"></td>
					</tr>
					<tr>
		        		<td>Alamat</td>
						<td><input type="text" name="alamat" class="form-control" required value="<?php echo $buku['alamat']; ?>"></td>
					</tr>
					<tr>
						<td align="center" colspan="2">
							<button type="submit" class="btn btn-success">Simpan</button>
						</td>
					</tr>
					<?php endforeach; ?>
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
        url : '<?php echo base_url().'index.php/anggota/update'; ?>',
        data : dataForm,
        success : function(data){
            alert(data);            
        }        
      })
      e.preventDefault();
    });
});
 </script>