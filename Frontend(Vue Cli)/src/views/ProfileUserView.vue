<template>
  <div class="profileUser">
    <HeaderComponent :id="userId" />
    <div class="profileUser__wrapper">
      <div class="profileUser__content">
        <div class="profile__top">
          <h1 class="profile__title">Профиль пользователя</h1>
        </div>
        <div v-if="!token" class="profile__not">
          <span class="notaccount">Вы не вошли в аккаунт - </span>
          <router-link to="/login" class="exit">Авторизуйтесь</router-link>
        </div>
        <div v-if="token" class="infoUser profile__yes">
          <div class="info__left">
            <div class="info__name">
              <span class="info__label">Имя:</span>
              <span class="info__value">{{ user.name }}</span>
            </div>
            <div class="info__surname">
              <span class="info__label">Фамилия:</span>
              <span class="info__value">{{ user.surname }}</span>
            </div>
          </div>
          <div class="info__center">
            <div class="info__date">
              <span class="info__label">Дата рождения: </span>
              <span class="info__value">{{ user.date_of_birth }}</span>
            </div>
            <div class="info__rating">
              <span class="info__label">Средняя оценка: </span>
              <span class="info__value">{{ totalRating }} ({{ justRating }})</span>
              <span class="info__label">Ваша оценка: </span>
              <div class="rating-body">
                <form>
                  <div class="rating-stars">
                    <input type="radio" name="rating" id="rs0" checked /><label for="rs0"></label>
                    <input v-on:click="rating(user.id, 1)" type="radio" name="rating" id="rs1" /><label
                      for="rs1"></label>
                    <input v-on:click="rating(user.id, 2)" type="radio" name="rating" id="rs2" /><label
                      for="rs2"></label>
                    <input v-on:click="rating(user.id, 3)" type="radio" name="rating" id="rs3" /><label
                      for="rs3"></label>
                    <input v-on:click="rating(user.id, 4)" type="radio" name="rating" id="rs4" /><label
                      for="rs4"></label>
                    <input v-on:click="rating(user.id, 5)" type="radio" name="rating" id="rs5" /><label
                      for="rs5"></label>
                    <span class="rating-counter" v-if="myRating !== 0">
                      {{ myRating }}
                    </span>
                    <span class="rating-counter" v-else></span>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="info__right">
            <div class="info__reg">
              <span class="info__label">Дата регистрации: </span>
              <span class="info__value">{{ user.created_at }}</span>
            </div>
            <div v-if="roleUser === 'admin'" class="info__login">
              <span class="info__label">Почта: </span>
              <span class="info__value">{{ user.login }}</span>
            </div>
          </div>
          <div class="admin__rest" v-if="roleUser === 'admin'">
            <h3 class="rest__title">Ограничение</h3>
            <div class="rest__content">
              <div class="rest_comment">
                <span>Ограничение комментариев:</span>
                <div>
                  <span v-if="user.rest_comment === 'ban'" class="rest__value">Ограничено</span>
                  <span v-if="user.rest_comment === 'none'" class="rest__value">Не ограничено</span>
                </div>
                <button class="btn-reset rest_btn" v-if="user.rest_comment === 'ban'"
                  v-on:click="commentRest(user.id, 'none')">
                  Не ограничивать
                </button>
                <button class="btn-reset rest_btn" v-if="user.rest_comment === 'none'"
                  v-on:click="commentRest(user.id, 'ban')">
                  Ограничить
                </button>
              </div>
              <div class="rest_advt">
                <span>Ограничение объявлений:</span>
                <div>
                  <span v-if="user.rest_advt === 'ban'" class="rest__value">Ограничено</span>
                  <span v-if="user.rest_advt === 'none'" class="rest__value">Не ограничено</span>
                </div>
                <button class="btn-reset rest_btn" v-if="user.rest_advt === 'ban'"
                  v-on:click="advtRest(user.id, 'none')">
                  Не ограничивать
                </button>
                <button class="btn-reset rest_btn" v-if="user.rest_advt === 'none'"
                  v-on:click="advtRest(user.id, 'ban')">
                  Ограничить
                </button>
              </div>
              <div class="rest_car">
                <span>Ограничение добавление в машину:</span>
                <div>
                  <span v-if="user.rest_car === 'ban'" class="rest__value">Ограничено</span>
                  <span v-if="user.rest_car === 'none'" class="rest__value">Не ограничено</span>
                </div>
                <button class="btn-reset rest__btn" v-if="user.rest_car === 'ban'"
                  v-on:click="carRest(user.id, 'none')">
                  Не ограничивать
                </button>
                <button class="btn-reset rest_btn" v-if="user.rest_car === 'none'" v-on:click="carRest(user.id, 'ban')">
                  Ограничить
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <ProfileUserAdvtViewVue v-if="token" />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import ProfileUserAdvtViewVue from "./ProfileUserAdvtView.vue";
import HeaderComponent from "../components/HeaderComponent.vue";
import { encodeText, setCookie, decodeText, getCookie } from '../views/EventsView.vue';

