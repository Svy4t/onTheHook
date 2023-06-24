<template>
  <div class="filter">
    <div v-if="openList === 'All'" class="filter__click">
      <svg
        @click="openWindow()"
        v-if="dateFilter === undefined"
        class="filter__img"
        width="36"
        height="36"
        viewBox="0 0 36 36"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M30.6 0H5.4C3.96783 0 2.59432 0.568927 1.58162 1.58162C0.568927 2.59432 3.2558e-07 3.96783 3.2558e-07 5.4V7.506C-0.000257773 8.2493 0.152939 8.98464 0.45 9.666V9.774C0.704303 10.3517 1.06451 10.8768 1.512 11.322L12.6 22.338V34.2C12.5994 34.5059 12.6767 34.8069 12.8248 35.0746C12.9728 35.3423 13.1866 35.5679 13.446 35.73C13.7325 35.9075 14.063 36.0011 14.4 36C14.6818 35.9983 14.9592 35.9305 15.21 35.802L22.41 32.202C22.7068 32.0524 22.9565 31.8236 23.1312 31.5408C23.306 31.258 23.399 30.9324 23.4 30.6V22.338L34.416 11.322C34.8635 10.8768 35.2237 10.3517 35.478 9.774V9.666C35.7999 8.98997 35.9776 8.2544 36 7.506V5.4C36 3.96783 35.4311 2.59432 34.4184 1.58162C33.4057 0.568927 32.0322 0 30.6 0ZM20.322 20.322C20.1552 20.4902 20.0232 20.6897 19.9336 20.909C19.844 21.1283 19.7986 21.3631 19.8 21.6V29.484L16.2 31.284V21.6C16.2014 21.3631 16.156 21.1283 16.0664 20.909C15.9768 20.6897 15.8448 20.4902 15.678 20.322L6.138 10.8H29.862L20.322 20.322ZM32.4 7.2H3.6V5.4C3.6 4.92261 3.78964 4.46477 4.12721 4.12721C4.46477 3.78964 4.92261 3.6 5.4 3.6H30.6C31.0774 3.6 31.5352 3.78964 31.8728 4.12721C32.2104 4.46477 32.4 4.92261 32.4 5.4V7.2Z"
          fill="white"
        />
      </svg>
      <div class="filter-active" v-else>
        <svg
          @click="openWindow()"
          class="filter-active__img"
          width="36"
          height="36"
          viewBox="0 0 36 36"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M30.6 0H5.4C3.96783 0 2.59432 0.568927 1.58162 1.58162C0.568927 2.59432 3.2558e-07 3.96783 3.2558e-07 5.4V7.506C-0.000257773 8.2493 0.152939 8.98464 0.45 9.666V9.774C0.704303 10.3517 1.06451 10.8768 1.512 11.322L12.6 22.338V34.2C12.5994 34.5059 12.6767 34.8069 12.8248 35.0746C12.9728 35.3423 13.1866 35.5679 13.446 35.73C13.7325 35.9075 14.063 36.0011 14.4 36C14.6818 35.9983 14.9592 35.9305 15.21 35.802L22.41 32.202C22.7068 32.0524 22.9565 31.8236 23.1312 31.5408C23.306 31.258 23.399 30.9324 23.4 30.6V22.338L34.416 11.322C34.8635 10.8768 35.2237 10.3517 35.478 9.774V9.666C35.7999 8.98997 35.9776 8.2544 36 7.506V5.4C36 3.96783 35.4311 2.59432 34.4184 1.58162C33.4057 0.568927 32.0322 0 30.6 0ZM20.322 20.322C20.1552 20.4902 20.0232 20.6897 19.9336 20.909C19.844 21.1283 19.7986 21.3631 19.8 21.6V29.484L16.2 31.284V21.6C16.2014 21.3631 16.156 21.1283 16.0664 20.909C15.9768 20.6897 15.8448 20.4902 15.678 20.322L6.138 10.8H29.862L20.322 20.322ZM32.4 7.2H3.6V5.4C3.6 4.92261 3.78964 4.46477 4.12721 4.12721C4.46477 3.78964 4.92261 3.6 5.4 3.6H30.6C31.0774 3.6 31.5352 3.78964 31.8728 4.12721C32.2104 4.46477 32.4 4.92261 32.4 5.4V7.2Z"
            fill="#192A39"
          />
        </svg>
        <span @click="openWindow()" class="filter-active__span">
          {{ dateFilter }}
        </span>
        <svg
          class="filter-active__close"
          @click="resetFilter()"
          width="16"
          height="16"
          viewBox="0 0 16 16"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <rect
            y="1.41431"
            width="2"
            height="20"
            transform="rotate(-45 0 1.41431)"
            fill="#F23535"
          />
          <rect
            x="14.1426"
            width="2"
            height="20"
            transform="rotate(45 14.1426 0)"
            fill="#F23535"
          />
        </svg>
      </div>
    </div>
    <div class="filter__window">
      <div class="filter__window-wrapper">
        <span class="filter__window-span">Выберите дату:</span>
        <Calendar :min-date="new Date()" v-model="d" :attributes="attributes" />
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import "v-calendar/dist/style.css";
import { Calendar } from "v-calendar";

