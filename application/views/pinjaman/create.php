<h1>Buat Pinjaman</h1>
<a href="<?php echo base_url().'index.php/pinjaman'; ?>"><button class="btn btn-primary">Kembali ke List Pinjaman</button></a>
<div class="container">
	<div class="box">
		<div class="box-body">
	        <div class="row">
	        	<form id="formInput" method="post">
	        	<table class="table" style="margin-top: 20px;width: 80%">	
		        	<tr>
		        		<td>Nama Anggota</td>
						<td>
							<select name="kd_anggota" class="form-control">
								<option selected hidden disabled value="">Pilih anggota</option>
								<?php foreach ($anggota as $val): ?>
									<option value="<?php echo $val['kd_anggota']; ?>"><?php echo $val['nama']; ?></option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr>
		        		<td>Nama Petugas</td>
						<td>
							<select name="kd_petugas" class="form-control">					
								<?php foreach ($petugas as $val): ?>
									<option selected value="<?php echo $val['kd_petugas']; ?>"><?php echo $val['nama']; ?></option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr>
		        		<td>Judul Buku</td>
						<td>
							<?php foreach ($buku as $val): ?>								
								<input type="checkbox" name="buku[]" value="<?php echo $val['kd_register']; ?>"> <?php echo $val['judul_buku']; ?>
							<?php endforeach; ?>
						</td>
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