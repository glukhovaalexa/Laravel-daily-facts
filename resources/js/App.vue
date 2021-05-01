<template>
<div>
  <div id="app">
  </div>
  <router-view />
</div>
</template>

<script>
export default {
  mounted() {
    console.log("App mounted.");
  },
};
</script>