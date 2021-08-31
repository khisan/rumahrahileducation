<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="m-b-10">Video</h5>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row video-isi">
  <!-- [ static-layout ] start -->
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header text-center">
        <h3 class="text-primary">Video Online</strong></h3>
      </div>
      <?php if ($jenjang->id_jenjang == 3) { ?>
        <div class="card-body">
            <form>
              <div class="row">
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenjang</label>
                    <div class="form-control">
                      <label for="exampleFormControlSelect1"><?= $jenjang->nama_jenjang ?></label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Kelas</label>
                    <div class="form-control">
                      <label for="exampleFormControlSelect1"><?= $kelas->nama_kelas ?></label>
                      <input type="hidden" id="kelas" value="<?= $kelas->id_kelas ?>">
                    </div>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Jurusan</label>
                    <div class="form-control">
                      <label for="exampleFormControlSelect1"><?= $kelas->jurusan ?></label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Mapel</label>
                    <select class="form-control babChange" id="mapel" name="mapel">
                      <option selected value="">Pilih Mapel</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Semester</label>
                    <select class="form-control babChange" id="semester">
                      <option value="">Pilih Semester</option>
                      <option value="1">Semester 1</option>
                      <option value="2">Semester 2</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Bab</label>
                    <select class="form-control" id="bab">
                      <option selected value="">Pilih Bab</option>
                    </select>
                  </div>
                </div>
              </div>
            </form>
        </div>
      <?php } elseif ($jenjang->id_jenjang == 4) { ?>
        <div class="card-body">
          <form>
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Jenjang</label>
                  <div class="form-control">
                    <label for="exampleFormControlSelect1"><?= $jenjang->nama_jenjang ?></label>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Kelas</label>
                  <div class="form-control">
                    <label for="exampleFormControlSelect1"><?= $kelas->nama_kelas ?></label>
                    <input type="hidden" id="kelas_lainnya" value="<?= $kelas->id_kelas ?>">
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Jurusan</label>
                  <div class="form-control">
                    <label for="exampleFormControlSelect1"><?= $kelas->jurusan ?></label>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Mapel</label>
                  <select class="form-control" id="mapel_lainnya" name="mapel">
                    <option selected value="">Pilih Mapel</option>
                  </select>
                </div>
              </div>
            </div>
          </form>
        </div>
      <?php } ?>
      
        <div class="card-body mt-0">
          <div class="col-12 validation"></div>
          <div class="row mb-4">
            <div class="col-md-8 col-sm-12 mt-2">            
              <input type="text" class="form-control" id="search_keyword" placeholder="Ketik Kata Kunci">
            </div>
            <div class="col-md-4 col-sm-12 mt-2">
              <button type="button" id="search_button" class="btn btn-primary hasRipple btn-rounded w-100 text-center"><i class="feather mr-2 icon-search"></i>Cari<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8 col-sm-12" id="videoPlayerWrapper">
                <iframe
                  id="videoPlayer"
                  width="100%" height="480" 
                  src="https://www.youtube.com/embed/f4JRaELfYOo" 
                  title="YouTube video player" 
                  frameborder="0" 
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                  allowfullscreen>
                </iframe>
                
                <div class="row  mt-2">
                  <div class="col-sm-12 text-left">
                    <h4 id="judulVideo"></h4>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-lg-4 col-sm-12 text-lg-center text-sm-left">
                    <h5 id="mapelVideo"></h5>
                  </div>
                  <div class="col-lg-4 col-sm-12 border-left text-lg-center text-sm-left">
                    <h5 id="paketVideo"></h5>
                  </div>
                  <div class="col-lg-4 col-sm-12 border-left text-lg-center text-sm-left">
                    <h5 id="createdVideo"></h5>
                  </div>
                </div>
                <hr class="bg-primary">
                <div class="row">
                  <div class="col-12" id="deskripsiVideo">
                  </div>
                </div>
                <hr>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="table-responsive">
              <table class="table table-borderless" id="tableVideo">
              </table>
              </div>
            </div>
          </div>
        </div>

    </div>
  </div>
