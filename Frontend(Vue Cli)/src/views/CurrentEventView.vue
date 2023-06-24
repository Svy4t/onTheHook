<template>
  <div class="current-event">
    <HeaderComponent :id="id" />
    <div class="current-event__wrapper">
      <div class="event__name">Заголовок: {{ event.header }}</div>
      <div class="event__descr">Описание: {{ event.description }}</div>
      <a v-if="id == organizer.id" @click="goFrofile()" class="event__organizer">Организатор: {{ organizer.name }} {{
        organizer.surname
      }}</a>
      <a v-else @click="goFrofile(organizer.token)" class="event__organizer">Организатор: {{ organizer.name }} {{
        organizer.surname
      }}</a>
      <div v-if="role == 'none' && Date.parse(event.end) > new Date()">
        Участников: {{ parts.length }}
        <button v-if="iAmParticipant === false" @click="addPart(event.id)">Участвовать</button>
        <button v-else @click="deletePart(id, event.id)">Не буду участвовать</button>
      </div>
      <div v-if="id == organizer.id || role == 'admin'">
        <h2>Участники:</h2>
        <div v-if="parts.length !== 0">
          <div v-for="(part, index) in parts" :key="index">
            <span>{{ index + 1 }} Участник:</span>
            <span @click="goFrofile(part.token)">{{ part.name }}</span>
            <button @click="deletePart(part.id, event.id)">Удалить</button>
          </div>
        </div>
        <span v-else>Участников нет</span>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import HeaderComponent from "../components/HeaderComponent.vue";
import { encodeText, setCookie, decodeText, getCookie } from '../views/EventsView.vue';

export default {
  components: {
    HeaderComponent,
  },
  data() {
    return {
      encodeText,
      decodeText,
      setCookie,
      getCookie,
      event: [],
      organizer: '',
      eventId: this.$route.params.id,
      parts: '',
      id: getCookie('id'),
      role: getCookie('role'),
      iAmParticipant: ''
    }
  },
  mounted() {
    this.getEvent();
    this.foundParticipant();
  },
  methods: {
    getEvent() {
      axios.get(`http://cz57780.tw1.ru/api/event/${this.eventId}`)
        .then((data) => {
          console.log(data.data[0]);
          this.event = data.data[0];
          this.organizer = this.event.organizer;
          this.parts = this.event.parts;
        })
        .catch((data) => {
          console.log(data);
        })
    },
    foundParticipant() {
      axios.post('http://cz57780.tw1.ru/api/foundParticipant', {
        user_id: this.id,
        event_id: this.eventId
      })
        .then((data) => {
          if (data.data === 0) this.iAmParticipant = false;
          else this.iAmParticipant = true;
        })
        .catch((data) => {
          console.log(data);
        })
    },
    goFrofile(token = null) {
      if (token !== null) {
        this.$router.push(`/profileUser/${token}`);
      }
      else {
        this.$router.push(`/profile`);
      }
    },
    addNot(event_id, user_id, type) {
      switch (type) {
        case 'added':
          axios
            .post("http://cz57780.tw1.ru/api/addNot", {
              user_id: user_id,
              event_id: event_id,
              part_id: this.id,
              header: 'Новый участник!!',
              description: 'К вашему мероприятию присоединился: '
            })
            .then((response) => {
              console.log(response.data);
            })
            .catch((error) => {
              console.log(error.data);
            });
          break;
        case 'deleted':
          axios
            .post("http://cz57780.tw1.ru/api/addNot", {
              user_id: user_id,
              event_id: event_id,
              part_id: this.id,
              header: 'Участник удалился!!',
              description: 'Участник решил не учавствовать в вашем мероприятии: '
            })
            .then((response) => {
              console.log(response.data);
            })
            .catch((error) => {
              console.log(error.data);
            });
          break;
      }
    },
  }
}
</script>

<style scoped>
/* .current-event {} */
</style>