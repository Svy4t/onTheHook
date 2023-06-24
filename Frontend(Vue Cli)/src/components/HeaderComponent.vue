<template>
  <nav class="header">
    <router-link to="/">
      <img src="@/assets/logo.svg" alt="logo" class="header__logo" />
    </router-link>
    <div class="header__links">
      <router-link class="header__link" to="/">О нас</router-link>
      <router-link class="header__link" to="/advertisements"
        >Объявления</router-link
      >
      <router-link class="header__link" to="/events">Мероприятия</router-link>
    </div>
    <div class="header__profile-wrapper">
      <NotsComponent v-if="id !== undefined && id !== ''" />
      <span
        @click="openLogin()"
        v-if="id === undefined || id === ''"
        class="header__link"
        >Войти в аккаунт</span
      >
      <router-link :to="'/profile/' + id" v-else class="header__profile">
        <img
          :src="'http://cz57780.tw1.ru/avatars/' + avatar"
          alt="profile"
          class="header__profile-img"
        />
        {{ user.surname }}
      </router-link>
    </div>
    <div class="login-window" :class="{ open: loginIsOpen }">
      <LoginComponent @regOpen="openWindow" @closeForm="openWindow" />
    </div>
    <div class="reg-window" :class="{ open: regIsOpen }">
      <RegComponent @loginOpen='openWindow' @closeForm="openWindow"/>
    </div>
  </nav>
</template>
<script>
import axios from "axios";
import NotsComponent from "@/components/NotsComponent";
import {
  encodeText,
  setCookie,
  decodeText,
  getCookie,
} from "../views/EventsView.vue";
import LoginComponent from "./LoginComponent.vue";
import RegComponent from "./RegComponent.vue";

export default {
  components: {
    NotsComponent,
    LoginComponent,
    RegComponent,
  },
  props: {
    id: String,
  },
  data() {
    return {
      encodeText,
      decodeText,
      setCookie,
      getCookie,
      nots: [],
      avatar: getCookie("avatar"),
      user: [],
      loginIsOpen: false,
      regIsOpen: false,
    };
  },
  mounted() {
    this.getUser();
    // console.log(this.avatar);
  },
  destroy() {
    this.loginIsOpen = false;
    this.regIsOpen = false;
  },
  methods: {
    getUser() {
      axios
        .post("http://cz57780.tw1.ru/api/getUser", {
          id: getCookie("id"),
        })
        .then((response) => {
          this.user = response.data.user[0];
          // console.log(response);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    openLogin() {
      this.loginIsOpen = true;
    },
    openWindow(data) {
      this.loginIsOpen = data.loginIsOpen;
      this.regIsOpen = data.regIsOpen;
    },
  },
};
</script>
<style scoped>
.header {
  width: 1480px;
  margin: 0 auto;
  padding: 0 30px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 10px;
}

.header__links {
  display: flex;
  column-gap: 40px;
}

.header__link {
  font-weight: 600;
  font-size: 20px;
  line-height: 27px;
  color: #ffffff;
}

.header__profile-wrapper {
  display: flex;
}

.header__profile {
  display: flex;
  align-items: center;
  font-weight: 700;
  font-size: 20px;
  line-height: 27px;
  color: #f5f7f9;
}

.header__profile-img {
  width: 60px;
  height: 60px;
  margin-right: 10px;
  border: 2px solid #f5f7f9;
  border-radius: 100%;
  object-fit: cover;
}

.nots {
  position: absolute;
  display: none;
  width: 300px;
  height: 150px;
  z-index: 10;
}

.login-window,
.reg-window {
  display: none;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 5;
}

.open {
  display: block;
}
</style>
