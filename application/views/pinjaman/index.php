<?php if($this->session->flashdata('message')): ?>
	<center><h4 style="color: green;"><?php echo $this->session->flashdata('message'); ?></h4></center>
<?php endif; ?>
<style type="text/css">
	.pgnt{
		cursor: pointer;
		padding: 10px;
	}

	.pgnt .active{
		background-color: cyan;		
	}

	.pgnt:hover{
		background-color: cyan;
	}
</style>
<h1>List Pinjaman</h1>
<a href="pinjaman/create"><button class="btn btn-success">Buat Pinjaman</button></a>
<div class="container">	
	<select id="hide" class="form-control" style="width: 10%; position: relative;margin-right: 800px" onchange="hide(this.value)">
		<option value="10" selected>10</option>
		<option value="25">25</option>
		<option value="50">50</option>
		<option value="100">100</option>
	</select>	
	<input type="text" name="search" class="form-control" style="width: 10%; position: relative; margin-left: 800px" placeholder="search" onkeyup="search(this.value)">
	<table class="table table-hover table-bordered" style="margin:10px;width: 80%">
		<thead>
			<tr>
				<td>Nama Anggota</td>
				<td>Nama Petugas</td>
				<td>Jumlah Buku</td>				
				<td>Aksi</td>
			</tr>
		</thead>
		<tbody>
		<?php $i = 1; ?>
		<?php foreach($pinjaman as $val): ?>			
			<tr class="num" id="<?php echo $i; ?>" style="<?php if($i>10) echo 'display: none'; ?> ">
				<td id="nama1_<?php echo $i; ?>"><?php echo $val['nama1']; ?></td>
				<td id="nama2_<?php echo $i; ?>"><?php echo $val['nama2']; ?></td>
				<td id="jum_<?php echo $i; ?>"><?php echo $val['jumlah_buku']; ?></td>
				<td>
					<a href="pinjaman/edit/<?php echo $val['kd_pinjam']; ?>"><button class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</button></a>
					<button onclick="hapus(<?php echo $val['kd_pinjam']; ?>)" class="btn btn-xs btn-danger"><i class="fa fa-thrash"></i> Hapus</button>
				</td>
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>
		</tbody>
	</table>
	<p id="info" style="text-align: left;">Showing <?php echo ($i-1); ?> data from <?php echo ($i-1); ?> data</p>

	<table border="1" class="table" style="width: 20%">
		<td class="pgnt">Previous</td>
		<div id="pagination">
		<?php for($j=1;$j<=ceil(($i-1)/10);$j++): ?>
			<?php if($j==1): ?>
				<td id="page_<?php echo $j; ?>" class="pgnt active" onclick="page(<?php echo $j; ?>)"><?php echo $j; ?></td>
			<?php else: ?>
				<td id="page_<?php echo $j; ?>" class="pgnt" onclick="page(<?php echo $j; ?>)"><?php echo $j; ?></td>
			<?php endif; ?>
		<?php endfor; ?>
		</div>
		<td class="pgnt">Next</td>
	</table>
</div>

<script type="text/javascript">
	function hide(num){
		$('.num').hide();
		for(var i=1;i<=num;i++){
			$('#'+i).show();
		}
		if(num < <?php echo ($i-1); ?>)
			$('#info').html('Showing '+num+' data from <?php echo ($i-1); ?> data')
		else
			$('#info').html('Showing <?php echo ($i-1); ?> data from <?php echo ($i-1); ?> data')
	}	

	function page(page){
		$('.num').hide();

		var num = $('#hide').val();

		pages = page;		
		end = (pages+1)*num;
		page = page*num;
		for(var i=page;i<=end-1;i++){
			//alert(i)
			$('#'+i).show();
		}

		if(num < <?php echo ($i-1); ?>)
			$('#info').html('Showing '+num+' data from <?php echo ($i-1); ?> data')
		else
			$('#info').html('Showing <?php echo ($i-1); ?> data from <?php echo ($i-1); ?> data')

		$('.pgnt').removeClass('active');
		$('#page_'+pages).addClass('active');

	}		

	function search(string){
		$('.num').hide();		
		var nums = $('#hide').val();		
		var count = 0;
		for(var i=1;i<=<?php echo ($i-1); ?>;i++){			
			var nama1 = $('#nama1_'+i).text();			
			var nama2 = $('#nama2_'+i).text();
			var num = $('#num_'+i).text();
			if(nama1.includes(string) || nama2.includes(string) || num.includes(string)){
				$('#'+i).show();
				count++;
			}			
		}
		if(nums > count)
			$('#info').html('Showing '+count+' data')
		else
			$('#info').html('Showing '+nums+' data from '+nums+' data')

		pagination(1);
	}

	function pagination($num){		
		$('#pagination').empty();
	}
</script>

<script type="text/javascript">	
	function hapus(id){
		$.ajax({
        method : 'POST',
        url : 'pinjaman/destroy/'+id,        
        success : function(data){        	
            alert(data);         
            //$('#example').DataTable().ajax.reload();   
        }
    })
}
 </script>