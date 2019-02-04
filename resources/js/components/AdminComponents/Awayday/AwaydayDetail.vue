<template>
	<div>
		<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Awayday
                </div>
                <div class="card-body">
                  <!--   @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->

                    <p class="lead text-center">{{awayday.name}} <span class="fa fa-check-circle"></span>
                    </p>
                    <p class="lead text-center">[ {{awayday.judul}}]</p>
                    <p class="text-center">
                      {{awayday.keterangan}}
                    </p>
                    <ul class="list-inline text-center">
                      <li class="list-inline-item">
                        <button type="button" class="btn btn-outline-success"> Match : {{awayday.jadwal_match}}</button>
                      </li>
                      <li class="list-inline-item">
                        <button type="button" class="btn btn-outline-success">Open Slot: {{awayday.slot}}</button>
                      </li>
                      <li class="list-inline-item">
                        <button type="button" class="btn btn-outline-success">Biaya : {{awayday.biaya}}</button>
                      </li>
                      <li class="list-inline-item">
                        <button type="button" class="btn btn-outline-success">Tutup : {{awayday.tutup_pendaftaran}}</button>
                      </li>
                    </ul>

                    <!-- <div class="row">
                      <div class="card col-md-4 mx-auto">
                            <div class="card-body">
                              <h4 class="text-center">Slot Terisi</h4>
                              <h4 class="text-center">0</h4>
                          </div>
                      </div>
                      <div class="card col-md-4 mx-auto">
                            <div class="card-body">
                              <h4 class="text-center">Slot Tersisa</h4>
                              <h4 class="text-center">200</h4>
                          </div>
                      </div>
                    </div> -->
                    
                    <hr>
                    <p class="text-center">
                      <button class="btn btn-success" :disabled="DaftarDisabled == 1 ? true : false">Daftar Awaydays</button>
                      <button class="btn btn-warning" v-show="false">Konfirmasi Pembayaran</button>
                    </p>

                    <hr>
                    
                    <div class="alert alert-warning" role="alert">
  										Mohon untuk melakukan pembayaran & konfirmasi sebelum hari <strong>Selasa tanggal 5-Januari-2019.</strong>
  										Langkah-langkah :
  										<br>
  										<strong>1. Bayar via transfer sesuai dengan nominal biaya pendaftaran, Bank BRI No Rek : 001-220-123-456 a/n Pratama Yoga. </strong>
  										<br>
  										<strong>2. Cetak struk dan foto sebagai bukti pembayaran</strong>
  										<br>
  										<strong>2. Lakukan Konfirmasi pembayaran</strong>
										</div>

										<hr>

										<div class="alert alert-danger" role="alert">
  										Pendaftaran awayday anda gagal, anda belum melakukan pembayaran dan konfirmasi.
										</div>

										<hr>

										<table class="table table-borderless">
									  <tbody>
									    <tr>
									      <th scope="row">Pendaftaran</th>
									      <td>:</td>
									      <td>Match A vs B </td>
									    </tr>
									    <tr>
									      <th scope="row">Waktu Daftar :</th>
									       <td>:</td>
									      <td>Selasa, 24-01-2019 21:21</td>
									    </tr>
									    <tr>
									      <th scope="row">Kode Daftar :</th>
									       <td>:</td>
									      <td>LJ00231</td>
									    </tr>
									    <tr>
									      <th scope="row">Status Pendaftaran :</th>
									       <td>:</td>
									      <td>Belum Konfirmasi</td>
									    </tr>
									  </tbody>
									</table>
                   
                </div>
            </div>
        </div>
    </div>
	</div>
</template>

<script>
	export default{
		data(){
			return{
        awayday: {
          name: '',
          judul : '',
          keterangan : '',
          jadwal_match: '',
          slot:'',
          biaya:'',
          tutup_pendaftaran:'',
        },
				DaftarDisabled:0,
				ConfirmationDisabled:1,
			}
		},
    created(){

      this.getAwaydayDetail();

    },
		methods : {

			checkIsDaftar(){
				let currentObj = this;
				axios({
					method: 'get',
          url: 'rsc/checkIsDaftar'
				})
				.then(function(response){
					console.log(response)
          //currentObj.awaydays = response.data ;
          //currentObj.totalData = currentObj.awaydays.length;
				})
				.catch(function(error){
					console.log(error)
				});
			},

      getAwaydayDetail(){
        let currentObj = this;
        //get url
        let pageURL = window.location.href;
        let lastURLSegment = pageURL.substr(pageURL.lastIndexOf('/') + 1);
        let URL = '/rsc/getAwaydayDetail/' + lastURLSegment;

        axios({
          method: 'get',
          url: URL
        })
        .then(function(response){
          console.log(response.data)
          currentObj.awayday.name = response.data[0].name ;
          currentObj.awayday.judul = response.data[0].judul ;
          currentObj.awayday.keterangan = response.data[0].keterangan ;
          currentObj.awayday.jadwal_match = response.data[0].jadwal_match ;
          currentObj.awayday.slot = response.data[0].slot ;
          currentObj.awayday.biaya = response.data[0].biaya ;
          currentObj.awayday.tutup_pendaftaran = response.data[0].tutup_pendaftaran ;
        
        })
        .catch(function(error){
          console.log(error)
        });
      }

		}
	}
</script>

