<template>
  <div class="blk-content" v-if="isShow" @click="endTime">Click Here</div>
</template>

<script>
export default {
  props: ["delay"],
  data() {
    return {
      isShow: false,
      timer:null,
      score:0
    };
  },
  mounted() {
    setTimeout(() => {
      this.isShow = true;
      this.startTime();
    }, this.delay);
  },
  methods:{
    startTime(){
      this.timer = setInterval(() => {
        this.score += 50;
      },50);
    },
    endTime(){
      clearInterval(this.timer);
      this.$emit('endGame' , this.score);
    }
  }
};
</script>

<style>
.blk-content {
  color: #ffffff;
  font-size: 20px;
  padding: 100px 20px;
  width: 300px;
  background-color: #800033;
  transition: all 0.5s;
  cursor: pointer;
  margin: 20px auto;
  border-radius: 8px;
}
</style>