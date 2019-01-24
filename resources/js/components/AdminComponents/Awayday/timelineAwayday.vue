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
                        <tr>
                          <td>
                            <p class="badge badge-success float-right">Buka
                                <i class="fa fa-unlock"></i>
                            </p>
                            <p class="lead">Mancing Mania <span class="fa fa-check-circle"></span>
                                [ Match Persija vs PSS Sleman ]
                            </p>
                            <p>Monggo daftar dolor-dolor..
                            </p> 
                            <ul class="list-inline">
                              <li class="list-inline-item">Match : 2019-07-20</li>
                              <li class="list-inline-item">Open Slot: 1500 Kursi</li>
                              <li class="list-inline-item">Biaya : 500.000</li>
                              <li class="list-inline-item">Tutup : 2019-07-15</li>
                            </ul>
                            <button class="btn btn-success"><i class="fa fa-eye"></i> Selengkapnya >></button>
                          </td>                          
                        </tr>
                        <tr>
                          <td>
                            <p class="badge badge-success float-right">Buka
                                <i class="fa fa-unlock"></i>
                            </p>
                            <p class="lead">Lalijiwo <span class="fa fa-check-circle"></span>
                                [ Match Persija vs PSS Sleman ]
                            </p>
                            <p>Monggo daftar dolor-dolor..
                            </p> 
                            <ul class="list-inline">
                              <li class="list-inline-item">Match : 2019-07-20</li>
                              <li class="list-inline-item">Open Slot: 60 Kursi</li>
                              <li class="list-inline-item">Biaya : 500.000</li>
                              <li class="list-inline-item">Tutup : 2019-07-15</li>
                            </ul>
                            <button class="btn btn-success"><i class="fa fa-eye"></i> Selengkapnya >></button>
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
				awaydays: [],
			}
		},
		methods:{
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