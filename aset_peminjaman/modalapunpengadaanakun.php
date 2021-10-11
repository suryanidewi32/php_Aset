<div id ="tampil" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class ="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Select by Year</h4>
    </div>
    <div class="modal-body">
    	<form action="lapunapprovepengadaanakun.php" method="post" target="_blank">
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
    				<input onclick="tampil()" name="dataunpengadaanakun" class="btn btn-primary btn-sm" value="Cetak">
    			</td>
    		</tr>
    		</table>
    	</form>
    </div>
   
    	</div>
    </div>
</div>