<template>
  <div class="row">
    <div class="card col-md-4 mx-auto">
          <div class="card-body">
            <h3 class="text-center">User Online</h3>
            <h3 class="text-center">{{ this.count }}</h3>
        </div>
    </div>
<<<<<<< HEAD
=======
    <div class="card col-md-4 mx-auto">
          <div class="card-body">
            <h3 class="text-center">Total User</h3>
            <h3 class="text-center">{{ this.totalUser }}</h3>
        </div>
    </div>
>>>>>>> cd5701b09a6ac42aee0c5dc03f8c65a3fceb5551
  </div>
</template>

<script>
    export default {
        data() {
          return {
<<<<<<< HEAD
            count:0
          }
        },
=======
            count:0,
            totalUser:0
          }
        },
        created(){
          this.getDataOfTotalUser()
        },
>>>>>>> cd5701b09a6ac42aee0c5dc03f8c65a3fceb5551
        mounted(){
          this.listen()
        },
        methods:{
          listen(){
            Echo.join('tasks')
                .here(user => this.count = user.length)
                .joining(user => this.count++)
                .leaving(user => this.count--);
<<<<<<< HEAD
=======
          },
          getDataOfTotalUser(url = '/api/user/show/total-user'){
            axios.get(url)
                  .then(response =>{
                    this.totalUser = response.data.total
                  })
                  .catch(errors =>{
                    console.log(errors);
                  });
>>>>>>> cd5701b09a6ac42aee0c5dc03f8c65a3fceb5551
          }
          // Echo.private('tasks')
          //     .listen('TaskEvent',(e) => {
          //     console.log(e);
          // });
        }
    }
</script>
