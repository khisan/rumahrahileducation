<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Guru</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="feather icon-users"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('siswa'); ?>">Siswa</a></li>
                    <li class="breadcrumb-item"><a href="#!">Guru</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row pengajar-isi">
    <!-- [ static-layout ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header text-center">
                <h3 class="text-primary"><strong>Guru yang di ikuti</strong></h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <div class="float-right">
                            <a href="<?= site_url('siswa'); ?>" class="btn btn-warning btn-flat">
                                <i class="fa fa-undo"></i> Back</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <h5>Nama Siswa : </h5>
                        <p><?= $siswa->nama; ?></p>
                        <h5>Kelas : </h5>
                        <p>Kelas <?= $siswa->kelas_id; ?></p>
                        <h5>Sekolah : </h5>
                        <p><?= $siswa->sekolah; ?></p>
                        <h5>Email : </h5>
                        <p><?= $siswa->email; ?></p>
                    </div>
                    <div class="col-sm-6">
                        <?= $siswa->image != null ? '<img src="' . site_url('uploads/siswa/') . $siswa->image . '" alt="" class="img-thumbnail rounded float-right" width="250px">' : '<img src="' . site_url('assets/able/assets/images/') . 'default.png" alt="" class="img-thumbnail rounded float-right" width="250px">'; ?>
                    </div>
                </div>
                <hr>
                <div class="float-right mb-3">
                    <button type="button" class="btn btn-primary has-ripple" id="pengajarAdd"><i class="feather mr-2 icon-plus"></i>Tambah Data<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>id</th>
                                <th>nama guru</th>
                                <th>mapel</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- [ static-layout ] end -->
</div>
<div class="modal fade bd-example-modal-xl" id="myModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title judul">pengajar</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="validation">

                </div>
                <form id="submitForm">
                    <input type="hidden" name="id_code_guru" id="id">
                    <input type="hidden" class="form-control" id="siswa_profile_id" name="siswa_profile_id" value="<?= $siswa->id_siswa_profile; ?>">

                    <div class="form-group fill">
                        <label for="id_guru">Id Guru</label>
                        <input type="text" class="form-control" id="id_guru" name="mapel_guru_id" placeholder="Silahkan Ketik Id Guru">
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary reset" id="reset">Reset</button>
                <button type="button" class="btn btn-success simpan" id="save">Submit</button>
                <button type="button" class="btn btn-danger tutup" id="close">Close</button>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        const site_url = "<?= site_url('pengajar/'); ?>";
        $('.pengajar-isi').on('click', '#pengajarAdd', function() {
            $('.judul').html('Tambah Guru');
            $('.simpan').html('Tambah Data');
            $('.simpan').attr('id', 'add');
            $("#myModal").modal('show');
            $('.validation').html(null);

        });

        $('#myModal').on('click', '.simpan', function() {
            let url = '';
            let datastring = $("#submitForm").serialize();

            if ($(this).attr('id') == 'add') {
                url = 'add';
            }
            $.ajax({
                type: "POST",
                url: site_url + url,
                data: datastring,
                dataType: "JSON",
                success: function(response) {
                    if (response >= 0) {
                        reloadTable();
                        $("#myModal").modal('hide');
                        $('#submitForm')[0].reset();
                        $('.validation').html(null);
                    } else {
                        $('.validation').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    ${response}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>`);
                    }
                }
            });
        });

        $('.pengajar-isi').on('click', '.delete', function() {
            let id = $(this).attr('value');

            console.log(id);

            swal({
                    title: "Apakah anda yakin?",
                    text: "data akan terkapus secara permanent!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: site_url + "delete",
                            data: {
                                id: id
                            },
                            dataType: "JSON",
                            success: function(response) {
                                reloadTable();
                                swal("Selamat, file berhasil di hapus!", {
                                    icon: "success",
                                });
                            }
                        });
                    } else {
                        swal("Data batal di hapus!");
                    }
                });
        });

        let table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= site_url('pengajar/getAjax/') . $siswa->id_siswa_profile; ?>',
                type: 'POST'
            },
            columnDefs: [{
                    targets: [-1],
                    className: 'text-center'
                },
                {
                    targets: [0, -2, -1],
                    orderable: false
                }
            ]
        });

        $('.tutup-modal').on('click', function() {
            $('#submitForm')[0].reset();
        });

        $('.tutup').on('click', function() {
            $('#submitForm')[0].reset();
            $("#myModal").modal('hide');
            $('.validation').html(null);
        });

        $('#myModal').on('click', '.reset', function() {
            $('#submitForm')[0].reset();
            $('.validation').html(null);
        });

        function reloadTable() {
            table.ajax.reload();
        }
    })
</script>