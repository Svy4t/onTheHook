<template>
  <div class="back">
    <HeaderComponent :id="userId" />
    <div class="dialog__wrapper">
      <div class="dialog__header">
        <svg
          @click="goBack()"
          class="dialog__prev"
          width="59"
          height="35"
          viewBox="0 0 59 35"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M30.7359 32.9258L3.02897 19.0626C1.3367 18.2159 1.3367 16.7275 3.02897 15.8807L30.7359 2.01749C31.9552 1.40739 33.8828 1.89463 33.8828 2.81296V6.82871C33.8828 9.17989 37.2688 11.0859 41.4457 11.0859H52.7902C54.8787 11.0859 56.5717 12.0389 56.5717 13.2145V21.7288C56.5717 22.9044 54.8787 23.8574 52.7902 23.8574H41.4457C37.2688 23.8574 33.8828 25.7634 33.8828 28.1146V32.1304C33.8828 33.0487 31.9552 33.5359 30.7359 32.9258Z"
            stroke="#F5F7F9"
            stroke-width="3"
            stroke-linecap="round"
          />
        </svg>

        <img
          v-if="interlocutor.avatar"
          class="dialog__avatar"
          :src="'http://cz57780.tw1.ru/avatars/' + interlocutor.avatar"
          alt="avatar"
        />
        <span class="dialog__name">
          {{ interlocutor.name }} {{ interlocutor.surname }}
        </span>
      </div>
      <div class="dialog__messages">
        <div class="dialog__list">
          <div
            v-for="(message, index) in messages"
            :key="index"
            class="dialog__item"
            :class="{
              item__user: message.user_id == userId,
              item__interlocutor: message.user_id != userId,
            }"
          >
            <div class="dialog__item-wrapper">
              <span class="dialog__message">{{ message.text }}</span>
              <span class="dialog__message-time"
                >{{ message.created_at.hours }}:{{
                  message.created_at.min
                }}</span
              >
            </div>
          </div>
        </div>
        <div v-if="rest_message == false" class="dialog__form">
          <input type="text" v-model="text" class="dialog__input" />
          <svg
            @click="send()"
            width="30"
            height="31"
            viewBox="0 0 30 31"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M8.27379 15.5H15.3212M7.79844 14.6446L2.23034 4.62498C1.38909 3.11118 3.00902 1.41977 4.55838 2.19423L28.0261 13.9246C29.3246 14.5737 29.3246 16.4263 28.0261 17.0754L4.55838 28.8058C3.00902 29.5802 1.38909 27.8888 2.23033 26.375L7.79844 16.3554C8.09406 15.8234 8.09406 15.1766 7.79844 14.6446Z"
              stroke="#899DA5"
              stroke-opacity="0.5"
              stroke-width="2"
              stroke-linecap="round"
            />
          </svg>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import HeaderComponent from "../components/HeaderComponent.vue";
import {
  encodeText,
  setCookie,
  decodeText,
  getCookie,
} from "../views/EventsView.vue";

export default {
  data() {
    return {
      encodeText,
      decodeText,
      getCookie,
      setCookie,
      rest_message: false,
      userId: getCookie("id"),
      interlocutor: this.$route.params.id,
      messages: [],
      text: "",
    };
  },
  components: {
    HeaderComponent,
  },
  mounted() {
    this.getUser();
    this.getRests();
  },
  methods: {
    getMessages() {
      axios
        .post("http://cz57780.tw1.ru/api/getMessages", {
          user_id: this.userId,
          interlocutor_id: this.interlocutor.id,
        })
        .then((response) => {
          console.log(response);
          response.data.forEach(element => {
            element.created_at = new Date(element.created_at);
            element.created_at = {
              hours: element.created_at.getHours(),
              min: element.created_at.getMinutes(),
            };
            if (element.created_at.hours < 10) element.created_at.hours = '0' + element.created_at.hours;
            if (element.created_at.min < 10) element.created_at.min = '0' + element.created_at.min;
          });
          this.messages = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getUser() {
      axios
        .post("http://cz57780.tw1.ru/api/getUser", {
          id: this.interlocutor,
        })
        .then((response) => {
          console.log(response);
          this.interlocutor = response.data.user[0];
          this.getMessages();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    goBack() {
      this.$router.back();
    },
    send() {
      axios
        .post("http://cz57780.tw1.ru/api/addMessage", {
          text: this.text,
          interlocutor_id: this.interlocutor.id,
          user_id: this.userId,
        })
        .then((res) => {
          console.log(res);
          this.getMessages();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getRests() {
      axios
        .post("http://cz57780.tw1.ru/api/getRests", {
          id: this.userId,
        })
        .then((res) => {
          console.log(res);
          this.rest_message = res.data.message;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style scoped>
.back {
  min-height: 100vh;
  background-image: url("@/assets/background-for-advts.png");
  background-attachment: fixed;
  background-size: cover;
}

.dialog__wrapper {
  width: 810px;
  margin: 0 auto;
  padding-top: 35px;
}

.dialog__header {
  position: relative;
  display: flex;
  align-items: center;
  background-color: var(--white);
  border-radius: 15px;
  padding: 12px 30px;
}

.dialog__avatar {
  width: 64px;
  height: 64px;
  border-radius: 100%;
  margin-right: 20px;
}

.dialog__name {
  font-weight: 700;
  font-size: 20px;
  line-height: 27px;
  color: var(--blue);
}

.dialog__prev {
  position: absolute;
  top: calc(50% - 31px / 2);
  left: -81px;
}

.dialog__prev:hover {
  fill: var(--white);
  cursor: pointer;
}

.dialog__header {
  margin-bottom: 15px;
}

.dialog__messages {
  display: flex;
  flex-direction: column;
  background-color: var(--white);
  padding: 29px 14px 11px;
  border-radius: 15px;
  height: 700px;
}

.dialog__list {
  display: flex;
  flex-direction: column;
  max-height: 600px;
  overflow: auto;
  margin-bottom: auto;
}

.dialog__item {
  display: flex;
}

.dialog__item.message__user {
  justify-content: flex-end;
}

.dialog__item:not(:last-child) {
  margin-bottom: 15px;
}

.dialog__message {
  display: inline-block;
  max-width: 450px;
  background-color: var(--blue);
  border-radius: 15px;
  padding: 10px 60px 10px 15px;
  color: var(--white);
  font-weight: 500;
  font-size: 14px;
  line-height: 19px;
}

.item__user .dialog__message {
  padding: 10px 15px 10px 60px;
}

.item__user {
  justify-content: flex-end;
}

.dialog__item-wrapper {
  position: relative;
}

.dialog__message-time {
  position: absolute;
  bottom: 6px;
  right: 10px;
  font-weight: 500;
  font-size: 14px;
  line-height: 19px;
  color: var(--grey);
}

.item__user .dialog__message-time {
  left: 10px;
  right: none;
}

.dialog__form {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.dialog__input {
  width: 92.2%;
  background-color: transparent;
  border-radius: 15px;
  border: 1px solid var(--grey);
  padding: 15px 11px;
}
</style>
