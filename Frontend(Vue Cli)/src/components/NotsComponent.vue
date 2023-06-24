<template>
  <div class="main">
    <a @click="openNots()" class="not__link">
      <svg
        width="29"
        height="31"
        viewBox="0 0 29 31"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M18.6726 27.4119C17.5683 28.4003 16.1177 29 14.529 29C12.9403 29 11.4898 28.4003 10.3855 27.4119M23.9218 16.5814V11.5295C23.9218 6.25287 19.7322 2 14.529 2C9.32591 2 5.07958 6.07156 5.07958 11.5295V16.5471V16.5471C5.07958 18.0655 4.26589 19.4257 3.35637 20.6415L2.02119 22.4263C2.01222 22.4383 2.00481 22.4516 2.00229 22.4664C1.98652 22.5586 2.05404 22.647 2.14683 22.647H26.8438C26.9421 22.647 27.0138 22.5569 26.9977 22.4622C26.9952 22.4474 26.9878 22.434 26.9788 22.4219L25.594 20.5637C24.7121 19.3801 23.9218 18.0574 23.9218 16.5814V16.5814Z"
          stroke="#F5F7F9"
          stroke-width="3"
          stroke-linecap="round"
        />
      </svg>
      <span v-if="unreadNots > 0" class="not__unread">{{ unreadNots }}</span>
    </a>
    <div class="nots">
      <div class="nots__wrapper">
        <svg
          @click="closeNots()"
          class="nots__btn-close"
          width="20"
          height="20"
          viewBox="0 0 20 20"
          fill="#f5f7f9"
          xmlns="http://www.w3.org/2000/svg"
        >
          <rect
            y="1.81836"
            width="2.57122"
            height="25.7122"
            transform="rotate(-45 0 1.81836)"
            fill="#192A39"
          />
          <rect
            x="18.1816"
            width="2.57122"
            height="25.7122"
            transform="rotate(45 18.1816 0)"
            fill="#192A39"
          />
        </svg>
        <h2 class="nots__title">Уведомления</h2>
        <div class="not__content-wrapper">
          <div ref="nots11" class="nots__content" v-if="nots.length !== 0">
            <div class="not" v-for="(not, index) in nots" :key="index">
              <svg
                class="not__status"
                v-if="not.status === 'Не прочитано'"
                width="8"
                height="8"
                viewBox="0 0 8 8"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <circle cx="4" cy="4" r="4" fill="#E51717" />
              </svg>
              <div class="not__content">
                <span class="not__descr">
                  {{ not.description }}
                </span>
                <span class="not__date">
                  {{ not.created_at.month }} {{ not.created_at.day }},
                  {{ not.created_at.year }} в {{ not.created_at.hours }}:{{
                    not.created_at.min
                  }}
                </span>
              </div>
              <svg
                v-if="not.interlocutor_id === null"
                class="not__svg"
                width="44"
                height="44"
                viewBox="0 0 44 44"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <circle cx="22" cy="22" r="22" fill="#192A39" />
                <path
                  d="M26.4118 14C26.964 14 27.4118 13.5523 27.4118 13C27.4118 12.4477 26.964 12 26.4118 12V14ZM14.2205 30.7548L14.6768 29.865L14.6768 29.865L14.2205 30.7548ZM13.2436 29.7715L12.3514 30.2231L12.3514 30.2231L13.2436 29.7715ZM30.6387 29.7715L29.7465 29.3198L29.7465 29.3198L30.6387 29.7715ZM29.6619 30.7548L29.2055 29.865L29.2055 29.865L29.6619 30.7548ZM14.2205 13.2452L14.6768 14.135L14.6768 14.135L14.2205 13.2452ZM13.2436 14.2285L14.1358 14.6802L14.1358 14.6802L13.2436 14.2285ZM31.8824 23.125C31.8824 22.5727 31.4346 22.125 30.8824 22.125C30.3301 22.125 29.8824 22.5727 29.8824 23.125H31.8824ZM22.8041 24.5712L22.0922 23.8688L22.0922 23.8688L22.8041 24.5712ZM32.7119 15.9523C33.0997 15.5592 33.0955 14.926 32.7023 14.5381C32.3092 14.1503 31.676 14.1545 31.2881 14.5477L32.7119 15.9523ZM21.218 24.5712L21.9299 23.8688L21.9299 23.8688L21.218 24.5712ZM18.1825 20.0704C17.7946 19.6773 17.1614 19.673 16.7683 20.0609C16.3751 20.4487 16.3708 21.0819 16.7587 21.475L18.1825 20.0704ZM16.5765 14H26.4118V12H16.5765V14ZM27.3059 30H16.5765V32H27.3059V30ZM14 27.4V16.6H12V27.4H14ZM16.5765 30C15.9339 30 15.5125 29.9992 15.1903 29.9727C14.8799 29.9472 14.7509 29.9029 14.6768 29.865L13.7641 31.6446C14.1683 31.8518 14.5913 31.9302 15.0264 31.966C15.4496 32.0008 15.9671 32 16.5765 32V30ZM12 27.4C12 28.0137 11.9992 28.5337 12.0337 28.9587C12.0692 29.3952 12.1467 29.8186 12.3514 30.2231L14.1358 29.3198C14.097 29.2431 14.0527 29.1108 14.0272 28.7969C14.0008 28.4715 14 28.0465 14 27.4H12ZM14.6768 29.865C14.4449 29.746 14.2552 29.5556 14.1358 29.3198L12.3514 30.2231C12.6607 30.8341 13.1549 31.3321 13.7641 31.6446L14.6768 29.865ZM29.8824 27.4C29.8824 28.0465 29.8816 28.4715 29.8552 28.7969C29.8297 29.1108 29.7854 29.2431 29.7465 29.3198L31.5309 30.2231C31.7357 29.8186 31.8132 29.3952 31.8486 28.9587C31.8831 28.5337 31.8824 28.0137 31.8824 27.4H29.8824ZM27.3059 32C27.9152 32 28.4327 32.0008 28.856 31.966C29.2911 31.9302 29.7141 31.8518 30.1182 31.6446L29.2055 29.865C29.1315 29.9029 29.0024 29.9472 28.6921 29.9727C28.3698 29.9992 27.9484 30 27.3059 30V32ZM29.7465 29.3198C29.6272 29.5556 29.4374 29.746 29.2055 29.865L30.1182 31.6446C30.7275 31.3321 31.2216 30.8341 31.5309 30.2231L29.7465 29.3198ZM16.5765 12C15.9671 12 15.4496 11.9992 15.0264 12.034C14.5913 12.0698 14.1683 12.1482 13.7641 12.3554L14.6768 14.135C14.7509 14.0971 14.8799 14.0528 15.1903 14.0273C15.5125 14.0008 15.9339 14 16.5765 14V12ZM14 16.6C14 15.9535 14.0008 15.5285 14.0272 15.2031C14.0527 14.8892 14.097 14.7569 14.1358 14.6802L12.3514 13.7769C12.1467 14.1814 12.0692 14.6048 12.0337 15.0413C11.9992 15.4663 12 15.9863 12 16.6H14ZM13.7641 12.3554C13.1549 12.6679 12.6607 13.1659 12.3514 13.7769L14.1358 14.6802C14.2552 14.4444 14.4449 14.254 14.6768 14.135L13.7641 12.3554ZM31.8824 27.4V23.125H29.8824V27.4H31.8824ZM23.5159 25.2735L32.7119 15.9523L31.2881 14.5477L22.0922 23.8688L23.5159 25.2735ZM21.9299 23.8688L18.1825 20.0704L16.7587 21.475L20.5061 25.2735L21.9299 23.8688ZM22.0922 23.8688C22.0467 23.915 21.9754 23.915 21.9299 23.8688L20.5061 25.2735C21.3348 26.1134 22.6873 26.1134 23.5159 25.2735L22.0922 23.8688Z"
                  fill="#F5F7F9"
                />
              </svg>
              <img
                v-else
                :src="
                  'http://cz57780.tw1.ru/avatars/' + not.interlocutor.avatar
                "
                alt=""
                class="not__avatar"
              />
            </div>
          </div>
          <div v-else>Уведомлений нет!</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {
  encodeText,
  setCookie,
  decodeText,
  getCookie,
} from "../views/EventsView.vue";
import axios from "axios";
export default {
  data() {
    return {
      encodeText,
      decodeText,
      setCookie,
      getCookie,
      id: getCookie("id"),
      nots: [],
      unreadNots: 0,
    };
  },
  mounted() {
    this.getNots();
    this.getUnreadNots();
    // console.log(this.$refs.nots11);
  },
  // watch() {
  //   this.unreadNots(() => {
  //     console.log(this.unreadNots);
  //   });
  // },
  methods: {
    getNots() {
      axios
        .get(`http://cz57780.tw1.ru/api/allNot/${this.id}`, {
          token: this.tokenUser,
        })
        .then((response) => {
          this.nots = response.data;
          this.changeDate(this.nots);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    openNots() {
      document.querySelector(".nots").classList.add("block");
      this.getUnreadNots();
      this.getNots();
    },
    getUnreadNots() {
      axios
        .get(`http://cz57780.tw1.ru/api/allUnreadNot/${this.id}`)
        .then((response) => {
          // console.log(response);
          this.unreadNots = response.data.length;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    goEvent(id) {
      this.$router.push({
        path: `/event/${id}`,
      });
    },
    changeRef() {
      console.log(this.$refs.nots);
    },
    closeNots() {
      document.querySelector(".nots").classList.remove("block");
      if (this.nots.length !== 0) {
        // console.log(this.nots);
        axios
          .post(`http://cz57780.tw1.ru/api/updateStatusNot`, {
            nots_id: this.nots,
          })
          .then(() => {
            this.getUnreadNots();
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    changeDate(nots) {
      nots.forEach((not) => {
        not.created_at = new Date(not.created_at);
        not.created_at = {
          day: not.created_at.getDate(),
          month: not.created_at.getMonth(),
          year: not.created_at.getFullYear(),
          min: not.created_at.getMinutes(),
          hours: not.created_at.getHours(),
        };
        switch (not.created_at.month) {
          case 0:
            not.created_at.month = "Янв";
            break;
          case 1:
            not.created_at.month = "Фев";
            break;
          case 2:
            not.created_at.month = "Мар";
            break;
          case 3:
            not.created_at.month = "Апр";
            break;
          case 4:
            not.created_at.month = "Май";
            break;
          case 5:
            not.created_at.month = "Июн";
            break;
          case 6:
            not.created_at.month = "Июл";
            break;
          case 7:
            not.created_at.month = "Авг";
            break;
          case 8:
            not.created_at.month = "Сен";
            break;
          case 9:
            not.created_at.month = "Окт";
            break;
          case 10:
            not.created_at.month = "Ноя";
            break;
          case 11:
            not.created_at.month = "Дек";
            break;
        }
        if (not.created_at.min < 10)
          not.created_at.min = "0" + not.created_at.min;
        if (not.created_at.hours < 10)
          not.created_at.hours = "0" + not.created_at.hours;
      });
    },
  },
};
</script>

<style scoped>
.nots {
  display: none;
  position: absolute;
  left: 0;
  top: 50px;
  width: 385px;
  color: black;
  height: 345px;
  background-color: #f5f7f9;
  border-radius: 15px;
  padding: 15px 20px;
  box-shadow: 0px 0px 22px 14px rgba(0, 0, 0, 0.25);
}

.block {
  display: block;
}

.main {
  display: flex;
  align-items: center;
  position: relative;
}

.not__link {
  position: relative;
  display: inline-block;
  margin-right: 20px;
}

.not__content-wrapper {
  height: 274px;
  overflow: auto;
}

.not__unread {
  position: absolute;
  z-index: 1;
  background-color: var(--red);
  width: 20px;
  height: 20px;
  border-radius: 100%;
  color: var(--white);
  text-align: center;
  bottom: 3px;
  right: -7px;
}

.link {
  color: violet;
}

.nots__content {
  display: flex;
  flex-direction: column-reverse;
  justify-content: flex-end;
  padding-left: 15px;
}

.not {
  position: relative;
  display: flex;
  column-gap: 15px;
  justify-content: space-between;
  max-width: 315px;
  padding-bottom: 10px;
  margin-bottom: 10px;
}

.not:not(:first-child) {
  border-bottom: 1px solid var(--grey40);
}

.nots__title {
  margin: 0;
  margin-bottom: 20px;
  font-weight: 600;
  font-size: 20px;
  line-height: 27px;
  color: var(--blue);
}

.nots__btn-close {
  position: absolute;
  top: 15px;
  right: 20px;
}

.nots__btn-close:hover {
  cursor: pointer;
}

.nots__btn-close:hover rect {
  fill: var(--grey);
}

.not__descr {
  max-width: 270px;
  font-weight: 500;
  font-size: 16px;
  line-height: 22px;
  color: var(--blue);
  margin-bottom: 5px;
}

.not__date {
  font-weight: 400;
  font-size: 14px;
  line-height: 19px;
  color: var(--grey75);
}

.not__content {
  display: flex;
  flex-direction: column;
}

.not__avatar {
  width: 44px;
  height: 44px;
  border-radius: 100%;
}

.not__status {
  position: absolute;
  top: 7px;
  left: -15px;
}
</style>