export default {
  data() {
    return {
      encodeText,
      setCookie,
      decodeText,
      getCookie,
      justRating: 0,
      totalRating: 0.0,
      myRating: 0,
      user: [],
      roleUser: getCookie('role'),
      token: this.$route.params.token,
      userId: getCookie('id'),
    };
  },
  components: {
    HeaderComponent,
    ProfileUserAdvtViewVue,
  },
  mounted() {
    this.output();
    this.getRating();
  },
  methods: {
    output() {
      axios
        .post("http://cz57780.tw1.ru/api/getUser", {
          token: this.token,
        })
        .then((response) => {
          this.user = response.data[0];
          for (let i = 0; i < this.user.rating.length; i++) {
            this.totalRating = this.totalRating + this.user.rating[i].rating;
          }
          this.justRating = this.user.rating.length;
          if (this.user.rating.length !== 0) {
            this.totalRating = this.totalRating / this.user.rating.length;
          } else {
            this.totalRating = "Нет оценок";
          }
          this.date = new Date(Date.parse(this.user.created_at));
          this.dateTime = this.date.toLocaleTimeString().slice(0, -3);
          this.dateDay = this.date.toLocaleDateString();
          this.user.created_at = this.dateTime + " " + this.dateDay;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    commentRest(userId, comment) {
      axios
        .post("http://cz57780.tw1.ru/api/restraction", {
          id: userId,
          comment: comment,
        })
        .then((response) => {
          console.log(response.data);
          this.output();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    advtRest(userId, advt) {
      axios
        .post("http://cz57780.tw1.ru/api/restraction", {
          id: userId,
          advt: advt,
        })
        .then((response) => {
          console.log(response.data);
          this.output();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    carRest(userId, car) {
      axios
        .post("http://cz57780.tw1.ru/api/restraction", {
          id: userId,
          car: car,
        })
        .then((response) => {
          console.log(response.data);
          this.output();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    rating(userId, rating) {
      axios
        .post("http://cz57780.tw1.ru/api/rating", {
          user_for_id: userId,
          user_who_id: localStorage.id,
          rating: rating,
        })
        .then((response) => {
          console.log(response.data);
          this.getRating();
          this.totalRating = 0;
          this.output();
        })
        .catch((error) => {
          console.log(error.response);
        });
    },

  },
};
</script>

<style scoped>
.profileUser__wrapper {
  max-width: 1320px;
  margin: 0 auto;
}

.profileUser__content {
  padding: 20px;
  background: rgba(255, 255, 255, 0.9);
  backdrop-filter: blur(20px);
  border-radius: 15px;
  margin-bottom: 50px;
}

.profileUser {
  min-height: 100vh;
  background-image: url("@/assets/back-profile.png");
  background-attachment: fixed;
}

.profile__top {
  width: 100%;
  padding-left: calc(50% - 259px);
  display: flex;
  justify-content: space-between;
}

.profile__title {
  margin: 0;
  margin-bottom: 50px;
  font-weight: 700;
  font-size: 40px;
  line-height: 100%;
  color: #2d2325;
}

.profile__yes {
  display: flex;
}

.info__left,
.info__center,
.info__right {
  margin-right: 50px;
}

.info__name,
.info__surname,
.info__date,
.info__rating,
.info__reg,
.info__login {
  display: flex;
  flex-direction: column;
}

.info__name,
.info__date,
.info__reg {
  margin-bottom: 30px;
}

.info__label {
  font-weight: 700;
  font-size: 22px;
  line-height: 100%;
  color: #2d2325;
}

.info__value {
  font-weight: 500;
  font-size: 28px;
  line-height: 100%;
  color: #27673f;
}

.info__rating>.info__value {
  margin-bottom: 10px;
}

.rest__content {
  display: flex;
  flex-direction: column;
}

.rest__title {
  margin: 0;
  display: block;
  margin-bottom: 10px;
  font-weight: 700;
  font-size: 22px;
  line-height: 100%;
  color: #2d2325;
}

.rest__wrapper {
  width: 410px;
  height: 98px;
  background: #ffffff;
  border: 1px solid #395963;
  border-radius: 5px;
}

.rest__value {
  padding-left: 58%;
  font-weight: 700;
  color: #27673f;
}

.rest__content {
  border-radius: 5px;
  outline: 1px solid #27673f;
  background-color: #fff;
  padding: 20px;
  font-weight: 600;
  font-size: 16px;
  line-height: 100%;
  color: #000;
}

.rest_comment,
.rest_advt {
  margin-bottom: 20px;
}

.rest_btn {
  font-family: 'Comfortaa';
  border-bottom: 1px solid #27673f;
}

.rating-body * {
  box-sizing: border-box;
}

.rating-stars {
  display: block;
  width: 30vmin;
  border-radius: 5vmin;
  position: relative;
}

.rating-counter {
  text-align: center;
  font-size: 28px;
  color: #27673f;
  /* width: 10vmin; */
  text-align: center;
  position: absolute;
  top: -24px;
  right: 9px;
  height: 100%;
  border-radius: 0 5vmin 5vmin 0;
  line-height: 100%;
}

.rating-counter:before {
  content: "";
  transition: all 0.25s ease 0s;
}

input {
  display: none;
}

label {
  width: 28px;
  height: 28px;
  background: #000b;
  display: inline-flex;
  cursor: pointer;
  margin: 0.5vmin 0.65vmin;
  transition: all 1s ease 0s;
  clip-path: polygon(50% 0%,
      66% 32%,
      100% 38%,
      78% 64%,
      83% 100%,
      50% 83%,
      17% 100%,
      22% 64%,
      0 38%,
      34% 32%);
}

label[for="rs0"] {
  display: none;
}

label:before {
  width: 90%;
  height: 90%;
  content: "";
  background: orange;
  z-index: -1;
  display: block;
  margin-left: 5%;
  margin-top: 5%;
  clip-path: polygon(50% 0%,
      66% 32%,
      100% 38%,
      78% 64%,
      83% 100%,
      50% 83%,
      17% 100%,
      22% 64%,
      0 38%,
      34% 32%);
  background: linear-gradient(90deg,
      yellow,
      orange 30% 50%,
      #184580 50%,
      70%,
      #173a75 100%);
  background-size: 205% 100%;
  background-position: 0 0;
}

label:hover:before {
  transition: all 0.25s ease 0s;
}

input:checked+label~label:before {
  background-position: 100% 0;
  transition: all 0.25s ease 0s;
}

input:checked+label~label:hover:before {
  background-position: 0% 0;
}

/* #rs1:checked ~ .rating-counter:before {
  content: "1|";
}

#rs2:checked ~ .rating-counter:before {
  content: "2|";
}

#rs3:checked ~ .rating-counter:before {
  content: "3|";
}

#rs4:checked ~ .rating-counter:before {
  content: "4|";
}

#rs5:checked ~ .rating-counter:before {
  content: "5|";
} */

label+input:checked~.rating-counter:before {
  color: #ffab00 !important;
  transition: all 0.25s ease 0s;
}

label:hover~.rating-counter:before {
  color: #9aacc6 !important;
  transition: all 0.5s ease 0s;
  animation: pulse 1s ease 0s infinite;
}

/* label[for="rs1"]:hover ~ .rating-counter:before {
  content: "1|" !important;
}

label[for="rs2"]:hover ~ .rating-counter:before {
  content: "2|" !important;
}

label[for="rs3"]:hover ~ .rating-counter:before {
  content: "3|" !important;
}

label[for="rs4"]:hover ~ .rating-counter:before {
  content: "4|" !important;
}

label[for="rs5"]:hover ~ .rating-counter:before {
  content: "5|" !important;
} */

input:checked:hover~.rating-counter:before {
  animation: none !important;
  color: #ffab00 !important;
}
</style>
