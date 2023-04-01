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
                        <form id="form-filter" action="<?php echo base_url('daily_report'); ?>" method="GET">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Insert Data</span>
                                    <select class="form-select filter" name="tahun">
                                        <?php
                                            foreach(range(2000, (int)date("Y")) as $year) {
                                                $selected = $year == $fyear ? ' selected' : '';
                                                echo "\t<option value='".$year."'".$selected.">".$year."</option>\n\r";
                                            }
                                        ?>
                                    </select>
                                    <select class="form-select filter" name="bulan">
                                        <?php
                                            foreach (arr_bulan() as $k => $v) {
                                                $selected = $k == $fmonth ? ' selected' : '';
                                                echo "\t<option value='".$k."'".$selected.">".$v."</option>\n\r";
                                            }
                                        ?>
                                    </select>
                                    <span class="input-group-text btn btn-primary d-none">Search</span>
                                    <span class="input-group-text btn btn-success"><a class="text-white text-decoration-none d-print" href="#" data-src="<?php echo base_url('daily_report-print') ?>">
                                      Print PDF <i class="fas fa-print"></i>
                                    </a></span>
                                    
                                </div>
                            </div>
                        </form>
                        <?php if($this->session->flashdata('msg')){ ?>
                        <?php echo $this->session->flashdata('msg'); ?>
                        <?php } ?>

                            <?php $this->load->view($view_dir.'tambah'); ?>
                            <div class="table-responsive min-vh-100">    
                                <table class="table table-bordered" border="3" align="center">
                                    <thead style="position: sticky;top: 0">
                                        <tr>
                                            <th class="align-middle text-center" colspan="2" rowspan="3">Aksi</th>
                                            <th class="align-middle text-center" rowspan="3">Date</th>
                                            <th class="align-middle text-center" rowspan="3">Shift</th>
                                            <th class="align-middle text-center" colspan="6">Flowrate</th>
                                            <th class="align-middle text-center" colspan="4">Inlet/Outlet</th>
                                            <th class="align-middle text-center" colspan="6">Chemical</th>
                                            <th class="align-middle text-center" colspan="3" rowspan="2">MBBR</th>
                                            <th class="align-middle text-center" colspan="3" rowspan="2">Hasil Olahan Sludge</th>
                                            <th class="align-middle text-center" colspan="5" rowspan="2">Buang Limbah Di Sumpit</th>
                                            <th class="align-middle text-center" rowspan="2" colspan="3">KETERANGAN</th>
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
                                    </thead>
                                    <?php 
                                    $temp_tanggal = '';
                                    foreach ($date_note as $k => $value ): 
                                        $td_tanggal = '';
                                        if($value->tanggal != $temp_tanggal){
                                            $temp_tanggal = $value->tanggal;
                                            $td_tanggal = '<td class="align-middle text-center" rowspan="'.$value->count_tanggal.'" style="min-width: 200px">'.tgl_indo($value->tanggal).'</td>';
                                        }
                                    ?>
                                        <tr>
                                        <td width="20px"><div class="btn btn-sm btn-primary" data-id="<?php echo $value->id ?>"><i class="fa fa-edit"></i></div></td>
                                        <td width="20px"><div class="btn btn-sm btn-danger" data-id="<?php echo $value->id ?>"><i class="fa fa-trash"></i></div></td>
                                            
                                            <?php echo $td_tanggal; ?>
                                            <td><?php echo $value->shift; ?></td>
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
            <?php $this->load->view($view_dir.'edit'); ?>
            <script type="text/javascript">
                var base_url = "<?php echo base_url(); ?>";
                $('body').on('click','.table .btn-danger',function(){
                    var id=$(this).attr('data-id');
                    $('#form-delete').find('input[name="id"]').val(id)
                    $('#ModalDelete').modal('show');
                })
                
                $('body').on('click','.table .btn-primary',function(){
                    var id=$(this).attr('data-id');
                    $.ajax({
                      url: base_url+"daily_report-edit",
                      method:'post',
                      data:{
                        id:id
                      },
                      dataType: "json"
                    }).done(function(res) {

                        var data = res.data;
                        $('#editModal').find('input[name="id"]').val(data.id);
                        $('#editModal').find('input[name="date"]').val(data.tanggal);
                        $('#editModal').find('input[name="shift"]').val(data.shift);
                        $('#editModal').find('input[name="awal"]').val(data.awal_inlet);
                        $('#editModal').find('input[name="akhir"]').val(data.awal_inlet);
                        $('#editModal').find('input[name="proses"]').val(data.hasil_proses_m3_1);
                        $('#editModal').find('input[name="awal_1"]').val(data.akhir_inlet);
                        $('#editModal').find('input[name="akhir_1"]').val(data.akhir_inlet);
                        $('#editModal').find('input[name="proses_1"]').val(data.hasil_proses_m3_2);
                        $('#editModal').find('input[name="ph"]').val(data.ph_eq);
                        $('#editModal').find('input[name="tds"]').val(data.tds_eq);
                        $('#editModal').find('input[name="ph_1"]').val(data.ph_daf);
                        $('#editModal').find('input[name="tds_1"]').val(data.tds_daf);
                        $('#editModal').find('input[name="FeCL3"]').val(data.fecl3);
                        $('#editModal').find('input[name="anion"]').val(data.anion);
                        $('#editModal').find('input[name="cation"]').val(data.cation);
                        $('#editModal').find('input[name="coustik"]').val(data.coustik);
                        $('#editModal').find('input[name="bakteri"]').val(data.bakteri);
                        $('#editModal').find('input[name="antifoam"]').val(data.antifoam);
                        $('#editModal').find('input[name="ph_2"]').val(data.ph);
                        $('#editModal').find('input[name="tds_2"]').val(data.tds);
                        $('#editModal').find('input[name="sv30"]').val(data.sv_30);
                        $('#editModal').find('input[name="stok"]').val(data.stok_karung);
                        $('#editModal').find('input[name="karung"]').val(data.karung_sak);
                        $('#editModal').find('input[name="jumbo"]').val(data.jumbo_bag);
                        $('#editModal').find('input[name="angkut"]').val(data.angkut_mobil_limbah);
                        $('#editModal').find('input[name="saos"]').val(data.saos);
                        $('#editModal').find('input[name="mayones"]').val(data.mayones);
                        $('#editModal').find('input[name="keju"]').val(data.keju);
                        $('#editModal').find('input[name="ibc"]').val(data.ibc);
                        $('#editModal').find('textarea[name="keterangan"]').val(data.catatan);

                        $('#editModal').modal('show');
                    });
                })

                $('.filter').on('change',function(){
                    $('#form-filter').submit();
                })
                $('body').on('click','.d-print',function(){
                    var href = $(this).attr('data-src');
                    var tahun = $('select[name="tahun"] option:selected').val();
                    var bulan = $('select[name="bulan"] option:selected').val();
                    href += "?tahun="+tahun+"&bulan="+bulan;
                    window.open(href, '_blank');
                })
            </script>
    </body>
</html>
