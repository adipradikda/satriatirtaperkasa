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
                            <li class="breadcrumb-item active">Improvment WWTP PT KERRY CIKARANG</li>
                        </ol>
                        <!-- Button trigger modal -->
                        <button type="button" class="mb-4 btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Insert Data
                        </button>
                        <?php if($this->session->flashdata('msg')){ ?>
                        <?php echo $this->session->flashdata('msg'); ?>
                        <?php } ?>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="<?php echo base_url('improvment-simpan') ?>" enctype="multipart/form-data" method="POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Insert Data Improvment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card mb-4">
                                            <h5 class="card-header">Judul</h5>
                                            <div class="card-body">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" name="judul" required>
                                                    <label for="floatingInput">Judul</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-4">
                                            <h5 class="card-header">Keterangan</h5>
                                            <div class="card-body">
                                                <div class="form-floating">
                                                  <textarea class="form-control" name="keterangan" id="floatingTextarea2" style="height: 100px"></textarea>
                                                  <label for="floatingTextarea2">Keterangan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-4">
                                            <h5 class="card-header">Gambar</h5>
                                            <div class="card-body">
                                                <input type="file" class="form-control" id="floatingInput" name="gambar">
                                                <div class="form-floating">
                                                    
                                                    <label for="floatingInput"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-4">
                                            <h5 class="card-header">Status</h5>
                                            <div class="card-body">
                                                <select class="form-select" aria-label="Default select example" name="status">
                                                  <option selected value="Aktif">Aktif</option>
                                                  <option value="Tidak Aktif">Tidak Aktif</option>
                                                </select>
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

                        <table class="table table striped table-hover table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Keterangan</th>
                                    <th>Gambar</th>
                                    <th>Status</th>
                                    <th colspan="3">Aksi</th>
                                </tr>

                                <?php foreach($improvment as $no => $value): ?>
                                <tr>
                                    <td><?php echo ($no+1); ?></td>
                                    <td><?php echo $value->judul; ?></td>
                                    <td><?php echo $value->keterangan; ?></td>   
                                    <td><img src="<?php echo base_url('assets/uploads/improvment/'.$value->gambar); ?>" width="250"></td>

                                    <td><?php echo $value->status; ?></td>
                                    <td width="20px"><div class="btn btn-sm btn-info" data-id="<?php echo $value->id ?>"><i class="fa fa-eye"></i></div></td>
                                    <td width="20px"><div class="btn btn-sm btn-primary" data-id="<?php echo $value->id ?>"><i class="fa fa-edit"></i></div></td>
                                    <td width="20px"><div class="btn btn-sm btn-danger" data-id="<?php echo $value->id ?>"><i class="fa fa-trash"></i></div></td>
                                </tr>
                                <?php endforeach; ?>
                                    

                            </table>
                    </div>
                </main>
        <?php $this->load->view('administrator/layouts/footer'); ?>
            </div>
        </div>
        <?php $this->load->view('administrator/layouts/_js'); ?>
        <!-- Modal -->
            <div class="modal fade" id="ModalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form id="form-delete" action="<?php echo base_url('improvment-delete'); ?>" method="post">
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
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="<?php echo base_url('improvment-simpan-edit') ?>" enctype="multipart/form-data" method="POST">
                                    <input type="hidden" name="id">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Improvment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card mb-4">
                                            <h5 class="card-header">Judul</h5>
                                            <div class="card-body">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" name="judul" required>
                                                    <label for="floatingInput">Judul</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-4">
                                            <h5 class="card-header">Keterangan</h5>
                                            <div class="card-body">
                                                <div class="form-floating">
                                                  <textarea class="form-control" name="keterangan" id="floatingTextarea2" style="height: 100px"></textarea>
                                                  <label for="floatingTextarea2">Keterangan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-4">
                                            <h5 class="card-header">Gambar</h5>
                                            <div class="card-body">
                                                <input type="file" class="form-control" id="floatingInput" name="gambar">
                                                <div class="form-floating">
                                                    
                                                    <label for="floatingInput"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-4">
                                            <h5 class="card-header">Status</h5>
                                            <div class="card-body">
                                                <select class="form-select" aria-label="Default select example" name="status">
                                                  <option selected value="Aktif">Aktif</option>
                                                  <option value="Tidak Aktif">Tidak Aktif</option>
                                                </select>
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
                      url: base_url+"improvment-edit",
                      method:'post',
                      data:{
                        id:id
                      },
                      dataType: "json"
                    }).done(function(res) {

                        var data = res.data;
                        $('#editModal').find('input[name="id"]').val(data.id);
                        $('#editModal').find('input[name="judul"]').val(data.judul);
                        $('#editModal').find('textarea[name="keterangan"]').val(data.keterangan);
                        $('#editModal').find('select[name="status"]').val(data.status).trigger('change');
                        $('#editModal').modal('show');
                    });
                })
            </script>
    </body>
</html>
