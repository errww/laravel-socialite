<template>
  <div class="row">
    <div class="card col-md-4 mx-auto">
          <div class="card-body">
            <h3 class="text-center">User Online</h3>
            <h3 class="text-center">{{ this.count }}</h3>
        </div>
    </div>
  </div>
</template>

<script>
    export default {
        data() {
          return {
            count:0
          }
        },
        mounted(){
          this.listen()
        },
        methods:{
          listen(){
            Echo.join('tasks')
                .here(user => this.count = user.length)
                .joining(user => this.count++)
                .leaving(user => this.count--);
          }
          // Echo.private('tasks')
          //     .listen('TaskEvent',(e) => {
          //     console.log(e);
          // });
        }
    }
</script>
