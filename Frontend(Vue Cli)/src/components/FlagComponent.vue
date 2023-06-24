<template>
  <div class="flag__wrapper">
    <span v-if="flag === 'Россия'" class="fi fi-ru"></span>
    <span v-if="flag === 'Япония'" class="fi fi-jp"></span>
    <span v-if="flag === 'Германия'" class="fi fi-de"></span>
    <span v-if="flag === 'Китай'" class="fi fi-cn"></span>
    <span v-if="flag === 'США'" class="fi fi-us"></span>
    <span v-if="flag === 'Франция'" class="fi fi-fr"></span>
    <span v-if="flag === 'Южная Корея'" class="fi fi-kr"></span>
    <span v-if="flag === 'Великобритая'" class="fi fi-gb"></span>
    <span v-if="flag === 'Чехия'" class="fi fi-cz"></span>
    <span v-if="flag === 'Швеция'" class="fi fi-se"></span>
    <!-- <span class="fi fi-se"></span> -->
  </div>
</template>
<script>
import "../../node_modules/flag-icons/css/flag-icons.min.css";

export default {
  props: {
    flag: String
  },
  data() {
    return {
    };
  },
  watch: {
    flag() {
      // console.log(this.flag);
    }
  },
  methods: {
  },
};
</script>
<style scoped>
.flag__wrapper {
  margin-right: 5px;
}
</style>
<style>
.fi {
  width: 26px;
  height: 19px;
}
</style>
