<?php if($this->session->flashdata('message')): ?>
	<center><h4 style="color: green;"><?php echo $this->session->flashdata('message'); ?></h4></center>
<?php endif; ?>
<h1>List Buku</h1>
<a href="buku/create"><button class="btn btn-success">Tambah Buku</button></a>
<div class="container">
	<table id="example" class="table table-hover table-bordered" style="margin:10px;width: 80%">
		<thead>
			<tr>
				<td>Judul Buku</td>
				<td>Pengarang</td>
				<td>Penerbit</td>
				<td>Tahun Terbit</td>
				<td>Aksi</td>
			</tr>
		</thead>
		<tbody>
		<?php foreach($buku as $val): ?>
			<tr>
				<td><?php echo $val['judul_buku']; ?></td>
				<td><?php echo $val['pengarang']; ?></td>
				<td><?php echo $val['penerbit']; ?></td>
				<td><?php echo $val['tahun_terbit']; ?></td>
				<td>
					<a href="buku/edit/<?php echo $val['kd_register']; ?>"><button class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</button></a>
					<button onclick="hapus(<?php echo $val['kd_register']; ?>)" class="btn btn-xs btn-danger"><i class="fa fa-thrash"></i> Hapus</button>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
    	$('#example').DataTable();
	});
</script>

<script type="text/javascript">
	function hapus(id){
		$.ajax({
        method : 'POST',
        url : 'buku/destroy/'+id,        
        success : function(data){        	
            alert(data);         
            //$('#example').DataTable().ajax.reload();   
        }
    })
}
 </script>