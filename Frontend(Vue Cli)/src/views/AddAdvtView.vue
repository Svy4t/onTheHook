<template>
  <div>
    <h1 class="title">Хотите опубликовать объявление?</h1>
    <form v-on:submit.prevent="addAdvt()" class="form">
      <div class="form__left">
        <div class="header_">
          <label class="header__label"> Заголовок </label>
          <input type="text" сlass="input" v-model="header" />
        </div>
        <div class="place">
          <label class="place__label"> Место рыбалки </label>
          <input type="text" v-model="place" />
        </div>
        <div class="car">
          <div class="car__name">
            <label class="car-name__title"> Название автомобиля </label>
            <input type="text" v-model="name_car" />
          </div>
          <div class="car__places">
            <label class="car-places__title"> Количества мест в машине: </label>
            <input type="number" min="0" v-model="places_in_car" />
          </div>
        </div>
      </div>
      <div class="form__center">
        <div class="point">
          <label class="point__label"> Место встречи </label>
          <input type="text" v-model="point_meeting" />
        </div>
        <button class="btn-reset form__btn">Опубликовать</button>
      </div>
      <div class="descr">
        <label class="decr__label"> Описание </label>
        <textarea v-model="description" />
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      header: "",
      description: "",
      point_meeting: "",
      place: "",
      name_car: "",
      places_in_car: "",
    };
  },
  methods: {
    addAdvt() {
      axios
        .post("http://cz57780.tw1.ru/api/advt", {
          header: this.header,
          description: this.description,
          point_meeting: this.point_meeting,
          place: this.place,
          token: localStorage.getItem("token"),
        })
        .then((response) => {
          console.log(response);

          axios
            .post("http://cz57780.tw1.ru/api/addCar", {
              header: this.header,
              description: this.description,
              point_meeting: this.point_meeting,
              place: this.place,
              name_car: this.name_car,
              max_places: this.places_in_car,
            })
            .then((res) => {
              console.log(res);
            })
            .catch((e) => {
              console.log(e.response.data);
            });

          alert(response.data);
        })
        .catch((error) => {
          console.log(error.response.data);
        });
    },
  },
};
</script>

<style scoped>
.form {
  display: flex;
  justify-content: space-between;
}

.form__left,
.form__center,
.descr {
  width: calc((100% - 50px) / 3);
  display: flex;
  flex-direction: column;
}

.header_,
.place,
.point {
  display: flex;
  flex-direction: column;
}

.header_ {
  margin-bottom: 20px;
}

.point {
  margin-bottom: 47px;
}

label {
  font-weight: 600;
  font-size: 20px;
  line-height: 100%;
  color: #223835;
  margin-bottom: 10px;
}

input {
  padding: 10px 20px;
  font-family: "Comfortaa";
  font-weight: 700;
  font-size: 18px;
  line-height: 20px;
  background: #ffffff;
  border: 1px solid #395963;
  border-radius: 5px;
}

textarea {
  font-family: "Comfortaa";
  font-weight: 700;
  font-size: 18px;
  line-height: 20px;
  padding: 10px 20px;
  height: 136px;
  background: #ffffff;
  border: 1px solid #395963;
  border-radius: 5px;
  resize: none;
}

.form__btn {
  margin: 0 auto;
  width: min-content;
  font-family: "Comfortaa";
  font-weight: 700;
  font-size: 14px;
  line-height: 16px;
  color: #ebeaf0;
  padding: 15px 30px;
  background: #395963;
  border-radius: 5px;
}
</style>
