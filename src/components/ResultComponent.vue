<template>
  <h2 class="res-ttl" v-if="score < 250">U are too fast !</h2>
  <h2 class="res-ttl" v-else-if="score > 250 && score < 500">U are normal !</h2>
  <h2 class="res-ttl" v-else>U are too slowly ! Try again</h2>
  <p class="res-txt">
    Result is <span>{{ score }}</span> ms
  </p>
</template>

<script>
export default {
  props:['score']
}
</script>

<style>
.res-ttl {
  font-size: 30px;
  color: #b30000;
  padding-bottom: 10px;
  font-weight: 700;
}
.res-txt {
  font-size: 20px;
}
.res-txt span {
  color: #800033;
  font-weight: 700;
}
</style>