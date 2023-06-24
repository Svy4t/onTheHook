<template>
  <div class="back">
    <div class="regist">
      <div class="regist__wrapper">
        <div class="regist__content">
          <h1 class="regist__title">Регистрация</h1>
          <form v-on:submit.prevent="registerUser()" class="form">
            <div class="form__name">
              <label for="">Фото</label>
              <input class="input" v-on:change="handleFileUploads()" type="file" ref="file" id="files"
                placeholder="Your name..." />
            </div>
            <div class="form__name">
              <label for="">Имя</label>
              <input class="input" type="text" placeholder="Your name..." v-model="name" />
            </div>
            <div class="form__surname">
              <label for="">Фамилия</label>
              <input class="input" type="text" placeholder="Your surname..." v-model="surname" />
            </div>
            <div class="form__login">
              <label for="">Почта</label>
              <input class="input" type="text" placeholder="Your login..." v-model="login" />
            </div>
            <div class="form__password">
              <label for="">Пароль</label>
              <input class="input" type="password" placeholder="Your password..." v-model="password" />
            </div>
            <div class="form__password">
              <label for="">Подтвердите пароль</label>
              <input class="input" type="password" placeholder="Your confirmed password..."
                v-model="password_confirmation" />
            </div>
            <div class="form__date">
              <label for="">Дата рождения</label>
              <input class="input-date" type="date" v-model="date_of_birth" />
            </div>
            <div class="reg">
              <span class="reg__span">У вас есть аккаунт? - </span>
              <router-link to="/login" class="reg__link">Авторизуйтесь</router-link>
            </div>
            <button class="btn-reset form-btn">Зарегистрироваться</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      name: "",
      surname: "",
      login: "",
      password: "",
      password_confirmation: "",
      date_of_birth: "",
      file: {},
    };
  },
  methods: {
    registerUser() {
      axios
        .post("http://cz57780.tw1.ru/api/register", {
          name: this.name,
          surname: this.surname,
          login: this.login,
          password: this.password,
          password_confirmation: this.password_confirmation,
          date_of_birth: this.date_of_birth,
        })
        .then((response) => {
          console.log(response);
          this.$router.push("/login");
        })
        .catch((error) => {
          console.log(error);
        });
    },
    handleFileUploads() {
      this.file = this.$refs.file.files;
      console.log(this.file);
    },
  },
};
</script>

<style scoped>
.back {
  background-image: url("@/assets/login.png");
  background-attachment: fixed;
  background-size: cover;
}

.regist {
  height: 100vh;
  padding-top: 115px;
}

.regist__wrapper {
  background: rgba(255, 255, 255, 0.85);
  backdrop-filter: blur(20px);
  border-radius: 15px;
  max-width: 700px;
  margin: 0 auto;
}

.regist__content {
  padding: 25px 100px 30px 100px;
}

.regist__title {
  margin: 0;
  margin-bottom: 50px;
  text-align: center;
  font-weight: 700;
  font-size: 40px;
  line-height: 100%;
  color: #2d2325;
}

.form__name,
.form__surname,
.form__login,
.form__password {
  width: 100%;
  display: flex;
  flex-direction: column;
  margin-bottom: 15px;
}

label {
  margin-bottom: 15px;
  font-weight: 600;
  font-size: 24px;
  line-height: 100%;
  color: #2d2325;
}

.form__date {
  width: 100%;
}

.form__date>label {
  margin-right: 10px;
}

.input {
  font-family: "Comfortaa";
  padding: 15px 20px;
  background: #ffffff;
  border: 1px solid #395963;
  border-radius: 5px;
  font-weight: 700;
  font-size: 18px;
  line-height: 20px;
}

.input-date {
  padding: 4px;
  font-family: "Comfortaa";
  background: #ffffff;
  border: 1px solid #395963;
  border-radius: 5px;
  font-weight: 700;
  font-size: 18px;
  line-height: 20px;
  margin-bottom: 10px;
}

form {
  display: flex;
  flex-direction: column;
  align-items: center;
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

.form-btn {
  font-family: "Comfortaa";
  background: #395963;
  border-radius: 5px;
  padding: 14px 40px;
  font-weight: 700;
  font-size: 16px;
  line-height: 18px;
  color: #ebeaf0;
}
</style>