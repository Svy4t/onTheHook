<template lang="">
  <div>
    <form v-on:submit.prevent="addComment()" class="add">
      <img class='img' :src="'http://cz57780.tw1.ru/avatars/' + avatar" alt="">
      <input type="text" class="input" v-model="description" placeholder="Напишите комментарий..."/>
    </form>
  </div>
</template>


<script>
import axios from "axios";
import { getCookie } from '@/views/EventsView.vue';

export default {
  data() {
    return {
      description: "",
      avatar: getCookie('avatar'),
    };
  },
  props: ["advt_id"],
  methods: {
    addComment() {
      axios
        .post("http://cz57780.tw1.ru/api/addComment", {
          advt_id: this.advt_id,
          description: this.description,
          user_id: localStorage.getItem("id"),
        })
        .then((response) => {
          console.log(response.data);
          alert(response.data);
          this.$router.push("/");
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>


<style scoped>

.add {
  display: flex;
  position: relative;
  margin-bottom: 15px;
}

.input {
  font-family: "Comfortaa";
  width: 100%;
  padding: 15px 20px;
  font-weight: 700;
  font-size: 18px;
  line-height: 20px;
  background: #ffffff;
  border: 1px solid #395963;
  border-radius: 5px;
}

.img {
  width: 52px;
  height: 52px;
}
</style>