<template>
  <div class="events">
    <HeaderComponentVue :id="userId" />
    <div class="events__main">
      <div class="events__headers">
        <span
          @click="tab('All')"
          class="events__header events__header-all events__header-active"
          >Список мероприятий</span
        >
        <span v-if="userId" @click="tab('My')" class="events__header events__header-my"
          >Мои участия</span
        >
        <span
          v-if="role === 'admin'"
          @click="tab('Admin')"
          class="events__header events__header-admin"
          >Админ-панель</span
        >
      </div>
      <div class="events__wrapper">
        <div class="events__content">
          <div
            v-for="(event, index) in events"
            :key="index"
            @click="showAdvt(event.id)"
            class="event"
          >
            <div class="event__header">
              <div class="event__header-place">
                <svg
                  width="24"
                  height="29"
                  viewBox="0 0 24 29"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M12 0C8.8174 0 5.76516 1.22214 3.51472 3.39755C1.26428 5.57297 0 8.52346 0 11.6C0 19.4299 10.575 28.2749 11.025 28.6519C11.2967 28.8766 11.6425 29 12 29C12.3575 29 12.7033 28.8766 12.975 28.6519C13.5 28.2749 24 19.4299 24 11.6C24 8.52346 22.7357 5.57297 20.4853 3.39755C18.2348 1.22214 15.1826 0 12 0ZM12 25.5924C8.805 22.6924 3 16.4429 3 11.6C3 9.29259 3.94821 7.07971 5.63604 5.44815C7.32387 3.81659 9.61305 2.89999 12 2.89999C14.3869 2.89999 16.6761 3.81659 18.364 5.44815C20.0518 7.07971 21 9.29259 21 11.6C21 16.4429 15.195 22.7069 12 25.5924ZM12 5.79998C10.8133 5.79998 9.65327 6.14014 8.66658 6.77745C7.67988 7.41476 6.91085 8.3206 6.45672 9.38041C6.0026 10.4402 5.88378 11.6064 6.11529 12.7315C6.3468 13.8566 6.91824 14.89 7.75736 15.7012C8.59647 16.5123 9.66557 17.0647 10.8295 17.2885C11.9933 17.5123 13.1997 17.3974 14.2961 16.9584C15.3925 16.5195 16.3295 15.7761 16.9888 14.8223C17.6481 13.8685 18 12.7471 18 11.6C18 10.0617 17.3679 8.58646 16.2426 7.49876C15.1174 6.41105 13.5913 5.79998 12 5.79998ZM12 14.5C11.4067 14.5 10.8266 14.3299 10.3333 14.0112C9.83994 13.6926 9.45542 13.2396 9.22836 12.7097C9.0013 12.1798 8.94189 11.5967 9.05764 11.0342C9.1734 10.4717 9.45912 9.95493 9.87868 9.54936C10.2982 9.14379 10.8328 8.86759 11.4147 8.75569C11.9967 8.6438 12.5999 8.70123 13.1481 8.92072C13.6962 9.14021 14.1648 9.51191 14.4944 9.98881C14.8241 10.4657 15 11.0264 15 11.6C15 12.3691 14.6839 13.1067 14.1213 13.6506C13.5587 14.1944 12.7956 14.5 12 14.5Z"
                    fill="#E51717"
                  />
                </svg>
                {{ event.place }}
              </div>
              <div class="event__header-people">
                <svg
                  width="22"
                  height="17"
                  viewBox="0 0 22 17"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M11.3 8.72C11.8336 8.25813 12.2616 7.68688 12.5549 7.04502C12.8482 6.40316 13 5.70571 13 5C13 3.67392 12.4732 2.40215 11.5355 1.46447C10.5979 0.526784 9.32608 1.78911e-07 8 1.78911e-07C6.67392 1.78911e-07 5.40215 0.526784 4.46447 1.46447C3.52678 2.40215 3 3.67392 3 5C2.99999 5.70571 3.1518 6.40316 3.44513 7.04502C3.73845 7.68688 4.16642 8.25813 4.7 8.72C3.30014 9.35388 2.11247 10.3775 1.27898 11.6685C0.445495 12.9596 0.00147185 14.4633 0 16C0 16.2652 0.105357 16.5196 0.292893 16.7071C0.48043 16.8946 0.734784 17 1 17C1.26522 17 1.51957 16.8946 1.70711 16.7071C1.89464 16.5196 2 16.2652 2 16C2 14.4087 2.63214 12.8826 3.75736 11.7574C4.88258 10.6321 6.4087 10 8 10C9.5913 10 11.1174 10.6321 12.2426 11.7574C13.3679 12.8826 14 14.4087 14 16C14 16.2652 14.1054 16.5196 14.2929 16.7071C14.4804 16.8946 14.7348 17 15 17C15.2652 17 15.5196 16.8946 15.7071 16.7071C15.8946 16.5196 16 16.2652 16 16C15.9985 14.4633 15.5545 12.9596 14.721 11.6685C13.8875 10.3775 12.6999 9.35388 11.3 8.72ZM8 8C7.40666 8 6.82664 7.82405 6.33329 7.49441C5.83994 7.16476 5.45542 6.69623 5.22836 6.14805C5.0013 5.59987 4.94189 4.99667 5.05764 4.41473C5.1734 3.83279 5.45912 3.29824 5.87868 2.87868C6.29824 2.45912 6.83279 2.1734 7.41473 2.05764C7.99667 1.94189 8.59987 2.0013 9.14805 2.22836C9.69623 2.45542 10.1648 2.83994 10.4944 3.33329C10.8241 3.82664 11 4.40666 11 5C11 5.79565 10.6839 6.55871 10.1213 7.12132C9.55871 7.68393 8.79565 8 8 8ZM17.74 8.32C18.38 7.59933 18.798 6.70905 18.9438 5.75634C19.0896 4.80362 18.9569 3.82907 18.5618 2.95C18.1666 2.07093 17.5258 1.3248 16.7165 0.801423C15.9071 0.27805 14.9638 -0.0002576 14 1.78911e-07C13.7348 1.78911e-07 13.4804 0.105357 13.2929 0.292893C13.1054 0.48043 13 0.734784 13 1C13 1.26522 13.1054 1.51957 13.2929 1.70711C13.4804 1.89464 13.7348 2 14 2C14.7956 2 15.5587 2.31607 16.1213 2.87868C16.6839 3.44129 17 4.20435 17 5C16.9986 5.52524 16.8593 6.0409 16.5961 6.49542C16.3328 6.94994 15.9549 7.32738 15.5 7.59C15.3517 7.67552 15.2279 7.79766 15.1404 7.94474C15.0528 8.09182 15.0045 8.2589 15 8.43C14.9958 8.59976 15.0349 8.7678 15.1137 8.91826C15.1924 9.06872 15.3081 9.19665 15.45 9.29L15.84 9.55L15.97 9.62C17.1754 10.1917 18.1923 11.096 18.901 12.2263C19.6096 13.3566 19.9805 14.6659 19.97 16C19.97 16.2652 20.0754 16.5196 20.2629 16.7071C20.4504 16.8946 20.7048 17 20.97 17C21.2352 17 21.4896 16.8946 21.6771 16.7071C21.8646 16.5196 21.97 16.2652 21.97 16C21.9782 14.4654 21.5938 12.9543 20.8535 11.6101C20.1131 10.2659 19.0413 9.13331 17.74 8.32Z"
                    fill="#192A39"
                  />
                </svg>
                {{ event.parts.length }}
              </div>
            </div>
            <div class="event__content">{{ event.header }}</div>
            <div class="event__footer">
              <div class="event__footer-person">
                <img
                  class="event__footer-img"
                  :src="
                    'http://cz57780.tw1.ru/avatars/' + event.organizer.avatar
                  "
                  alt=""
                />
                <span class="event__org"
                  >{{ event.organizer.name }}
                  {{ event.organizer.surname }}</span
                >
              </div>
              <div
                class="event__footer-status event__footer-status__comming-soon"
              >
                <svg
                  width="20"
                  height="20"
                  viewBox="0 0 20 20"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17317C0.00433284 8.00043 -0.193701 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8079C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7363 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM10 18C8.41775 18 6.87104 17.5308 5.55544 16.6518C4.23985 15.7727 3.21447 14.5233 2.60897 13.0615C2.00347 11.5997 1.84504 9.99113 2.15372 8.43928C2.4624 6.88743 3.22433 5.46197 4.34315 4.34315C5.46197 3.22433 6.88743 2.4624 8.43928 2.15372C9.99113 1.84504 11.5997 2.00346 13.0615 2.60896C14.5233 3.21447 15.7727 4.23984 16.6518 5.55544C17.5308 6.87103 18 8.41775 18 10C18 12.1217 17.1572 14.1566 15.6569 15.6569C14.1566 17.1571 12.1217 18 10 18ZM13.1 10.63L11 9.42V5C11 4.73478 10.8946 4.48043 10.7071 4.29289C10.5196 4.10536 10.2652 4 10 4C9.73479 4 9.48043 4.10536 9.2929 4.29289C9.10536 4.48043 9 4.73478 9 5V10C9 10 9 10.08 9 10.12C9.00593 10.1889 9.02281 10.2564 9.05 10.32C9.0706 10.3793 9.09741 10.4363 9.13 10.49C9.15737 10.5468 9.1909 10.6005 9.23 10.65L9.39001 10.78L9.48 10.87L12.08 12.37C12.2324 12.4564 12.4048 12.5012 12.58 12.5C12.8014 12.5015 13.0171 12.4296 13.1932 12.2953C13.3693 12.1611 13.4959 11.9722 13.5531 11.7583C13.6103 11.5444 13.5948 11.3176 13.5092 11.1134C13.4236 10.9092 13.2726 10.7392 13.08 10.63H13.1Z"
                    fill="#899DA5"
                  />
                </svg>
                {{ event.day }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="show-event">
      <svg
        class="show-event__cancel"
        @click="toggleEvent()"
        width="32"
        height="32"
        viewBox="0 0 32 32"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M29.7357 2.26433C28.0499 0.578557 25.3167 0.578557 23.6309 2.26433L16.7631 9.13217C16.3417 9.55361 15.6584 9.55361 15.2369 9.13217L8.36908 2.26433C6.6833 0.578556 3.95011 0.578555 2.26434 2.26433C0.578557 3.95011 0.578557 6.6833 2.26433 8.36907L9.13217 15.2369C9.55361 15.6584 9.55361 16.3416 9.13217 16.7631L2.26433 23.6309C0.578555 25.3167 0.578556 28.0499 2.26433 29.7357C3.95011 31.4214 6.6833 31.4214 8.36907 29.7357L15.2369 22.8678C15.6584 22.4464 16.3416 22.4464 16.7631 22.8678L23.6309 29.7357C25.3167 31.4214 28.0499 31.4214 29.7357 29.7357C31.4214 28.0499 31.4214 25.3167 29.7357 23.6309L22.8678 16.7631C22.4464 16.3416 22.4464 15.6584 22.8678 15.2369L29.7357 8.36907C31.4214 6.6833 31.4214 3.95011 29.7357 2.26433Z"
          stroke="#F5F7F9"
          stroke-width="2"
        />
      </svg>
      <ShowEventComponentVue :id="eventId" :openList="openList" />
    </div>
  </div>
</template>

<script>
import Cookies from "js-cookie";
import axios from "axios";
import HeaderComponentVue from "@/components/HeaderComponent.vue";
import ShowEventComponentVue from "@/components/ShowEventComponent.vue";

export function encodeText(value) {
  return btoa(`${encodeURIComponent(`?${value}&`)}`);
}
export function decodeText(value) {
  return decodeURIComponent(atob(value));
}
export function setCookie(name, value, time) {
  return Cookies.set(encodeText(name), encodeText(value), {
    expires: time,
    SameSite: "lax",
  });
}
export function getCookie(name) {
  if (Cookies.get(encodeText(name)) !== undefined) {
    let text = decodeText(Cookies.get(encodeText(name)));
    text = text.substr(1, text.length - 2);
    return text;
  } else return undefined;
}
export default {
  components: {
    HeaderComponentVue,
    ShowEventComponentVue,
  },
  data() {
    return {
      events: [],
      userId: getCookie("id"),
      role: getCookie("role"),
      start: "",
      end: "",
      header: "",
      descr: "",
      login: "",
      eventId: Number,
      openList: "All",
    };
  },
  mounted() {
    this.getEvents();
  },
  methods: {
    getEvents() {
      axios
        .get("http://cz57780.tw1.ru/api/allEvents")
        .then((response) => {
          console.log(response.data);
          this.events = response.data;
        })
        .catch((error) => {
          console.log(error.data);
        });
    },
    parseDate(str, stat) {
      let newDate = new Date(str);
      switch (stat) {
        case "hours":
          newDate = newDate.getHours();
          if (newDate < 10) newDate = `0${newDate}`;
          break;
        case "min":
          newDate = newDate.getMinutes();
          if (newDate < 10) newDate = `0${newDate}`;
          break;
      }
      return newDate;
    },
    encodeText(value) {
      return btoa(`${encodeURIComponent(`?${value}&`)}`);
    },
    decodeText(value) {
      return decodeURIComponent(atob(value));
    },
    setCookie(name, value, time) {
      return Cookies.set(this.encodeText(name), this.encodeText(value), {
        expires: time,
      });
    },
    getCookie(name) {
      let text = this.decodeText(Cookies.get(this.encodeText(name)));
      text = text.substr(1, text.length - 2);
      return text;
    },
    addEvent(start, end, header, descr, login) {
      axios
        .post("http://cz57780.tw1.ru/api/addEvent", {
          start: start,
          end: end,
          header: header,
          description: descr,
          login: login,
        })
        .then((response) => {
          console.log(response.data);
          this.addNot(response.data.event_id, response.data.user_id);
          this.getEvents();
        })
        .catch((error) => {
          error.response.data.errors = Object.values(
            error.response.data.errors
          );
          alert(error.response.data.errors[0][0]);
        });
    },
    myPartisipation() {
      axios
        .post("http://cz57780.tw1.ru/api/myEvents", {
          user_id: this.userId,
        })
        .then((response) => {
          console.log(response.data);
          this.events = response.data;
        })
        .catch((error) => {
          console.log(error.data);
        });
    },
    // addNot(event_id, user_id) {
    //   axios
    //     .post("http://cz57780.tw1.ru/api/addNot", {
    //       user_id: user_id,
    //       event_id: event_id,
    //       header: `Вы организатор мероприятия`,
    //       description: "Посмотрите свое мероприятие ->",
    //     })
    //     .then((response) => {
    //       console.log(response.data);
    //     })
    //     .catch((error) => {
    //       console.log(error.data);
    //     });
    // },
    toggleEvent() {
      document.querySelector(".show-event").classList.toggle("event-open");
    },
    showAdvt(id) {
      this.eventId = id;
      this.toggleEvent();
    },
    getNoConfirmEvents() {
      axios
        .get("http://cz57780.tw1.ru/api/getNotConfirmedEvents")
        .then((response) => {
          console.log(response.data);
          this.events = response.data;
        })
        .catch((error) => {
          console.log(error.data);
        });
    },
    tab(text) {
      this.openList = text;
      document
        .querySelector(".events__header-all")
        .classList.remove("events__header-active");
      document
        .querySelector(".events__header-my")
        .classList.remove("events__header-active");
      document
        .querySelector(".events__header-admin")
        .classList.remove("events__header-active");
      switch (text) {
        case "All":
          this.getEvents();
          document
            .querySelector(".events__header-all")
            .classList.add("events__header-active");
          break;
        case "My":
          this.myPartisipation();
          document
            .querySelector(".events__header-my")
            .classList.add("events__header-active");
          break;
        case "Admin":
          this.getNoConfirmEvents();
          document
            .querySelector(".events__header-admin")
            .classList.add("events__header-active");
          break;
      }
    },
  },
};
</script>

<style scoped>
.events {
  min-height: 100vh;
  background-image: url("@/assets/background-for-advts.png");
  background-size: cover;
  background-attachment: fixed;
}

.event {
  cursor: pointer;
  margin-bottom: 30px;
}

.events__main {
  max-width: 1480px;
  margin: 0 auto;
  padding: 50px 30px;
}

.events__headers {
  display: flex;
  align-items: flex-end;
  column-gap: 15px;
  margin-bottom: 15px;
}

.events__header {
  padding-left: 30px;
  font-weight: 600;
  font-size: 24px;
  line-height: 33px;
  color: var(--white);
  cursor: pointer;
}

.events__header:hover {
  color: var(--red);
}

.events__header-active {
  font-weight: 700;
  font-size: 40px;
  line-height: 54px;
}

.events__content {
  overflow: auto;
  max-height: 777px;
  display: flex;
  flex-wrap: wrap;
  column-gap: 20px;
  justify-content: space-between;
}

.event {
  width: 49.29%;
  background-color: var(--white);
  padding: 15px 30px;
  border-radius: 15px;
}

.event__header {
  display: flex;
  justify-content: space-between;
  margin-bottom: 7px;
}

.event__header-place {
  display: flex;
  align-items: center;
  font-weight: 600;
  font-size: 16px;
  line-height: 22px;
  color: var(--red);
}

.event__header-place svg {
  width: 13px;
  height: 16px;
  margin-right: 5px;
}

.event__header-people {
  display: flex;
  align-items: center;
  font-weight: 600;
  font-size: 16px;
  line-height: 22px;
  color: var(--blue);
}

.event__header-people svg {
  margin-right: 5px;
}

.event__content {
  margin-bottom: 10px;
  font-weight: 700;
  font-size: 18px;
  line-height: 130%;
  color: var(--blue);
}

.event__footer {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
}

.event__footer-person {
  display: flex;
  align-items: center;
  font-weight: 400;
  font-size: 16px;
  line-height: 22px;
  color: var(--blue);
}

.event__footer-img {
  width: 30px;
  height: 30px;
  border-radius: 100%;
  margin-right: 5px;
}

.event__footer-status__is-over {
  display: flex;
  align-items: center;
  font-weight: 500;
  font-size: 16px;
  line-height: 22px;
  color: var(--grey);
}

.event__footer-status__is-over svg {
  margin-right: 7px;
}

.event__footer-status__comming-soon {
  display: flex;
  align-items: center;
  font-weight: 500;
  font-size: 16px;
  line-height: 22px;
  color: var(--grey);
}

.event__footer-status__comming-soon svg {
  margin-right: 7px;
}

.event__footer-status__active {
  display: flex;
  align-items: center;
  font-weight: 500;
  font-size: 16px;
  line-height: 22px;
  color: var(--red);
}

.event__footer-status__active svg {
  margin-right: 7px;
}

.show-event {
  display: none;
  position: absolute;
  left: 0;
  top: 0;
  z-index: 5;
}

.event-open {
  display: block;
}

.show-event__cancel {
  position: relative;
  z-index: 10;
  left: 1365px;
  top: 104px;
  cursor: pointer;
}
</style>
