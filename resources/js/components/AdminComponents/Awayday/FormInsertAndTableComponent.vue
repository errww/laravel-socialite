<template>
	<div>
		<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Awaydays
                <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#bukaPendaftaranModal">Buka Pendaftaran</button>
                </div>
                <div class="card-body">
                   <!--  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <!-- alert -->
                    <div class="alert alert-warning" role="alert"> 
                        Anda belum membuka pendaftaran
                    </div>
                    <!-- end alert -->
                    <!-- table -->
                    <table class="table table-responsive">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Judul</th>
                          <th scope="col">Tanggal Match</th>
                          <th scope="col">Tutup Pendaftaran</th>
                          <th scope="col">Total pendaftar</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Match PSSI vs PSSI hdhdhdh </td>
                          <td>11/01/2018</td>
                          <td>9/01/2018</td>
                          <td>100/450</td>
                          <td><span class="badge badge-success">Buka</span></td>
                        </tr>
                        <tr>
                          <th scope="row">1</th>
                          <td>Match PSSI vs PSSI</td>
                          <td>11/01/2018</td>
                          <td>9/01/2018</td>
                          <td>100/450</td>
                          <td><span class="badge badge-danger">Tutup</span></td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- end table -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="bukaPendaftaranModal" tabindex="-1" role="dialog" aria-labelledby="bukaPendaftaranModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Buka Pendaftaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="insertData">
              <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" v-model="judul">
              </div>
              <div class="form-group">
                <label>Jadwal Match</label>
                <input type="text" class="form-control" name="jadwal_match" v-model="jadwal_match">
              </div>
              <div class="form-group">
                <label>Lokasi Match</label>
                <input type="text" class="form-control" name="lokasi_match" v-model="lokasi_match">
              </div>
              <div class="form-group">
                <label>Biaya</label>
                <input type="text" class="form-control" name="biaya" v-model="biaya">
              </div>
              <div class="form-group">
                <label>Slot</label>
                <input type="text" class="form-control" name="slot" v-model="slot">
                <small class="form-text text-muted">Tulis dengan angka, contoh : 450</small>
              </div>
              <div class="form-group">
                <label>Tutup Pendaftaran</label>
                <input type="text" class="form-control" name="tutup_pendaftaran" v-model="tutup_pendaftaran">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" rows="3" name="keterangan" v-model="keterangan"></textarea>
                </div>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">
              	<i class="fa fa-times-circle"></i> Close
              </button>
              <button type="submit" class="btn btn-primary float-right">
              	<i class="fa fa-plus-circle"></i> Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal -->
	</div>
</template>

<script>
	export default{
		data(){
			return {
				judul: '',
				jadwal_match:'',
				lokasi_match:'',
				biaya:'',
				slot:'',
				tutup_pendaftaran:'',
				keterangan:'',
			}
		},
		methods: {
			insertData(){
				let currentObj = this;
				//data form
				var formData = {
					judul : this.judul,
					jadwal_match: this.jadwal_match,
					lokasi_match: this.lokasi_match,
					biaya: this.biaya,
					slot: this.slot,
					tutup_pendaftaran: this.tutup_pendaftaran,
					keterangan: this.keterangan,
				}
				axios({
					method: 'post',
          url: '/api/awayday',
          data: formData
				})
				.then(function(response){
					//clear all data
					currentObj.judul = '';
					currentObj.jadwal_match = '';
					currentObj.lokasi_match = '';
					currentObj.biaya = '';
					currentObj.slot = '';
					currentObj.tutup_pendaftaran = '';
					currentObj.keterangan = '';

					toastr.success(response.data.judul,'Success Buka Pendaftaran')
					
				})
				.catch(function(error){
					console.log(error)
				});
			}
		}
	}
</script>