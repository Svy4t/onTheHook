<template>
  <div
    class="comemnts__wrapper"
    v-bind:class="{ 'padding-bottom-60px': formAddFixed === true }"
  >
    <div class="comments">
      <div class="comments__header">
        <svg
          class="comments__header-icon"
          width="21"
          height="19"
          viewBox="0 0 23 22"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M22 4.9378V14.7031C22 15.7456 22 16.2669 21.8093 16.6651C21.6415 17.0153 21.3738 17.3001 21.0445 17.4786C20.6701 17.6814 20.1801 17.6814 19.2 17.6814C18.8134 17.6814 18.5 18.0084 18.5 18.4117V19.5356C18.5 19.9196 18.0781 20.1371 17.7858 19.9038L16.004 18.4824C15.6316 18.1853 15.4454 18.0368 15.2397 17.9312C15.0571 17.8376 14.8637 17.7693 14.6642 17.728C14.4393 17.6814 14.2049 17.6814 13.7361 17.6814H9.16664M3.8 1H15.7C16.6801 1 17.1701 1 17.5445 1.20289C17.8738 1.38135 18.1415 1.66611 18.3093 2.01637C18.5 2.41455 18.5 2.93581 18.5 3.97832V11.0518C18.5 12.0943 18.5 12.6156 18.3093 13.0138C18.1415 13.364 17.8738 13.6488 17.5445 13.8273C17.1701 14.0301 16.6801 14.0301 15.7 14.0301H9.26386C8.79507 14.0301 8.56068 14.0301 8.33583 14.0767C8.13633 14.118 7.94285 14.1863 7.76032 14.2799C7.55462 14.3855 7.36842 14.534 6.99604 14.8311L5.21424 16.2525C4.92187 16.4858 4.5 16.2683 4.5 15.8843V14.7604C4.5 14.3571 4.1866 14.0301 3.8 14.0301C2.81991 14.0301 2.32986 14.0301 1.95552 13.8273C1.62623 13.6488 1.35852 13.364 1.19074 13.0138C1 12.6156 1 12.0943 1 11.0518V3.97832C1 2.93581 1 2.41455 1.19074 2.01637C1.35852 1.66611 1.62623 1.38135 1.95552 1.20289C2.32986 1 2.81991 1 3.8 1Z"
            stroke="#192A39"
            stroke-width="2"
            stroke-linecap="round"
          />
        </svg>
        <span class="comments__header-content"
          >Комментарии {{ currentComments.length }}</span
        >
      </div>
      <div class="comments__list">
        <div
          v-for="comment in currentComments"
          :key="comment.id"
          class="comments__item comments-item"
        >
          <svg
            v-if="role === 'admin' || userId == comment.user_id"
            class="comment__delete"
            @click="deleteComment(comment.id)"
            width="19"
            height="21"
            viewBox="0 0 19 21"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M8.07143 8.38889C8.07143 7.8366 7.62371 7.38889 7.07143 7.38889C6.51914 7.38889 6.07143 7.8366 6.07143 8.38889H8.07143ZM6.07143 16.8333C6.07143 17.3856 6.51914 17.8333 7.07143 17.8333C7.62371 17.8333 8.07143 17.3856 8.07143 16.8333H6.07143ZM12.9286 8.38889C12.9286 7.8366 12.4809 7.38889 11.9286 7.38889C11.3763 7.38889 10.9286 7.8366 10.9286 8.38889H12.9286ZM10.9286 16.8333C10.9286 17.3856 11.3763 17.8333 11.9286 17.8333C12.4809 17.8333 12.9286 17.3856 12.9286 16.8333H10.9286ZM3.54031 19.7699L3.94528 18.8556H3.94528L3.54031 19.7699ZM2.47898 18.8473L3.34171 18.3416H3.34171L2.47898 18.8473ZM16.521 18.8473L15.6583 18.3416H15.6583L16.521 18.8473ZM15.4597 19.7699L15.0547 18.8556H15.0547L15.4597 19.7699ZM1 4.22222C0.447715 4.22222 0 4.66994 0 5.22222C0 5.77451 0.447715 6.22222 1 6.22222V4.22222ZM18 6.22222C18.5523 6.22222 19 5.77451 19 5.22222C19 4.66994 18.5523 4.22222 18 4.22222V6.22222ZM4.25 5.22222C4.25 5.77451 4.69772 6.22222 5.25 6.22222C5.80228 6.22222 6.25 5.77451 6.25 5.22222H4.25ZM12.75 5.22222C12.75 5.77451 13.1977 6.22222 13.75 6.22222C14.3023 6.22222 14.75 5.77451 14.75 5.22222H12.75ZM6.07143 8.38889V16.8333H8.07143V8.38889H6.07143ZM10.9286 8.38889V16.8333H12.9286V8.38889H10.9286ZM15.7857 5.22222V16.6222H17.7857V5.22222H15.7857ZM12.9 19H6.1V21H12.9V19ZM1.21429 5.22222V16.6222H3.21429V5.22222H1.21429ZM6.1 19C5.40557 19 4.93707 18.9994 4.57576 18.9738C4.22263 18.9487 4.05358 18.9035 3.94528 18.8556L3.13533 20.6842C3.54654 20.8664 3.97727 20.9363 4.43407 20.9687C4.88271 21.0006 5.4343 21 6.1 21V19ZM1.21429 16.6222C1.21429 17.1944 1.21326 17.6927 1.25176 18.1024C1.29182 18.5285 1.38084 18.9513 1.61626 19.353L3.34171 18.3416C3.31243 18.2917 3.2691 18.1931 3.24299 17.9152C3.21531 17.6208 3.21429 17.2323 3.21429 16.6222H1.21429ZM3.94528 18.8556C3.66269 18.7304 3.45939 18.5424 3.34171 18.3416L1.61626 19.353C1.96425 19.9467 2.504 20.4046 3.13533 20.6842L3.94528 18.8556ZM15.7857 16.6222C15.7857 17.2323 15.7847 17.6208 15.757 17.9152C15.7309 18.1931 15.6876 18.2917 15.6583 18.3416L17.3837 19.353C17.6192 18.9513 17.7082 18.5285 17.7482 18.1024C17.7867 17.6927 17.7857 17.1944 17.7857 16.6222H15.7857ZM12.9 21C13.5657 21 14.1173 21.0006 14.5659 20.9687C15.0227 20.9363 15.4535 20.8664 15.8647 20.6842L15.0547 18.8556C14.9464 18.9035 14.7774 18.9487 14.4242 18.9738C14.0629 18.9994 13.5944 19 12.9 19V21ZM15.6583 18.3416C15.5406 18.5424 15.3373 18.7304 15.0547 18.8556L15.8647 20.6842C16.496 20.4046 17.0358 19.9467 17.3837 19.353L15.6583 18.3416ZM1 6.22222H2.21429V4.22222H1V6.22222ZM2.21429 6.22222H16.7857V4.22222H2.21429V6.22222ZM16.7857 6.22222H18V4.22222H16.7857V6.22222ZM6.25 4.37778C6.25 3.26658 7.47865 2 9.5 2V0C6.82693 0 4.25 1.75798 4.25 4.37778H6.25ZM9.5 2C11.5214 2 12.75 3.26658 12.75 4.37778H14.75C14.75 1.75798 12.1731 0 9.5 0V2ZM4.25 4.37778V5.22222H6.25V4.37778H4.25ZM12.75 4.37778V5.22222H14.75V4.37778H12.75Z"
              fill="#E51710"
            />
          </svg>
          <img
            :src="'http://cz57780.tw1.ru/avatars/' + comment.user.avatar"
            class="comments-item__img"
            alt="avatar"
          />
          <div class="comments-item__content">
            <div class="comments-item__content-header">
              <router-link
                class="comments-item__content-header__name"
                :to="'/profile/' + comment.user.id"
                >{{ comment.user.name }} {{ comment.user.surname }}</router-link
              >
              <span class="comments-item__content-header__time">
                {{ comment.created_at.month }} {{ comment.created_at.day }},
                {{ comment.created_at.year }} в
                {{ comment.created_at.hours }}:{{ comment.created_at.min }}
              </span>
            </div>
            <span class="comments-item__content-description">
              {{ comment.description }}
            </span>
          </div>
        </div>
        <div
          v-if="rest_comment == false"
          class="comments__add-wrapper"
          v-bind:class="{
            'comments__add-wrapper-heigth': formAddFixed === true,
          }"
        >
          <form
            action=""
            class="comments__add"
            @submit.prevent="addComment(descr)"
            v-bind:class="{ 'comments__add-fixed': formAddFixed === true }"
          >
            <img
              :src="'http://cz57780.tw1.ru/avatars/' + avatar"
              alt=""
              class="comments__add-img"
            />
            <input
              type="text"
              class="comments__add-input"
              v-model="descr"
              placeholder="Напишите сообщение"
            />
            <button class="comments__add-btn">
              <svg
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
            </button>
          </form>
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
      decodeText,
      getCookie,
      setCookie,
      rest_comment: false,
      role: getCookie("role"),
      userId: getCookie("id"),
      avatar: getCookie("avatar"),
      descr: "",
      formAddFixed: false,
      currentComments: [],
    };
  },
  props: {
    comments: Array,
    advtId: Number,
  },
  watch: {
    comments() {
      this.getRests();
      console.log(this.comments);
      this.currentComments = this.comments;
      this.changeDate(this.currentComments);

      setTimeout(() => {
        let formAddCoordinats = document.querySelector(
          ".comments__add-wrapper"
        );
        if (
          formAddCoordinats &&
          Math.round(formAddCoordinats.getBoundingClientRect().y) + 50 >
            window.innerHeight
        ) {
          this.formAddFixed = true;
        } else this.formAddFixed = false;
      }, 100);
      // console.log(this.comments);
    },
  },
  mounted() {
  },
  methods: {
    addComment() {
      axios
        .post("http://cz57780.tw1.ru/api/addComment", {
          user_id: this.userId,
          description: this.descr,
          advt_id: this.advtId,
        })
        .then((response) => {
          this.currentComments = response.data;
          this.changeDate(this.currentComments);
          this.descr = "";
        })
        .catch((error) => {
          console.log(error.data);
        });
    },
    deleteComment(id) {
      axios
        .post("http://cz57780.tw1.ru/api/deleteComment", {
          id: id,
          advt_id: this.advtId,
        })
        .then((response) => {
          this.currentComments = response.data;
          this.changeDate(this.currentComments);
        })
        .catch((error) => {
          console.log(error.data);
        });
    },
    getRests() {
      axios
        .post("http://cz57780.tw1.ru/api/getRests", {
          id: this.userId,
        })
        .then((res) => {
          console.log(res);
          this.rest_comment = res.data.comment;
          if (this.rest_comment == false) {
            let scrollMain = document.querySelector(".main[data-v-93a65742]");
            let formAddCoordinats = document.querySelector(
              ".comments__add-wrapper"
            );
            scrollMain.addEventListener("scroll", () => {
              if (
                Math.round(formAddCoordinats.getBoundingClientRect().y) + 50 >
                window.innerHeight
              ) {
                this.formAddFixed = true;
              } else this.formAddFixed = false;
              // console.log(Math.round(formAddCoordinats.getBoundingClientRect().y), window.innerHeight);
            });
          }
        })
        .catch((error) => {
          console.log(error);
        });
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
.comemnts__wrapper {
  width: 850px;
  background-color: var(--white);
  border-radius: 15px;
  padding: 20px 40px;
}

.padding-bottom-60px {
  padding-bottom: 60px;
}

.comments__header {
  display: flex;
  align-items: center;
  margin-bottom: 16px;
}

.comments__header-icon {
  margin-right: 10px;
}

.comments__header-content {
  font-weight: 600;
  font-size: 20px;
  line-height: 130%;
  color: var(--blue);
}

.comments__item {
  position: relative;
  display: flex;
  margin-bottom: 10px;
}

.comments__item:not(:last-child) .comments-item__content {
  padding-bottom: 6px;
  border-bottom: 1px solid rgba(137, 157, 165, 0.5);
}

.comments-item__img {
  width: 40px;
  height: 40px;
  margin-right: 10px;
  border-radius: 15px;
}

.comments-item__content {
  width: 100%;
  display: flex;
  flex-direction: column;
}

.comments-item__content-header {
  margin-bottom: 5px;
}

.comments-item__content-header__name {
  font-weight: 600;
  font-size: 18px;
  line-height: 25px;
  color: var(--blue);
  margin-right: 15px;
}

.comments-item__content-header__time {
  font-weight: 500;
  font-size: 14px;
  line-height: 19px;
  color: var(--grey);
}

.comments-item__content-description {
  font-weight: 400;
  font-size: 16px;
  line-height: 130%;
  color: var(--blue);
}

.comments__add-img {
  width: 40px;
  height: 40px;
  border-radius: 15px;
  margin-right: 10px;
}

.comments__add {
  display: flex;
  align-items: center;
}

.comments__add-input {
  margin-right: 15px;
  width: 100%;
  padding: 8px 15px;
  border: 1px solid rgba(137, 157, 165, 0.5);
  border-radius: 15px;
  font-weight: 400;
  font-size: 16px;
  line-height: 130%;
  color: var(--grey);
}

.comments__add-btn {
  width: 27px;
  height: 27px;
  padding: 0;
  background: none;
  border: none;
}

.comments__add-btn svg {
  width: 27px;
  height: 27px;
}

.comments__add-fixed {
  position: fixed;
  bottom: 0px;
  left: calc(50% - 868px / 2);
  width: 850px;
  padding: 10px 40px;
  box-shadow: 0-1px 3px var(--blue);
  background-color: var(--white);
}

.comments__add-wrapper-heigth {
  height: 40px;
}

.comment__delete {
  position: absolute;
  right: 0;
  top: 0;
}
</style>
