<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mt-4 p-4">
          <h2 style="color:green; font-weight:bold">Todays new fact:</h2>
          <div class="card" style="width: 80%; margin:auto">
            <div class="card-body">
                <p v-if="info" class="card-text" style="color:green; font-style:italic">"{{info}}"</p>
                <p v-if="fact" class="card-text" style="color:green; font-style:italic">"{{fact.fact}}"</p>
            </div>
          </div>  
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            fact : {},
            info : {}
        }
    },
    mounted() {
        this.getFacts();
    },
    methods: {
        //get fatc from api
        getFacts() {
            let path = Vue.config.API_URL + 'api/';

            this.axios.get(path, ((this.fact.id) ? this.fact.id : '')).then((response) => {
                this.fact = response.data.fact;
                this.info = response.data.info;
            });
        },
    },
};
</script>
