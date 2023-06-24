<template>
  <div class="forms">
    <div class="forms__advt advt">
      <form @submit.prevent="addAdvt()" class="advt__form">
        <h2 class="advt__title">Создание объявления</h2>
        <div class="advt__inputs">
          <div class="advt__input-wrapper">
            <input
              type="text"
              class="advt__input advt__input-header"
              v-model="advtHeader"
            />
            <div class="advt__tooltip">
              <TooltipInputComponent
                :text="'Заголовок обязателен, минимум 2 символа'"
              />
            </div>
            <span
              class="advt__label"
              :class="{ 'input-active': advtHeader !== '' }"
              >Заголовок</span
            >
          </div>
          <div class="advt__input-wrapper">
            <input
              type="text"
              class="advt__input advt__input-point"
              v-model="advtPointMeeting"
            />
            <div class="advt__tooltip">
              <TooltipInputComponent
                :text="'Напиши место встречи, минимум 2 символа'"
              />
            </div>
            <span
              class="advt__label"
              :class="{ 'input-active': advtPointMeeting !== '' }"
              >Место встречи</span
            >
          </div>
          <div class="advt__input-wrapper">
            <input
              type="date"
              min="2023-06-23"
              class="advt__input advt__input-date"
              v-model="advtDate"
            />
            <div class="advt__tooltip">
              <TooltipInputComponent
                :text="'Выберите дату поездки, поле обязательно'"
              />
            </div>
            <span class="advt__label input-active">Дата</span>
          </div>
          <div class="advt__input-wrapper">
            <input
              type="text"
              class="advt__input advt__input-car"
              v-model="carName"
            />
            <div class="advt__tooltip">
              <TooltipInputComponent
                :text="'Напишите вашу марку машины, поле обязательно'"
              />
            </div>
            <span
              class="advt__label"
              :class="{ 'input-active': carName !== '' }"
              >Марка машины</span
            >
          </div>
          <div class="advt__input-wrapper">
            <input
              type="text"
              class="advt__input advt__input-car"
              v-model="carSeries"
            />
            <div class="advt__tooltip">
              <TooltipInputComponent
                :text="'Напишите модель машины, поле обязательно'"
              />
            </div>
            <span
              class="advt__label"
              :class="{ 'input-active': carSeries !== '' }"
              >Модель машины</span
            >
          </div>
          <div class="advt__input__dates">
            <div class="advt__input-wrapper">
              <input
                min="2"
                max="8"
                type="number"
                class="advt__input advt__input-places"
                v-model="maxPlaces"
              />
              <div class="advt__tooltip">
                <TooltipInputComponent
                  :text="'Напишите скольки местная ваша машина, поле обязательно'"
                />
              </div>
              <span class="advt__label input-active">Кол-во мест в машине</span>
            </div>
            <div class="advt__input-wrapper">
              <input
                type="number"
                min="1"
                :max="maxPlaces - 1"
                class="advt__input advt__input-number-of-seats"
                v-model="allowedNumberOfSeats"
              />
              <div class="advt__tooltip">
                <TooltipInputComponent
                  :text="'Выберите число пассажиров, поле обязательно'"
                />
              </div>
              <span class="advt__label input-active">Сколько поедут?</span>
            </div>
          </div>
          <div class="advt__input-wrapper">
            <textarea
              class="advt__input advt__input-descr"
              v-model="advtDescr"
              rows="3"
            ></textarea>
            <div class="advt__tooltip">
              <TooltipInputComponent
                :text="'Описание не должно первышать 2555 символов, поле обязательно'"
              />
            </div>
            <span
              class="advt__label"
              :class="{ 'input-active': advtDescr !== '' }"
              >Описание</span
            >
          </div>
        </div>
        <button v-if="rest_advt == false" class="advt__btn">CОЗДАТЬ</button>
        {{ series }}
      </form>
    </div>
    <div class="forms__event event">
      <form @submit.prevent="addEvent()" class="event__form">
        <h2 class="form__title">Создание мероприятия</h2>
        <div class="event__input-wrapper">
          <input
            type="text"
            class="event__input event__input-header"
            v-model="eventHeader"
          />
          <div class="event__tooltip">
            <TooltipInputComponent
              :text="'Минимум 11 символов, поле обязательно'"
            />
          </div>
          <span
            class="event__label"
            :class="{ 'input-active': eventHeader !== '' }"
            >Заголовок</span
          >
        </div>
        <div class="event__input-wrapper">
          <input
            type="text"
            class="event__input event__input-place"
            v-model="eventPlace"
          />
          <div class="event__tooltip">
            <TooltipInputComponent
              :text="'Напишите где будет проходить ваше соревнование, лучше всего адрес или знакомое место(тур-база), поле обязательно'"
            />
          </div>
          <span
            class="event__label"
            :class="{ 'input-active': eventPlace !== '' }"
            >Место проведения</span
          >
        </div>
        <div class="event__input-wrapper">
          <input
            type="number"
            class="event__input event__input-win"
            v-model="win"
          />
          <div class="event__tooltip">
            <TooltipInputComponent
              :text="'Какой будет выйгрыш, нужно написать цифрами, поле обязательно'"
            />
          </div>
          <span class="event__label" :class="{ 'input-active': win !== '' }"
            >Выйгрыш</span
          >
        </div>
        <div class="event__input-wrapper">
          <input
            type="number"
            max="20"
            min="4"
            class="event__input event__input-people"
            v-model="max_people"
          />
          <div class="event__tooltip">
            <TooltipInputComponent
              :text="'Выберите кол-во участников соревнования, мин. 4, макс. 20, поле обязательно'"
            />
          </div>
          <span
            class="advt__label"
            :class="{ 'input-active': max_people !== '' }"
            >Макс. кол-во участвующих</span
          >
        </div>
        <div class="event__input-wrapper">
          <input
            type="date"
            min="2023-06-23"
            class="event__input event__input-day"
            v-model="eventDay"
          />
          <div class="event__tooltip">
            <TooltipInputComponent :text="'Выберите день, поле обязательно'" />
          </div>
          <span class="event__label input-active">День проведения</span>
        </div>
        <div class="event__time">
          <div class="event__input-wrapper">
            <input
              type="time"
              class="event__input event__input-start"
              v-model="eventStart"
            />
            <div class="event__tooltip">
              <TooltipInputComponent
                :text="'Выберите время начала соревнования, поле обязательно'"
              />
            </div>
            <span class="event__label input-active">Время начала</span>
          </div>
          <div class="event__input-wrapper">
            <input
              type="time"
              class="event__input event__input-end"
              :min="eventStart"
              v-model="eventEnd"
            />
            <div class="event__tooltip">
              <TooltipInputComponent
                :text="'Выберите время окончания соревнования, поле обязательно'"
              />
            </div>
            <span class="event__label input-active">Время окончания</span>
          </div>
        </div>
        <div class="event__input-wrapper">
          <textarea
            class="event__input event__input-descr"
            v-model="eventDescr"
            rows="3"
          ></textarea>
          <div class="event__tooltip">
            <TooltipInputComponent
              :text="'Описание не должно превышать 5000 символов, поле обязательно'"
            />
          </div>
          <span
            class="event__label"
            :class="{ 'input-active': eventDescr !== '' }"
            >Описание</span
          >
        </div>
        <button v-if="rest_event == false" class="event__btn">
          Подать заявку
        </button>
      </form>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import TooltipInputComponent from "./TooltipInputComponent.vue";