</div>
<script>
  function getViewport () {
  const width = Math.max(
    document.documentElement.clientWidth,
    window.innerWidth || 0
    )
    if (width <= 576) return 'xs'
    if (width <= 768) return 'sm'
    if (width <= 992) return 'md'
    if (width <= 1200) return 'lg'
    return 'xl'
  }
  var screenSize = getViewport();
  $( window ).resize(function() {
    screenSize = getViewport();
    $('#videoPlayerWrapper').show();
  });
  $(document).ready(function() {
    const site_url = "<?= site_url('video/'); ?>";

    <?php if ($jenjang->id_jenjang != 4) { ?>
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("mapel/listMapel"); ?>",
        data: {
          id_kelas: $("#kelas").val()
        },
        dataType: "json",
        beforeSend: function(e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response) {
          $("#mapel").html(response.list_mapel);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });

      $('.babChange').change(function() {
        if($("#mapel").val().length == 0) return $('#bab').html('<option value="">Pilih Bab</option>'); 
        $.ajax({
          type: "POST",
          url: "<?php echo base_url("bab/listBab"); ?>",
          data: {
            id_mapel: $("#mapel").val(),
            semester: $("#semester").val()
          },
          dataType: "json",
          beforeSend: function(e) {
            if (e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response) {
            $("#bab").html(response.list_bab).show();
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
          }
        });
      });

      $("#bab").change(function() {
        if($('#mapel').val() == '') $('#tableVideo').html(null);
        else if($('#bab').val() != ''){
          getVideo(null,$("#mapel").val(),null,$('#bab').val());
        }
        else getVideo(null,$("#mapel").val());
      });

      $("#mapel").change(function() {
        if($("#mapel").val() != '') {
          if($("#bab").val() != '') getVideo(null,$("#mapel").val(),null,$('#bab').val());
          else getVideo(null,$("#mapel").val());
        }
        else {
          $('#semester').val('').change();
        }
      });

      $("#search_button").click(function() {
        let keyword = $("#search_keyword");
        let mapel = $("#mapel");
        let bab = $("#bab");
        if(keyword.val() == '' || mapel.val() == '' || bab.val() == '') {
          if(mapel.val() == '') {
            showAlert('warning', 'Pilih Mapel Telebih Dahulu !!');
            mapel.focus();
          }
          else if(bab.val() == '') {
            showAlert('warning', 'Pilih Bab Telebih Dahulu !!');
            bab.focus();
          }
          else {
            showAlert('warning', 'Ketik Kata Kunci !!');
            keyword.focus();
            getVideo(null,mapel.val(),null,$('#bab').val());
          }
        } else {
          $('.validation').html(null);
          getVideo(null,mapel.val(),{'tb_video': {'nama_video': keyword.val()}},$('#bab').val());
        }
      });

      $("#search_keyword").keyup(function() {
        let keyword = $("#search_keyword");
        let mapel = $("#mapel");
        let bab = $("#bab");
        if(keyword.val() == '' || mapel.val() == '' || bab.val() == '') {
          if(mapel.val() == '') {
            showAlert('warning', 'Pilih Mapel Telebih Dahulu !!');
            mapel.focus();
          }
          else if(bab.val() == '') {
            showAlert('warning', 'Pilih Bab Telebih Dahulu !!');
            bab.focus();
          }
          else {
            getVideo(null,mapel.val(),null,$('#bab').val());
          }
        } else {
          $('.validation').html(null);
          getVideo(null,mapel.val(),{'tb_video': {'nama_video': keyword.val()}},$('#bab').val());
        }
      });

    <?php } else { ?>

      $.ajax({
        type: "POST",
        url: "<?php echo base_url("mapel/listMapelLainnya"); ?>",
        data: {
          id_kelas: $("#kelas_lainnya").val()
        },
        dataType: "json",
        beforeSend: function(e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response) {
          $("#mapel_lainnya").html(response.list_mapel_lainnya).show();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });

      $('#mapel_lainnya').change(function() {
        if($('#mapel_lainnya').val() != '') getVideo(null,$("#mapel_lainnya").val(),);
        else $('#tableVideo').html(null);
      });

      $("#search_button").click(function() {
        let keyword = $("#search_keyword");
        let mapel = $("#mapel_lainnya");
        if(keyword.val() == '' || mapel.val() == '') {
          if(mapel.val() == '') {
            showAlert('warning', 'Pilih Mapel Telebih Dahulu !!');
            mapel.focus();
          }
          else {
            showAlert('warning', 'Ketik Kata Kunci !!');
            keyword.focus();
            getVideo(null,$("#mapel_lainnya").val());
          }
        } else {
          $('.validation').html(null);
          getVideo(null,$("#mapel_lainnya").val(),{'tb_video': {'nama_video': keyword.val()}});
        }
      });

      $("#search_keyword").keyup(function() {
        let keyword = $("#search_keyword");
        let mapel = $("#mapel_lainnya");
        if(keyword.val() == '' || mapel.val() == '') {
          if(mapel.val() == '') {
            showAlert('warning', 'Pilih Mapel Telebih Dahulu !!');
            mapel.focus();
          }
          else {
            getVideo(null,mapel.val());
          }
        } else {
          $('.validation').html(null);
          getVideo(null,mapel.val(),{'tb_video': {'nama_video': keyword.val()}});
        }
      });
    <?php } ?>

    function getVideo(id_video = null, id_mapel = null, search_data = null, id_bab = null) {
      let sendData = {'id_video' : id_video, 'id_mapel' : id_mapel, 'search_data': search_data, 'id_bab': id_bab};
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("video/getListVideo"); ?>",
        data: sendData,
        dataType: "json",
        beforeSend: function(e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response) {
          if(screenSize == 'xs' || screenSize == 'sm') {
            $('#videoPlayer').attr('src', $('#videoPlayer').attr('src'));
            $('#videoPlayerWrapper').hide();
          }
          else $('#videoPlayerWrapper').show();

          $("#tableVideo").html(response.data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
    }
    
    $('.video-isi').on('click', '.play', function() {
      let id = $(this).attr('value');

      $.ajax({
        type: "GET",
        url: site_url + "get",
        data: {
          id: id
        },
        dataType: "JSON",
        success: function(response) {
          if(screenSize == 'xs' || screenSize == 'sm') $('#videoPlayerWrapper').show();

          let dateCreated = new Date(response.created).toLocaleDateString('id-ID', { 
                year: 'numeric', month: 'long', day: 'numeric'
              });
          $('#judulVideo').html('' + response.nama_video);
          $('#deskripsiVideo').html('<h5>Deskripsi :</h5>' + response.deskripsi);
          $('#mapelVideo').html('Mapel : ' + response.nama_mapel);
          $('#createdVideo').html('Diupload : ' + dateCreated);
          if(response.nama_bab!==undefined) $('#paketVideo').html('Bab : ' + response.nama_bab);
          $('#videoPlayer').attr('src', response.link);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
    });

    function showAlert(type, message) {
      myAlert = `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
                  ${message}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>`;
      $('.validation').html(myAlert);
      $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function(){
          $(".alert-dismissible").slideUp(500);
      });
    }
  });
</script>