export default {
  props: {
    openList: String
  },
  components: {
    Calendar,
  },
  data() {
    return {
      dateFilter: this.$route.params.date,
      attributes: [
        {
          highlight: true,
          dates: [],
        },
      ],
      d: "",
    };
  },
  mounted() {
    this.getDates();
    document.addEventListener("click", this.goAdvts);
  },
  unmounted() {
    document.removeEventListener("click", this.goAdvts);
  },
  methods: {
    getDates() {
      axios
        .get("http://cz57780.tw1.ru/api/getDateAdvts")
        .then((data) => {
          for (let index = 0; index < data.data.length; index++) {
            if (new Date(data.data[index]) < new Date()) {
              data.data.splice(index, 1);
              index--;
            }
          }
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
        let date = this.convertDate(e.target.attributes["aria-label"].value);
        if (date.day < 10) date.day = `0${date.day}`;
        // console.log(date);
        this.$router.push(
          `/advertisements/${date.year}-${date.month}-${date.day}`
        );
        this.dateFilter = `${date.year}-${date.month}-${date.day}`;
        this.openWindow();
      }
    },
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
        day: date[1],
        month: date[2],
        year: Number(date[3]),
      };
      return newDate;
    },
    resetFilter() {
      this.$router.push("/advertisements");
      this.advt = this.originalAdvts;
      this.dateFilter = undefined;
    },
    openWindow() {
      document.querySelector(".filter__window").classList.toggle("active");
    },
  },
};
</script>
<style scoped>
.filter {
  margin-right: 20px;
}

.filter__window {
  display: none;
  position: absolute;
  z-index: 5;
  background: #192a39;
  box-shadow: 0px 0px 110px 75px rgba(0, 0, 0, 0.25);
  border-radius: 15px;
}

.active {
  display: block;
}

.filter__window-wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
}

.filter__window-span {
  margin-bottom: 15px;
  font-weight: 600;
  font-size: 26px;
  line-height: 35px;
  color: #ffffff;
}

.filter-active {
  display: flex;
  align-items: center;
  background: #f5f7f9;
  border-radius: 15px;
  padding: 8px 15px;
}

.filter-active__img {
  margin-right: 15px;
  cursor: pointer;
}

.filter-active__span {
  margin-right: 10px;
  font-weight: 600;
  font-size: 24px;
  line-height: 33px;
  color: #192a39;
}

.filter-active__close {
  cursor: pointer;
}

.filter-active__close:hover {
  outline: 1px solid #f23535;
  outline-offset: 5px;
}
</style>
<style>
.vc-highlight {
  background-color: #f23535 !important;
}
</style>
