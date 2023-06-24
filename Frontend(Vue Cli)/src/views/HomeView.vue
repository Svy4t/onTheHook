<template>
  <div class="back">
    <!-- <HeaderComponent :id="userId"/> -->
    <div class="main">
      <div class="links">
        <router-link to="/events">Соревенования</router-link> |
        <router-link to="/advertisements">Объявления</router-link>
      </div>
      <div class="main__calendar">
        <h2 class="calendar__title">Выберите дату:</h2>
        <Calendar :min-date="new Date()" v-model="d" :attributes="attributes" />
      </div>
      <p class="main__descr">
        Рыболовный портал "На Крючке" предоставляет вам возможность создавать объявления, соревнования. Здесь вы можете найти новые знакомвства или выйграть интересное мероприятие. С помощью данного сайта легко найти компанию для хорошего времяпровождения на рыбалке. Присоединяйся!
      </p>
      <div class="main__footer">
        <span class="main__footer-span">Пользовательское соглашение</span>
        <span class="main__footer-span">2023</span>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
// import HeaderComponent from "../components/HeaderComponent.vue";
import "v-calendar/dist/style.css";
import { Calendar } from 'v-calendar';
import {
  encodeText,
  setCookie,
  decodeText,
  getCookie,
} from "../views/EventsView.vue";

export default {
  components: {
    // HeaderComponent,
    Calendar
    // DatePicker,
  },
  data() {
    return {
      attributes: [
        {
          highlight: true,
          dates: [],
        },
      ],
      d: "",
      encodeText,
      decodeText,
      getCookie,
      setCookie,
      rest_comment: getCookie("comment"),
      rest_car: getCookie("car"),
      role: getCookie("role"),
      userId: getCookie("id"),
      token: getCookie("token"),
      // advt: [],
      openList: "All",
    };
  },
  mounted() {
    this.getDates();
    document.addEventListener("click", this.goAdvts);
  },
  methods: {
    convertDate(date) {
      date = date.split(" ");
      switch (date[2]) {
        case "января":
          date[2] = "01";
          break;
        case "февраля":
          date[2] = "02";
          break;
        case "марта":
          date[2] = "03";
          break;
        case "апреля":
          date[2] = "04";
          break;
        case "мая":
          date[2] = "05";
          break;
        case "июня":
          date[2] = "06";
          break;
        case "июля":
          date[2] = "07";
          break;
        case "августа":
          date[2] = "08";
          break;
        case "сентября":
          date[2] = "09";
          break;
        case "октября":
          date[2] = 10;
          break;
        case "ноября":
          date[2] = 11;
          break;
        case "декабря":
          date[2] = 12;
          break;
      }
      let newDate = {
        day: Number(date[1]),
        month: date[2],
        year: Number(date[3]),
      };
      return newDate;
    },
    getDates() {
      axios
        .get("http://cz57780.tw1.ru/api/getDateAdvts")
        .then((data) => {
          data.data.forEach((el, index) => {
            if (new Date(el) < new Date()) data.data.splice(index, 1);
          });
          this.attributes = [
            {
              highlight: true,
              dates: data.data,
            },
          ];
        })
        .catch((data) => {
          console.log(data);
        });
    },
    goAdvts(e) {
      if (e.target.classList.contains("vc-day-content")) {
        console.log(e.target.previousSibling.tagName);
        let date = this.convertDate(e.target.attributes["aria-label"].value);
        if (date.day && e.target.previousSibling.tagName === "DIV") {
          document.removeEventListener("click", this.goAdvts);
          this.$router.push(
            `/advertisements/${date.year}-${date.month}-${date.day}`
          );
        }
      }
    },
  },
};
</script>

<style scoped>
.main {
  position: absolute;
  right: 0;
  top: 0;
  width: 650px;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  padding: 30px 0;
  justify-content: space-between;
  align-items: center;
  background-color: var(--blue);
}

.back {
  position: relative;
  min-height: 100vh;
  background-image: url("@/assets/home-back.png");
  background-attachment: fixed;
  background-size: 1300px 100vh;
}

.links {
  font-weight: 500;
  font-size: 18px;
  line-height: 25px;
  color: var(--white);
}

.calendar__title {
  text-align: center;
  margin: 0;
  font-weight: 500;
  font-size: 26px;
  line-height: 35px;
  color: var(--white);
  margin-bottom: 30px;
}

.main__footer {
  display: flex;
  flex-direction: column;
  align-items: center;
  font-weight: 400;
  font-size: 18px;
  line-height: 25px;
  color: var(--white);
}

.main__descr {
  margin: 0;
  padding: 0 73px;
  font-weight: 400;
  font-size: 24px;
  line-height: 130%;
  color: var(--white);
}
</style>
<style>
.vc-highlight {
  background-color: #f23535 !important;
}
</style>