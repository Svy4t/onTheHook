<template>
  <div class="back">
    <div class="login">
      <div class="login__wrapper">
        <svg
        class="close"
        @click="closeForm()"
        width="32"
        height="32"
        viewBox="0 0 32 32"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M29.7357 2.26433C28.0499 0.578557 25.3167 0.578557 23.6309 2.26433L16.7631 9.13217C16.3417 9.55361 15.6584 9.55361 15.2369 9.13217L8.36908 2.26433C6.6833 0.578556 3.95011 0.578555 2.26434 2.26433C0.578557 3.95011 0.578557 6.6833 2.26433 8.36907L9.13217 15.2369C9.55361 15.6584 9.55361 16.3416 9.13217 16.7631L2.26433 23.6309C0.578555 25.3167 0.578556 28.0499 2.26433 29.7357C3.95011 31.4214 6.6833 31.4214 8.36907 29.7357L15.2369 22.8678C15.6584 22.4464 16.3416 22.4464 16.7631 22.8678L23.6309 29.7357C25.3167 31.4214 28.0499 31.4214 29.7357 29.7357C31.4214 28.0499 31.4214 25.3167 29.7357 23.6309L22.8678 16.7631C22.4464 16.3416 22.4464 15.6584 22.8678 15.2369L29.7357 8.36907C31.4214 6.6833 31.4214 3.95011 29.7357 2.26433Z"
          stroke="#F5F7F9"
          stroke-width="2"
        />
      </svg>
        <div class="login__content">
          <h1 class="login__title">Авторизация</h1>
          <form v-on:submit.prevent="loginUser()" class="form">
            <div class="form__login">
              <input class="input" type="text" v-model="login" />
              <div class="form__tooltip">
                <TooltipInputComponent :text="'Нужно вписать почту и логин обязателен'"/>
              </div>
              <span
                class="form__label"
                :class="{ 'input-active': login !== '' }"
                >Логин</span
              >
            </div>
            <div class="form__password">
              <input class="input" type="password" v-model="password" />
              <div class="form__tooltip">
                <TooltipInputComponent :text="'Пароль состоит из минимум 8 символов'"/>
              </div>
              <span
                class="form__label"
                :class="{ 'input-active': password !== '' }"
                >Пароль</span
              >
            </div>
            <div class="login__btns">
              <button class="btn-reset form__btn form__btn-login">ВОЙТИ</button>
              <div class="login__or">
                <hr color="#192A39" class="login__or-hr" />
                <span class="login__or__span">ИЛИ</span>
                <hr color="#192A39" class="login__or-hr" />
              </div>
            </div>
          </form>
          <button @click="regOpen()" class="btn-reset form__btn form__btn-reg">
            ЗАРЕГИСТРИРОВАТЬСЯ
          </button>
        </div>
        <div class="login__logo">
          <img src="@/assets/login__logo.png" alt="" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
// import HeaderComponent from "../components/HeaderComponent.vue";
import {
  encodeText,
  setCookie,
  decodeText,
  getCookie,
} from "../views/EventsView.vue";
import TooltipInputComponent from './TooltipInputComponent.vue';

export default {
  components: {
    // HeaderComponent,
    TooltipInputComponent
  },
  name: "LoginView",
  data() {
    {
      return {
        encodeText,
        decodeText,
        getCookie,
        setCookie,
        login: "",
        password: "",
      };
    }
  },
  methods: {
    loginUser() {
      axios
        .post("http://cz57780.tw1.ru/api/login", {
          login: this.login,
          password: this.password,
        })
        .then((response) => {
          console.log(response);
          let user = response.data;
          setCookie("role", user.role);
          setCookie("id", user.id);
          setCookie("comment", user.rest_comment);
          setCookie("advt", user.rest_advt);
          setCookie("car", user.rest_car);
          setCookie("event", user.rest_event);
          setCookie("part", user.rest_participate_in_the_event);
          setCookie("message", user.rest_message);
          setCookie("avatar", user.avatar);
          setCookie("token", user.token);
          this.$router.push(`/profile/${user.id}`);
        })
        .catch((error) => {
          error.response.data.errors = Object.values(error.response.data.errors);
          alert(error.response.data.errors[0][0]);
        });
    },
    regOpen() {
      this.$emit("regOpen", {
        regIsOpen: true,
        loginIsOpen: false,
      });
    },
    closeForm() {
      this.$emit("closeForm", {
        regIsOpen: false,
        loginIsOpen: false,
      });
    },
  },
};
</script>

<style scoped>
.back {
  position: absolute;
  z-index: 10;
  width: 100vw;
  height: 100vh;
  background: var(--blue60);
  background-size: cover;
  background-attachment: fixed;
}

.login {
  height: 100vh;
  padding-top: 150px;
}

.login__wrapper {
  position: relative;
  display: flex;
  background: var(--white);
  border-radius: 15px;
  max-width: 1000px;
  margin: 0 auto;
}

.login__content {
  padding: 65px 75px;
}

.login__title {
  margin: 0;
  margin-bottom: 55px;
  font-weight: 600;
  font-size: 30px;
  line-height: 41px;
  text-align: center;
  color: var(--blue);
}

.form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.form__login,
.form__password {
  position: relative;
  width: 100%;
  display: flex;
  flex-direction: column;
}

.form__login {
  margin-bottom: 30px;
}

.form__password {
  margin-bottom: 45px;
}

.form__label {
  position: absolute;
  left: 15px;
  top: 7px;
  font-weight: 500;
  font-size: 16px;
  line-height: 22px;
  color: var(--blue);
  transition: top 0.3s ease-in-out, font-size 0.3s ease-in-out,
    line-height 0.3s ease-in-out;
  z-index: 0;
}

.input-active {
  top: -22px;
  font-size: 13px;
  line-height: 19px;
}

.input {
  width: 350px;
  position: relative;
  z-index: 1;
  padding: 7px 15px;
  border-radius: 10px;
  background-color: transparent;
  font-weight: 400;
  font-size: 16px;
  line-height: 22px;
  color: var(--blue);
  border: 1px solid var(--grey);
}

.reg {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}

.reg__span {
  margin-right: 5px;
  font-weight: 700;
  font-size: 16px;
  line-height: 18px;
  color: #000000;
}

.reg__link {
  font-weight: 700;
  font-size: 16px;
  line-height: 18px;
  color: #27673f;
  border-bottom: 1px solid #27673f;
}

.login__btns {
  width: 100%;
  display: flex;
  flex-direction: column;
}

.form__btn {
  width: 100%;
  font-weight: 700;
  font-size: 16px;
  line-height: 22px;
  color: var(--white);
  padding: 11px 0;
  border: none;
  border-radius: 15px;
  cursor: pointer;
}

.form__btn-login {
  background-color: var(--red);
  margin-bottom: 10px;
}

.form__btn-reg {
  background-color: var(--blue);
}

.login__logo {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 500px;
  background-color: var(--blue);
  border-radius: 15px;
}

.login__or {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
}

.login__or-hr {
  width: 40%;
  height: 1px;
  margin: 0;
}

.login__or__span {
  font-weight: 700;
  font-size: 16px;
  line-height: 22px;
  color: var(--blue);
}

.close {
  position: absolute;
  top: 0px;
  right: -40px;
}

.close:hover {
  cursor: pointer;
  fill: var(--white);
}

.form__tooltip {
  display: none;
  position: absolute;
  bottom: 100%;
  left: 0;
}

.input:focus + .form__tooltip{
  display: block;
}
</style>
