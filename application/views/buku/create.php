<h1>Tambah Buku</h1>
<a href="<?php echo base_url().'index.php/buku'; ?>"><button class="btn btn-primary">Kembali ke List Buku</button></a>
<div class="container">
	<div class="box">
		<div class="box-body">
	        <div class="row">
	        	<form id="formInput" method="post">
	        	<table class="table" style="margin-top: 20px;width: 80%">	
		        	<tr>
		        		<td>Judul Buku</td>
						<td><input type="text" name="judul_buku" class="form-control" required></td>
					</tr>
					<tr>
		        		<td>Pengarang</td>
						<td><input type="text" name="pengarang" class="form-control" required></td>
					</tr>
					<tr>
		        		<td>Penerbit</td>
						<td><input type="text" name="penerbit" class="form-control" required></td>
					</tr>
					<tr>
		        		<td>Tahun Terbit</td>
						<td><input type="number" name="tahun_terbit" class="form-control" required></td>
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