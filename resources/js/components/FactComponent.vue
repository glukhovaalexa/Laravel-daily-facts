<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <h2>Facts</h2>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Fact mounted.");
    this.getFacts();
  },
  methods: {
    getFacts() {
        let path = 'http://localhost:8080/' + 'api/';

        this.axios.get(path).then((response) => {
            console.log(response.data);
        });
    },
  },
};
</script>
