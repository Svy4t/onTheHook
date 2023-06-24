<template>
  <div class="main">
    <div class="content">
      <div class="main-content__wrapper">
        <div class="main-content__left">
          <div class="main-content__left-header">
            <div class="main-content__left-header__avatar">
              <img
                :src="'http://cz57780.tw1.ru/avatars/' + user.avatar"
                alt="avatar"
                class="main-content__left-header__avatar-img"
              />
              <span class="main-content__left-header__avatar-span">
                {{user.name}} {{user.surname}}
              </span>
              <div class="avatar__btns">
                <DropDownForAvatarComponentVue
                  :mode="'organizer'"
                  :role="role"
                  :partId="user.id"
                  :organizerId="user.id"
                  :userId="userId"
                  :eventId="advt.id"
                />
              </div>
            </div>
            <div class="main-content__left-header__time">
              <svg
                width="20"
                height="20"
                viewBox="0 0 20 20"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17317C0.00433284 8.00043 -0.193701 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8079C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7363 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM10 18C8.41775 18 6.87104 17.5308 5.55544 16.6518C4.23985 15.7727 3.21447 14.5233 2.60897 13.0615C2.00347 11.5997 1.84504 9.99113 2.15372 8.43928C2.4624 6.88743 3.22433 5.46197 4.34315 4.34315C5.46197 3.22433 6.88743 2.4624 8.43928 2.15372C9.99113 1.84504 11.5997 2.00346 13.0615 2.60896C14.5233 3.21447 15.7727 4.23984 16.6518 5.55544C17.5308 6.87103 18 8.41775 18 10C18 12.1217 17.1572 14.1566 15.6569 15.6569C14.1566 17.1571 12.1217 18 10 18ZM13.1 10.63L11 9.42V5C11 4.73478 10.8946 4.48043 10.7071 4.29289C10.5196 4.10536 10.2652 4 10 4C9.73479 4 9.48043 4.10536 9.2929 4.29289C9.10536 4.48043 9 4.73478 9 5V10C9 10 9 10.08 9 10.12C9.00593 10.1889 9.02281 10.2564 9.05 10.32C9.0706 10.3793 9.09741 10.4363 9.13 10.49C9.15737 10.5468 9.1909 10.6005 9.23 10.65L9.39001 10.78L9.48 10.87L12.08 12.37C12.2324 12.4564 12.4048 12.5012 12.58 12.5C12.8014 12.5015 13.0171 12.4296 13.1932 12.2953C13.3693 12.1611 13.4959 11.9722 13.5531 11.7583C13.6103 11.5444 13.5948 11.3176 13.5092 11.1134C13.4236 10.9092 13.2726 10.7392 13.08 10.63H13.1Z"
                  fill="#192A39"
                />
              </svg>
              {{ advt.date }}
            </div>
          </div>
          <div class="main-content__left-place">
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
            {{ advt.point_meeting }}
          </div>
          <div class="main-content__left-text">
            <span class="main-content__left-text__header">
              {{ advt.header }}
            </span>
            <span class="main-content__left-text__description">
              {{ advt.description }}
            </span>
          </div>
        </div>
        <div class="main-content__right">
          <TooltipAdvtComponentVue />
          <CarAdvtComponentVue :car="car" :advt="advt" :openList="openList" />
        </div>
      </div>
      <CommentsComponentVue :comments="comments" :advtId="advt.id" />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import TooltipAdvtComponentVue from "./TooltipAdvtComponent.vue";
import CarAdvtComponentVue from "./CarAdvtComponent.vue";
import CommentsComponentVue from "./CommentsComponent.vue";
import DropDownForAvatarComponentVue from "./DropDownForAvatarComponent.vue";
import {
  encodeText,
  setCookie,
  decodeText,
  getCookie,
} from "../views/EventsView.vue";
export default {
  components: {
    CommentsComponentVue,
    TooltipAdvtComponentVue,
    CarAdvtComponentVue,
    DropDownForAvatarComponentVue,
  },
  data() {
    return {
      encodeText,
      decodeText,
      setCookie,
      getCookie,
      advt: {},
      user: {},
      comments: [],
      car: {},
      comment: 1,
      role: getCookie("role"),
      userId: getCookie("id"),
    };
  },
  props: {
    id: Number,
    openList: String,
  },
  watch: {
    id() {
      this.output();
    },
  },
  mounted() {},
  beforeUpdate() {},
  methods: {
    output() {
      axios
        .post("http://cz57780.tw1.ru/api/getAdvt", {
          id: this.id,
        })
        .then((response) => {
          this.advt = response.data[0];
          this.user = this.advt.user;
          this.comments = this.advt.comments;
          this.car = this.advt.car;
          // console.log(this.comments);
        })
        .catch((error) => {
          console.log(error);
        });
    },

  },
};
</script>

<style scoped>
.main {
  overflow-y: auto;
  position: absolute;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: var(--blue60);
}

.content {
  max-width: 910px;
  margin: 0 auto;
  padding: 100px 30px;
}

.main-content__wrapper {
  display: flex;
  justify-content: space-between;
  background-color: var(--white);
  margin-bottom: 10px;
  border-radius: 15px;
  padding: 20px 40px 30px;
}

.main-content__left {
  display: flex;
  flex-direction: column;
  width: 470px;
}

.main-content__left-header {
  display: flex;
  justify-content: space-between;
  margin-bottom: 15px;
}

.main-content__left-header__avatar {
  position: relative;
  display: flex;
  align-items: center;
}

.main-content__left-header__avatar-img {
  width: 50px;
  height: 50px;
  border-radius: 100%;
  margin-right: 10px;
}

.main-content__left-header__avatar-span {
  font-weight: 500;
  font-size: 20px;
  line-height: 27px;
  color: var(--blue);
}

.main-content__left-header__time {
  display: flex;
  align-items: center;
  font-weight: 500;
  font-size: 18px;
  line-height: 25px;
  color: var(--blue);
}

.main-content__left-header__time svg {
  width: 27px;
  height: 27px;
  margin-right: 10px;
}

.main-content__left-place {
  display: flex;
  margin-bottom: 25px;
  align-items: center;
  align-self: center;
  font-weight: 600;
  font-size: 18px;
  line-height: 25px;
  color: var(--red);
}

.main-content__left-place svg {
  margin-right: 10px;
}

.main-content__left-text {
  display: flex;
  flex-direction: column;
}

.main-content__left-text__header {
  font-weight: 700;
  font-size: 18px;
  line-height: 130%;
  color: var(--blue);
  margin-bottom: 20px;
}

.main-content__left-text__description {
  font-weight: 400;
  font-size: 18px;
  line-height: 130%;
  color: var(--blue);
}

.avatar__btns {
  display: none;
}

.main-content__left-header__avatar:hover .avatar__btns {
  display: block;
  cursor: pointer;
}
</style>
