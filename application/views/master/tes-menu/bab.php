<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">bab WOI SENG IKI</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#!"><i class="fas fa-school"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url("Kelas/$jenjang->nama_jenjang"); ?>"><?= $jenjang->nama_jenjang; ?></a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url("mapel/$jenjang->nama_jenjang/$mapel->kelas_id"); ?>"><?= $kelas->nama_kelas; ?></a></li>
                    <li class="breadcrumb-item"><a href="#!"><?= $mapel->nama_mapel; ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row bab-isi">
    <!-- [ static-layout ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header text-center">
                <h3 class="text-primary"><strong><?= $kelas->id_kelas == 1 ? 'Subtema' : 'Bab'; ?></strong></h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-5">
                        <h1><?= $mapel->nama_mapel; ?></h1>
                    </div>
                    <div class="offset-sm-6 col-sm-1">
                        <div class="float-right">
                            <a href="<?= site_url("mapel/$jenjang->nama_jenjang/$mapel->kelas_id"); ?>" class="btn btn-warning btn-flat">
                                <i class="fa fa-undo"></i> Back</a>
                        </div>
                    </div>
                </div>
                <div class="float-right mb-3">
                    <button type="button" class="btn btn-primary has-ripple" id="babAdd"><i class="feather mr-2 icon-plus"></i>Tambah Data<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th><?= $kelas->id_kelas == 1 ? 'Subtema' : 'bab'; ?></th>
                                <th>Semester</th>
                                <th>Created</th>
                                <th>Updated</th>
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
                <h4 class="modal-title judul">bab</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="validation">

                </div>
                <form id="submitForm">
                    <input type="hidden" name="id_bab" id="id">
                    <input type="hidden" name="mapel_id" id="mapel" value="<?= $mapel->id_mapel; ?>">
                    <div class="form-group fill">
                        <label for="bab"><?= $kelas->id_kelas == 1 ? 'Subtema' : 'bab'; ?></label>
                        <input type="text" class="form-control" id="bab" name="nama_bab" placeholder="<?= $kelas->id_kelas == 1 ? 'Ketik Nama Subtema' : 'Ketik Nama bab'; ?>">
                    </div>
                    <div class="form-group fill">
                        <label for="bab">Semester</label>
                        <select name="semester" id="semester" class="form-control">
                            <option value="">-- Pilih Salah Satu --</option>
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                        </select>
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
        const site_url = "<?= site_url('bab/'); ?>";
        $('.bab-isi').on('click', '#babAdd', function() {
            $('.judul').html('Tambah <?= $kelas->id_kelas == 1 ? 'Subtema' : 'bab'; ?>');
            $('.simpan').html('Tambah Data');
            $('.simpan').attr('id', 'add');
            $("#myModal").modal('show');
            $('.validation').html(null);

        });

        $('.bab-isi').on('click', '.update', function() {
            $('.judul').html('Update <?= $kelas->id_kelas == 1 ? 'Subtema' : 'bab'; ?>');
            $('.simpan').html('Update Data');
            $('.simpan').attr('id', 'update');
            $("#myModal").modal('show');
            $('.validation').html(null);

            let id = $(this).attr('value');

            $.ajax({
                type: "GET",
                url: site_url + "get",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#id').val(response.id_bab);
                    $('#mapel').val(response.mapel_id);
                    $('#bab').val(response.nama_bab);
                    $('#semester').val(response.semester);
                }
            });

        });


        $('#myModal').on('click', '.simpan', function() {
            let url = '';
            let datastring = $("#submitForm").serialize();

            if ($(this).attr('id') == 'update') {
                url = 'update';
            } else if ($(this).attr('id') == 'add') {
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

        $('.bab-isi').on('click', '.delete', function() {
            let id = $(this).attr('value');



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
                url: '<?= site_url('bab/getAjax/') . $mapel->id_mapel; ?>',
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