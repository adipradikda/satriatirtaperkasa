<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Daily Report - Satria Tirta Perkasa</title>
        <?php $this->load->view('administrator/layouts/_css'); ?>

    </head>
    <body class="sb-nav-fixed">
        <?php $this->load->view('administrator/layouts/header'); ?>
        <div id="layoutSidenav">
        <?php $this->load->view('administrator/layouts/sidebar'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Satria Tirta Perkasa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Report WWTP PT KERRY CIKARANG</li>
                        </ol>
                        <!-- Button trigger modal -->
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Insert Data</span>
                                <select class="form-select">
                                    <option>Select Year</option>
                                    <?php
                                        foreach(range(2023, (int)date("Y")) as $year) {
                                            $selected = $year == $fyear ? ' selected' : '';
                                            echo "\t<option value='".$year."'".$selected.">".$year."</option>\n\r";
                                        }
                                    ?>
                                </select>
                                <select class="form-select">
                                    <option>Select Month</option>
                                    <?php
                                        foreach (arr_bulan() as $k => $v) {
                                            $selected = $k == $fmonth ? ' selected' : '';
                                            echo "\t<option value='".$k."'".$selected.">".$v."</option>\n\r";
                                        }
                                    ?>
                                </select>
                                <span class="input-group-text btn btn-primary">Search</span>
                            </div>
                        </div>
                        <?php if($this->session->flashdata('msg')){ ?>
                        <?php echo $this->session->flashdata('msg'); ?>
                        <?php } ?>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="<?php echo base_url('daily_report-simpan') ?>" enctype="multipart/form-data" method="POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Insert Data Improvment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card mb-4">
                            <h5 class="card-header">Tanggal</h5>
                            <div class="card-body">
                                <div class="mb-3">
                                  <input type="text" class="form-control" name="date" value="<?php echo date('d/m/Y') ?>" readonly>
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
                                    <span class="input-group-text bg-white" id="basic-addon2">TSP</span>
                                    <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="tsp">
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
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>  
                            <table class="table table-bordered" border="3" align="center">
                                <tr>
                                    <th class="align-middle text-center" colspan="3" rowspan="3">Aksi</th>
                                    <th class="align-middle text-center" rowspan="3">Date</th>
                                    <th class="align-middle text-center" colspan="6">Flowrate</th>
                                    <th class="align-middle text-center" colspan="4">Inlet/Outlet</th>
                                    <th class="align-middle text-center" colspan="7">Chemical</th>
                                    <th class="align-middle text-center" colspan="3" rowspan="2">MBBR</th>
                                    <th class="align-middle text-center" colspan="3" rowspan="2">Hasil Olahan Sludge</th>
                                    <th class="align-middle text-center" colspan="5" rowspan="2">Buang Limbah Di Sumpit</th>
                                    <th class="align-middle text-center" rowspan="3" >KETERANGAN</th>
                                </tr>
                                <tr>
                                    
                                    <th class="align-middle text-center" colspan="3">Total Flow Inlet</th>
                                    <th class="align-middle text-center" colspan="3">Total Flow Outlet</th>
                                    <th class="align-middle text-center" colspan="2">EQ</th>
                                    <th class="align-middle text-center" colspan="2">DAF 2</th>
                                    <th class="align-middle text-center">FeCL3</th>
                                    <th class="align-middle text-center">Anion</th>
                                    <th class="align-middle text-center">Cation</th>
                                    <th class="align-middle text-center">Coustik</th>
                                    <th class="align-middle text-center">Bakteri</th>
                                    <th class="align-middle text-center">TSP</th>
                                    <th class="align-middle text-center">Anti Foam</th>
                                </tr>
                                <tr>
                                    <th class="align-middle text-center">Awal</th>
                                    <th class="align-middle text-center">Akhir</th>
                                    <th class="align-middle text-center">Hasil Proses</th>
                                    <th class="align-middle text-center">Awal</th>
                                    <th class="align-middle text-center">Akhir</th>
                                    <th class="align-middle text-center">Hasil Proses</th>
                                    <th class="align-middle text-center">pH</th>
                                    <th class="align-middle text-center">TDS</th>
                                    <th class="align-middle text-center">pH</th>
                                    <th class="align-middle text-center">TDS</th>
                                    <th class="align-middle text-center">ml</th>
                                    <th class="align-middle text-center">kg</th>
                                    <th class="align-middle text-center">kg</th>
                                    <th class="align-middle text-center">liter</th>
                                    <th class="align-middle text-center">liter</th>
                                    <th class="align-middle text-center">liter</th>
                                    <th class="align-middle text-center">liter</th>
                                    <th class="align-middle text-center">pH</th>
                                    <th class="align-middle text-center">TDS</th>
                                    <th class="align-middle text-center">SV 30</th>
                                    <th class="align-middle text-center">Stok Karung</th>
                                    <th class="align-middle text-center">Karung SAK</th>
                                    <th class="align-middle text-center">Jumbo Bag</th>
                                    <th class="align-middle text-center">Angkut Mobil Limbah</th>
                                    <th class="align-middle text-center">Saos</th>
                                    <th class="align-middle text-center">Mayones</th>
                                    <th class="align-middle text-center">Keju</th>
                                    <th class="align-middle text-center">IBC</th>
                                </tr>
                                <?php foreach ($date_note as $k => $value ): ?>
                                    <tr>
                                        <td width="20px"><div class="btn btn-sm btn-info" data-id="<?php echo $value->id ?>"><i class="fa fa-eye"></i></div></td>
                                    <td width="20px"><div class="btn btn-sm btn-primary" data-id="<?php echo $value->id ?>"><i class="fa fa-edit"></i></div></td>
                                    <td width="20px"><div class="btn btn-sm btn-danger" data-id="<?php echo $value->id ?>"><i class="fa fa-trash"></i></div></td>
                                        <td style="min-width: 200px"><?php echo tgl_indo($value->tanggal); ?></td>
                                        <td><?php echo $value->awal_inlet; ?></td>
                                        <td><?php echo $value->akhir_inlet; ?></td>
                                        <td><?php echo $value->hasil_proses_m3_1; ?></td>
                                        <td><?php echo $value->awal_outlet; ?></td>
                                        <td><?php echo $value->akhir_outlet; ?></td>
                                        <td><?php echo $value->hasil_proses_m3_2; ?></td>
                                        <td><?php echo $value->ph_eq; ?></td>
                                        <td><?php echo $value->tds_eq; ?></td>
                                        <td><?php echo $value->ph_daf; ?></td>
                                        <td><?php echo $value->tds_daf; ?></td>
                                        <td><?php echo $value->fecl3; ?></td>
                                        <td><?php echo $value->anion; ?></td>
                                        <td><?php echo $value->cation; ?></td>
                                        <td><?php echo $value->coustik; ?></td>
                                        <td><?php echo $value->bakteri; ?></td>
                                        <td><?php echo $value->tsp; ?></td>
                                        <td><?php echo $value->antifoam; ?></td>
                                        <td><?php echo $value->ph; ?></td>
                                        <td><?php echo $value->tds; ?></td>
                                        <td><?php echo $value->sv_30; ?></td>
                                        <td><?php echo $value->stok_karung; ?></td>
                                        <td><?php echo $value->karung_sak; ?></td>
                                        <td><?php echo $value->jumbo_bag; ?></td>
                                        <td><?php echo $value->angkut_mobil_limbah; ?></td>
                                        <td><?php echo $value->saos; ?></td>
                                        <td><?php echo $value->mayones; ?></td>
                                        <td><?php echo $value->keju; ?></td>
                                        <td><?php echo $value->ibc; ?></td>
                                        <td><?php echo $value->catatan; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                    </div>
                </main>
        <?php $this->load->view('administrator/layouts/footer'); ?>
            </div>
        </div>
        <?php $this->load->view('administrator/layouts/_js'); ?>
        <div class="modal fade" id="ModalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form id="form-delete" action="<?php echo base_url('daily_report-delete'); ?>" method="post">
                    <input type="hidden" name="id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Apakah Yakin Ingin Mengahpus Data?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <script type="text/javascript">
                var base_url = "<?php echo base_url(); ?>";
                $('body').on('click','.table .btn-danger',function(){
                    var id=$(this).attr('data-id');
                    $('#form-delete').find('input[name="id"]').val(id)
                    $('#ModalDelete').modal('show');
                })
                
                // $('body').on('click','.table .btn-primary',function(){
                //     var id=$(this).attr('data-id');
                //     $.ajax({
                //       url: base_url+"improvment-edit",
                //       method:'post',
                //       data:{
                //         id:id
                //       },
                //       dataType: "json"
                //     }).done(function(res) {

                //         var data = res.data;
                //         $('#editModal').find('input[name="id"]').val(data.id);
                //         $('#editModal').find('input[name="judul"]').val(data.judul);
                //         $('#editModal').find('textarea[name="keterangan"]').val(data.keterangan);
                //         $('#editModal').find('select[name="status"]').val(data.status).trigger('change');
                //         $('#editModal').modal('show');
                //     });
                // })
            </script>
    </body>
</html>
