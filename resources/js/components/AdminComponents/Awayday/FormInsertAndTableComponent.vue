<template>
	<div>
		<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success">Awaydays
                <button type="button" class="btn btn-default float-right" data-toggle="modal" data-target="#bukaPendaftaranModal">
                <i class="fa fa-edit"></i>
                Buka Pendaftaran Awaydays
                </button>
                </div>
                <div class="card-body">
                    <!-- table -->
                    <form>
                      <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                        <label class="font-weight-bold">Tampilkan</label>
                        <select class="form-control col-md-2" v-model="pageSize">
                          <option>5</option>
                          <option>10</option>
                          <option>50</option>
                          <option>100</option>
                        </select>
                        </div>
                      </div>
                      </div>
                    </form>
                    <div class="table-responsive">
                    <table class="table">
                      <thead class="thead-light">
                        <tr>
                          <th>#</th>
                          <th>Judul</th>
                          <th>Tanggal Match</th>
                          <th>Tutup Pendaftaran</th>
                          <th>Total Pendaftar</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(awayday,i) in sortedAwaydays" :key="awayday.id">
                          <th>{{awayday.row}}</th>
                          <td>{{ awayday.judul}}</td>
                          <td>{{ awayday.jadwal_match}}</td>
                          <td>{{ awayday.tutup_pendaftaran}}</td>
                          <td>-</td>
                          <td><span class="badge badge-success">{{ awayday.status_aktif }}</span></td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                    <!-- end table -->
          
                    <p class="font-weight-bold float-left">
                      Halaman {{currentPage}} - Total Record {{totalData}}
                    </p>
                    <p class="float-right">
                      <button class="btn btn-default" @click="prevPage">
                      <i class="fa fa-angle-double-left"></i> Previous
                      </button> 
                      <button class="btn btn-default" @click="nextPage">
                        Next
                        <i class="fa fa-angle-double-right"></i>
                      </button>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="bukaPendaftaranModal" tabindex="-1" role="dialog" aria-labelledby="bukaPendaftaranModal" aria-hidden="true" ref="vuemodal">
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
				authenticatedUserId: '',
				judul: '',
				jadwal_match:'',
				lokasi_match:'',
				biaya:'',
				slot:'',
				tutup_pendaftaran:'',
				keterangan:'',
        awaydays:[],
        pageSize:5,
        currentPage:1,
        totalData:'0',
        totalPage:'',
			}
		},
		created(){
			this.getAuthenticatedUser();

      this.getAwaydays();

		},
    mounted(){

    },
    computed:{
      sortedAwaydays:function(){
        return this.awaydays.filter((row,index) => {
          let start = (this.currentPage-1) * this.pageSize;
          let end = this.currentPage*this.pageSize;
          if(index >= start && index < end) return true;
        });
      }
    },
		methods: {
      nextPage:function() {
        if((this.currentPage*this.pageSize) < this.awaydays.length) this.currentPage++;
      },
      prevPage:function() {
        if(this.currentPage > 1) this.currentPage--;
      },
			//insert data into database
			insertData(){
				let currentObj = this;
				//data form
				var formData = {
          row : 'Terbaru',
					judul : this.judul,
					jadwal_match: this.jadwal_match,
					lokasi_match: this.lokasi_match,
					biaya: this.biaya,
					slot: this.slot,
					tutup_pendaftaran: this.tutup_pendaftaran,
					keterangan: this.keterangan,
          status_aktif: 'open',
				}
				axios({
					method: 'post',
          url: '/rsc/saveAwaydayData',
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
          //close the modal
          currentObj.awaydays.unshift(formData)
          
					
				})
				.catch(function(error){
					console.log(error)
				});
			},

			//get user id
			getAuthenticatedUser(){
				let currentObj = this;
				axios({
					method: 'get',
					url: 'authUserId'
				})
				.then(function(response){
					//alert(response.data.AuthId)
					currentObj.authenticatedUserId = response.data.AuthId.name

				})
				.catch(function(error){
					console.log(error)
				});
			},

      //get data awaydays
      getAwaydays(){
        let currentObj = this;
        axios({
          method: 'get',
          url: 'rsc/showAwaydayData'
        })
        .then(function(response){
          console.log(response);
          currentObj.awaydays = response.data ;
          currentObj.totalData = currentObj.awaydays.length;

        })
        .catch(function(error){
          console.log(error)
        });
      }

		}
	}
</script>