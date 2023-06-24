<template>
  <div class="background">
    <div class="bans">
      <h2 class="bans__title">Выдача ограничений: (1 - true, 0 - false)</h2>
      <div class="bans__list">
        <div class="bans__item">
          Огр на объявления:{{ currentRests.advt }}
          <div class="bans__item-btns">
            <button
              class="bans__item-btns__add"
              @click="addBan('advt')"
              v-if="currentRests.advt == false"
            >
              Выдать
            </button>
            <button
              class="bans__item-btns__remove"
              @click="removeBan('advt')"
              v-if="currentRests.advt == true"
            >
              Убрать
            </button>
          </div>
        </div>
        <div class="bans__item">
          Огр на уч. в об.:{{ currentRests.car }}
          <div class="bans__item-btns">
            <button
              class="bans__item-btns__add"
              @click="addBan('car')"
              v-if="currentRests.car == false"
            >
              Выдать
            </button>
            <button
              class="bans__item-btns__remove"
              @click="removeBan('car')"
              v-if="currentRests.car == true"
            >
              Убрать
            </button>
          </div>
        </div>
        <div class="bans__item">
          Огр на комментарии:{{ currentRests.comment }}
          <div class="bans__item-btns">
            <button
              class="bans__item-btns__add"
              @click="addBan('comment')"
              v-if="currentRests.comment == false"
            >
              Выдать
            </button>
            <button
              class="bans__item-btns__remove"
              @click="removeBan('comment')"
              v-if="currentRests.comment == true"
            >
              Убрать
            </button>
          </div>
        </div>
        <div class="bans__item">
          Огр на соревнование:{{ currentRests.event }}
          <div class="bans__item-btns">
            <button
              class="bans__item-btns__add"
              @click="addBan('event')"
              v-if="currentRests.event == false"
            >
              Выдать
            </button>
            <button
              class="bans__item-btns__remove"
              @click="removeBan('event')"
              v-if="currentRests.event == true"
            >
              Убрать
            </button>
          </div>
        </div>
        <div class="bans__item">
          Огр на сообщения:{{ currentRests.message }}
          <div class="bans__item-btns">
            <button
              class="bans__item-btns__add"
              @click="addBan('message')"
              v-if="currentRests.message == false"
            >
              Выдать
            </button>
            <button
              class="bans__item-btns__remove"
              @click="removeBan('message')"
              v-if="currentRests.message == true"
            >
              Убрать
            </button>
          </div>
        </div>
        <div class="bans__item">
          Огр на уч. в сорев.:{{ currentRests.part }}
          <div class="bans__item-btns">
            <button
              class="bans__item-btns__add"
              @click="addBan('part')"
              v-if="currentRests.part == false"
            >
              Выдать
            </button>
            <button
              class="bans__item-btns__remove"
              @click="removeBan('part')"
              v-if="currentRests.part == true"
            >
              Убрать
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
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
      setCookie,
      decodeText,
      getCookie,
      currentRests: {},
    };
  },
  props: {
    rests: Object,
    id: Number,
    userId: String,
  },
  watch: {
    rests() {
      this.currentRests = this.rests;
    },
  },
  methods: {
    addBan(rest) {
      let formData = new FormData();
      formData.append(rest, 1);
      formData.append("id", this.id);
      axios
        .post("http://cz57780.tw1.ru/api/restraction", formData)
        .then(() => {
          // console.log(this.userId,this.id);
          if (this.userId == this.id) setCookie(rest, 1);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    removeBan(rest) {
      let formData = new FormData();
      formData.append(rest, 0);
      formData.append("id", this.id);
      console.log(formData);
      axios
        .post("http://cz57780.tw1.ru/api/restraction", formData)
        .then(() => {
          // console.log(res);
          if (this.userId == this.id) setCookie(rest, 0);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
<style scoped>
.background {
  background-color: var(--white);
  border-radius: 10px;
  box-shadow: 0px 0px 110px 75px rgba(0, 0, 0, 0.25);
}

.bans {
  width: 300px;
  padding: 15px 10px;
}

.bans__title {
  font-size: 24px;
  line-height: 130%;
  margin: 0;
  margin-bottom: 10px;
  color: var(--blue);
}

.bans__item {
  color: var(--blue);
  font-size: 18px;
  line-height: 130%;
}
</style>
