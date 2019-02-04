<template>
	<div>
		<div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success">Awaydays Terbaru</div>

                <div class="card-body">
                   <!--  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <table class="table table-striped">
                      <tbody>
                        <tr v-for="(awayday,i) in awaydays" :key="awayday.id">
                          <td>
                            <p class="badge badge-success float-right">Buka
                                <i class="fa fa-unlock"></i>
                            </p>
                            <p class="lead">{{awayday.name}}<span class="fa fa-check-circle"></span>
                                [ {{awayday.judul}} ]
                            </p>
                            <p>{{awayday.keterangan}}</p> 
                            <ul class="list-inline">
                              <li class="list-inline-item">Match : {{awayday.jadwal_match}}</li>
                              <li class="list-inline-item">Open Slot: {{awayday.slot}}</li>
                              <li class="list-inline-item">Biaya : {{awayday.biaya}}</li>
                              <li class="list-inline-item">Tutup : {{awayday.tutup_pendaftaran}}</li>
                            </ul>
                            <a v-bind:href="'/awaydays/'+ awayday.slug" class="btn btn-success"><i class="fa fa-eye"></i> Selengkapnya >></a>
                          </td>                          
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
	export default {
		data(){
			return{
				awaydays:[],
			}
		},
    created(){
      this.getAwaydays();
    },
		methods:{
			//get data awaydays
      getAwaydays(){
        let currentObj = this;
        axios({
          method: 'get',
          url: 'rsc/getAwaydayTimeline'
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