export default {
  components: {
    TooltipInputComponent,
  },
  data() {
    return {
      DBcars: "",

      advtHeader: "",
      advtDescr: "",
      advtPointMeeting: "",
      advtDate: "",
      carName: "",
      carSeries: "",
      maxPlaces: 2,
      allowedNumberOfSeats: 1,

      eventHeader: "",
      eventDescr: "",
      eventPlace: "",
      win: "",
      max_people: "",
      eventDay: "",
      eventStart: "",
      eventEnd: "",

      rest_advt: false,
      rest_event: false,
    };
  },
  mounted() {
    this.getDBcars();
    this.getRests(this.id);
  },
  props: {
    id: String,
  },
  watch: {},
  methods: {
    getDBcars() {
      axios
        .get("https://cars-base.ru/api/cars?full=1")
        .then((res) => {
          // console.log(res);
          this.DBcars = res.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    addAdvt() {
      let car = this.DBcars.filter((el) => el.id === this.carName)[0];
      if (car === undefined) {
        alert("Такой марки машины нет!");
        return;
      }
      let series = car.models.filter((el) => el.name === this.carSeries)[0];
      if (series === undefined) {
        alert("Такой машины нет! Исправьте модель машины");
        return;
      }
      axios
        .post("http://cz57780.tw1.ru/api/advt", {
          user_id: this.id,
          header: this.advtHeader,
          description: this.advtDescr,
          point_meeting: this.advtPointMeeting,
          date: this.advtDate,
        })
        .then((res) => {
          console.log(res.data);
          this.addNot(this.id);
          axios
            .post("http://cz57780.tw1.ru/api/addCar", {
              header: this.advtHeader,
              description: this.advtDescr,
              point_meeting: this.advtPointMeeting,
              name_car: this.carName + " " + this.carSeries,
              max_places: this.maxPlaces,
              allowed_number_of_seats: this.allowedNumberOfSeats,
              country: car.country,
              class: series.class,
              year_from: series["year-from"],
              year_to: series["year-to"],
            })
            .then((response) => {
              console.log(response.data);
              alert('Объявление создано');
            })
            .catch((error) => {
              error.response.data.errors = Object.values(error.response.data.errors);
              alert(error.response.data.errors[0][0]);
            });
        })
        .catch((error) => {
          error.response.data.errors = Object.values(error.response.data.errors);
          alert(error.response.data.errors[0]);
        });
    },
    addEvent() {
      axios
        .post("http://cz57780.tw1.ru/api/addEvent", {
          header: this.eventHeader,
          description: this.eventDescr,
          place: this.eventPlace,
          organizer: this.id,
          win: this.win,
          max_people: this.max_people,
          day: this.eventDay,
          start: this.eventStart,
          end: this.eventEnd,
        })
        .then((res) => {
          console.log(res);
        })
        .catch((error) => {
          error.response.data.errors = Object.values(
            error.response.data.errors
          );
          alert(error.response.data.errors[0][0]);
        });
    },
    getRests(id) {
      axios
        .post("http://cz57780.tw1.ru/api/getRests", {
          id: id,
        })
        .then((res) => {
          console.log(res);
          this.rest_event = res.data.event;
          this.rest_advt = res.data.advt;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    addNot(id) {
      axios
        .post("http://cz57780.tw1.ru/api/addNot", {
          user_id: id,
          description: "Вы успешно cоздали объявление!",
        })
        .then((response) => {
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
<style scoped>
.forms {
  display: flex;
  justify-content: space-between;
}

.forms__advt {
  width: 700px;
  background-color: var(--white);
  border-radius: 15px;
  margin-right: 5px;
}

.advt__form {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px 30px;
}

.advt__input-wrapper {
  position: relative;
  display: flex;
  width: 450px;
}

.advt__input-wrapper:not(:last-child) {
  margin-bottom: 30px;
}

.advt__title {
  margin: 0;
  margin-bottom: 40px;
  font-weight: 500;
  font-size: 28px;
  line-height: 38px;
  color: var(--blue);
  text-align: center;
}

.advt__input {
  position: relative;
  z-index: 1;
  width: 100%;
  padding: 7px 15px;
  border-radius: 10px;
  background-color: transparent;
  font-weight: 400;
  font-size: 16px;
  line-height: 22px;
  color: var(--blue);
  border: 1px solid var(--grey);
}

.advt__inputs {
  margin-bottom: 30px;
}

.advt__input-descr,
.event__input-descr {
  resize: none;
}

.advt__input__dates {
  max-width: 450px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 30px;
}

.advt__input__dates .advt__input-wrapper {
  margin: 0;
  width: 205px;
}

.advt__btn,
.event__btn {
  font-weight: 700;
  font-size: 16px;
  line-height: 22px;
  color: var(--white);
  background-color: var(--red);
  padding: 11px 66px;
  border: none;
  border-radius: 15px;
  cursor: pointer;
}

.advt__btn:hover,
.event__btn:hover {
  outline: 1px solid var(--blue);
}

.advt__label,
.event__label {
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

.forms__event {
  width: 700px;
  background-color: var(--white);
  border-radius: 15px;
}

.event__form {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px 30px;
}

.event__input-wrapper {
  position: relative;
  display: flex;
  width: 450px;
}

.event__input-wrapper:not(:last-child) {
  margin-bottom: 30px;
}

.form__title {
  margin: 0;
  margin-bottom: 40px;
  font-weight: 500;
  font-size: 28px;
  line-height: 38px;
  color: var(--blue);
  text-align: center;
}

.event__input {
  position: relative;
  z-index: 1;
  width: 100%;
  padding: 7px 15px;
  border-radius: 10px;
  background-color: transparent;
  font-weight: 400;
  font-size: 16px;
  line-height: 22px;
  color: var(--blue);
  border: 1px solid var(--grey);
}

.event__time {
  width: 450px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 30px;
}

.event__time .event__input-wrapper {
  width: 205px;
  margin: 0;
}

.advt__tooltip,
.event__tooltip {
  display: none;
  position: absolute;
  bottom: 100%;
  left: 0;
}

.advt__input:focus + .advt__tooltip,
.event__input:focus + .event__tooltip {
  display: block;
}
</style>
