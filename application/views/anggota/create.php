<h1>Tambah Anggota</h1>
<a href="<?php echo base_url().'index.php/anggota'; ?>"><button class="btn btn-primary">Kembali ke List Anggota</button></a>
<div class="container">
	<div class="box">
		<div class="box-body">
	        <div class="row">
	        	<form id="formInput" method="post">
	        	<table class="table" style="margin-top: 20px;width: 80%">	
		        	<tr>
		        		<td>Nama Anggota</td>
						<td><input type="text" name="nama" class="form-control" required></td>
					</tr>
					<tr>
		        		<td>Prodi</td>
						<td><input type="text" name="prodi" class="form-control" required></td>
					</tr>
					<tr>
		        		<td>Jenjang</td>
						<td><input type="text" name="jenjang" class="form-control" required></td>
					</tr>
					<tr>
		        		<td>Alamat</td>
						<td><input type="text" name="alamat" class="form-control" required></td>
					</tr>
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
    $("#formInput").submit(function(e){
      dataForm = $(this).serializeArray();
      $.ajax({
        method : 'POST',
        url : 'store',
        data : dataForm,
        success : function(data){                      
            alert(data);
        }        
      })
      e.preventDefault();
    });
});
</script>