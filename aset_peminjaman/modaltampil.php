<div id ="tampil" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class ="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Tampil Data Penyusutan Sesuai Tahun</h4>
    </div>
    <div class="modal-body">
    	<form action="datapenyusutan.php" method="post" target="_blank">
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
                    <td>
                        <div class="form-group"> Pilih Kelompok Aset</div>
                    </td>
                    <td align="center">
                    <div class="form-group">:</div>
                    </td>
                    <td>
                    <div class="form-group">
                    <select id="kel" class="form-control">
                    <option value="pilih" selected>-- Pilih Kelompok Inventaris --</option>
                    <option value="Barang">Barang</option>
                    <option value="Elektronik">Elektronik</option>  
                    <option value="Mesin">Mesin</option>
                    <option value="Kendaraan">Kendaraan</option> 
                    <option value="Gedung">Gedung</option>  
                    </select>
             </div>
            </td>
            </tr>

    		<tr>
    			<td></td>
    			<td></td>
    			<td>
    				<input onclick="tampil()" name="datapenyusutan" class="btn btn-primary btn-sm" value="Cetak">
    			</td>
    		</tr>
    		</table>
    	</form>
    </div>
   
    	</div>
    </div>
</div>