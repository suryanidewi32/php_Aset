<div id ="cetakpdf" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class ="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Cetak PDF</h4>
    </div>
    <div class="modal-body">
    	<form action="cetakpeminjaman.php" method="post" target="_blank">
    		<table>
    			<tr>
    				<td>
    					<div class="form-group"> Dari Tanggal</div>
    				</td>
    				<td align="center" width="5%">
    				<div class="form-group">:</div>
    				</td>
    				<td>
    				<div class="form-group">
    				<input type="date" class="form-control" id="tgl_a" required> 
    			</div>
    		</td>
    		</tr>

    		<tr>
    				<td>
    					<div class="form-group"> sampai Tanggal</div>
    				</td>
    				<td align="center">
    				<div class="form-group">:</div>
    				</td>
    				<td>
    				<div class="form-group">
    				<input type="date" class="form-control" id="tgl_b" required> 
    			</div>
    		</td>
    		</tr>

    		<tr>
    			<td></td>
    			<td></td>
    			<td>
    			
                    <input onclick="cetakpdf()" name="cetakpeminjaman" class="btn btn-primary btn-sm" value="Cetak dari Tanggal" readonly="">
                
    			</td>
    		</tr>
    		</table>
    	</form>
    </div>
    <div class ="modal-footer">
    	<a href="cetakpeminjaman.php" targer="_blank" class="btn btn-primary btn-sm"> Cetak Semua Data</a>
    	<div>
    	</div>
    </div>
</div>