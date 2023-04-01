<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="
				<?php echo base_url('daily_report-simpan-edit') ?>" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Daily Report</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card mb-4">
            <h5 class="card-header">Tanggal</h5>
            <div class="card-body">
              <div class="mb-3">
                <input type="text" class="form-control" name="date" value="
										<?php echo date('d/m/Y') ?>" readonly>
              </div>
            </div>
          </div>
          <div class="card mb-4">
            <h5 class="card-header">Flow Rate</h5>
            <div class="card-body">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Total Flow Inlet</label>
                <input type="text" class="form-control mb-2" placeholder="Awal" name="awal">
                <input type="text" class="form-control mb-2" placeholder="Akhir" name="akhir">
                <input type="text" class="form-control" placeholder="Hasil Proses M3" name="proses">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Total Flow Outlet</label>
                <input type="text" class="form-control mb-2" placeholder="Awal" name="awal_1">
                <input type="text" class="form-control mb-2" placeholder="Akhir" name="akhir_1">
                <input type="text" class="form-control" placeholder="Hasil Proses M3" name="proses_1">
              </div>
            </div>
          </div>
          <div class="card mb-4">
            <h5 class="card-header">Inlet EQ</h5>
            <div class="card-body">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="ph">
                <label for="floatingInput">pH</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="tds">
                <label for="floatingInput">TDS</label>
              </div>
            </div>
          </div>
          <div class="card mb-4">
            <h5 class="card-header">Outlet DAF2</h5>
            <div class="card-body">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="ph_1">
                <label for="floatingInput">pH</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="tds_1">
                <label for="floatingInput">TDS</label>
              </div>
            </div>
          </div>
          <div class="card mb-4">
            <h5 class="card-header">Chemical</h5>
            <div class="card-body">
              <div class="input-group mb-3">
                <span class="input-group-text bg-white" id="basic-addon2">FeCL3</span>
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="fecl3">
                <span class="input-group-text" id="basic-addon2">ml</span>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text bg-white" id="basic-addon2">Anion</span>
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="anion">
                <span class="input-group-text" id="basic-addon2">Kg</span>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text bg-white" id="basic-addon2">Cation</span>
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="cation">
                <span class="input-group-text" id="basic-addon2">Kg</span>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text bg-white" id="basic-addon2">Coustik</span>
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="coustik">
                <span class="input-group-text" id="basic-addon2">Liter</span>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text bg-white" id="basic-addon2">Bakteri</span>
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="bakteri">
                <span class="input-group-text" id="basic-addon2">Liter</span>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text bg-white" id="basic-addon2">Antifoam</span>
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="antifoam">
                <span class="input-group-text" id="basic-addon2">Liter</span>
              </div>
            </div>
          </div>
          <div class="card mb-4">
            <h5 class="card-header">MBBR</h5>
            <div class="card-body">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="ph_2">
                <label for="floatingInput">pH</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="tds_2">
                <label for="floatingInput">TDS</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="sv30">
                <label for="floatingInput">SV 30 (cm)</label>
              </div>
            </div>
          </div>
          <div class="card mb-4">
            <h5 class="card-header">STOK KARUNG</h5>
            <div class="card-body">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="stok">
                <label for="floatingInput">Stok karung</label>
              </div>
            </div>
          </div>
          <div class="card mb-4">
            <h5 class="card-header">Hasil Olahan Sludge</h5>
            <div class="card-body">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="karung">
                <label for="floatingInput">Karung Sak</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="jumbo">
                <label for="floatingInput">Jumbo Bag</label>
              </div>
            </div>
          </div>
          <div class="card mb-4">
            <h5 class="card-header">ANGKUT MOBIL LIMBAH</h5>
            <div class="card-body">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="angkut">
                <label for="floatingInput">Angkut Mobil limbah</label>
              </div>
            </div>
          </div>
          <div class="card mb-4">
            <h5 class="card-header">BUANG LIMBAH DI STUMPIT</h5>
            <div class="card-body">
              <div class="form-floating mb-2">
                <input type="text" class="form-control" id="floatingInput" name="saos">
                <label for="floatingInput">Saos</label>
              </div>
              <div class="form-floating mb-2">
                <input type="text" class="form-control" id="floatingInput" name="mayones">
                <label for="floatingInput">Mayones</label>
              </div>
              <div class="form-floating mb-2">
                <input type="text" class="form-control" id="floatingInput" name="keju">
                <label for="floatingInput">Keju</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="ibc">
                <label for="floatingInput">IBC</label>
              </div>
            </div>
          </div>
          <div class="card mb-4">
            <h5 class="card-header">ACTIVITY DAN PREVENTIF MAINTENANCE</h5>
            <div class="card-body">
              <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="keterangan"></textarea>
                <label for="floatingTextarea2">Keterangan</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
      </form>
    </div>
  </div>
</div>