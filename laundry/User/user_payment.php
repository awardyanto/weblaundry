<div class="modal fade" id="exampleModalUser_Order<?php echo $count1;?>" tabindex="-5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">
                             <div style="overflow-x:auto;">
        <label>Pilih Metode Pembayaran</label>
        <table border=0 cellpadding="15">
          <tr>

          </tr>
          <tr>
            <th><input type="radio" name="pembayaran"  value="cod"> <img src="images/cod.jpg" width="60px" height="30px"></th>
            <th><input type="radio" name="pembayaran"  value="saldo"> <img src="images/saldo.png" width="40px" height="30px"></th>
          </tr>
        </table>
      </div>
      <div class="form-group col-lg-12">
        <button class="btn btn-danger" data-dismiss="modal">Batal</button>
        <input type="submit" name="User_submit" class="btn btn-primary" value="Kirim">
    </form>
  </div>
