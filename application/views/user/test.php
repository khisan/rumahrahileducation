<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="m-b-10">Test</h5>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row admin-isi">
  <!-- [ static-layout ] start -->
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header text-center">
        <h3 class="text-primary">Test Online</strong></h3>
      </div>
      <!-- <div class="card-body">
        <form>
          <div class="row">
            <div class="col-lg-12">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Jenjang</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option selected value="<?= $id_jenjang ?>"><?= $jenjang->nama_jenjang ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Kelas</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option selected value="<?= $id_kelas ?>"><?= $kelas->nama_kelas ?></option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div> -->
      <div class="card-body">
        <form>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Jenjang</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option selected value="<?= $id_jenjang ?>"><?= $jenjang->nama_jenjang ?></option>
                </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option selected value="<?= $id_kelas ?>"><?= $kelas->nama_kelas ?></option>
                </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Mapel</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option selected value="">Pilih Mapel</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Bab</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option selected value="">Pilih Bab</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Paket</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option selected value="">Pilih Paket</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <button type="button" class="btn btn-success" style="margin-top: 20px;">Mulai Test</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>