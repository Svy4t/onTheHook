<template>
  <div>
    <form v-on:submit.prevent="postFiles()">
      <input type="file" ref="files" id="files" multiple v-on:change="handleFileUploads()">
      <button>Send</button>
    </form>
  </div>
</template>
<script>
import axios from "axios";

export default {
  data() {
    return {
      files: "",
    };
  },
  methods: {
    handleFileUploads() {
      this.files = this.$refs.files.files;
    },
    postFiles() {
      var formData = new FormData();
      for (var i = 0; i < this.files.length; i++) {
        let file = this.files[i];
        console.log(file);
        formData.append("file" + i, file);
      }
      formData.append("count", this.files.length);

      axios
        .post("http://cz57780.tw1.ru/api/showRequest", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log(error.response);
        });
    },
  },
};
</script>
<style lang="">
</style>