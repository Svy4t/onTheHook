<template>
  <div class="back__comments">
    <div class="back__wrapper">
      <h1 class="home__title">Ваши объявления</h1>
      <ol class="list-reset home__content" v-if="advts">
        <li v-for="advt in advts" :key="advt.id" class="item list home__list">
          <div class="advt__wrapper">
            <div class="advt__top">
              <span class="advt__title">{{ advt.header }}</span>
              <span class="advt__time">{{ advt.created_at }}</span>
            </div>
            <div class="advt__bottom">
              <div class="content advt__content">
                <div class="advt__places">
                  <div class="advt__point">
                    <span class="advt__point-title">Место рыбалки: </span>
                    <span class="advt__point-value">{{ advt.place }}</span>
                  </div>
                  <div class="advt__place">
                    <span class="advt__place-title">Место встречи: </span>
                    <span class="advt__place-value">{{
                      advt.point_meeting
                    }}</span>
                  </div>
                </div>
                <div class="advt__descr-btn">
                  <div class="advt__descr">
                    <span class="advt__descr-title">Описание: </span>
                    <span class="advt__descr-value">{{
                      advt.description
                    }}</span>
                  </div>
                  <div class="advt__btns">
                    <button
                      v-on:click="deleteAdvt(advt.id)"
                      class="advt__btns-delete btn-reset"
                    >
                      Удалить
                    </button>
                    <button
                      v-on:click="openEditWindow(advt.id)"
                      class="advt__btns-edit btn-reset"
                    >
                      Редактировать
                    </button>
                  </div>
                </div>
              </div>
              <div class="comments advt__comments">
                <span class="comments__title">Комментарии: </span>
                <AddComment
                  v-bind:advt_id="advt.id"
                  v-if="token && rest_comment === 'none'"
                />
                <ul
                  v-if="advt.comments.length !== 0"
                  class="comments__content list-reset"
                >
                  <li
                    v-for="(comment, index) in advt.comments"
                    :key="index"
                    class="list comment"
                  >
                    <div class="comments__wrapper">
                      <div class="comment__left">
                        <img
                          src="@/assets/profile-for-comments.svg"
                          alt="profile"
                        />
                        <button
                          v-on:click="deleteComment(comment.id)"
                          class="btn-reset comment__delete"
                          v-if="comment.user_id == userId || role === 'admin'"
                        >
                          <img src="@/assets/musor.svg" alt="musor" />
                        </button>
                      </div>
                      <div class="comment__right">
                        <div class="fio-and-time">
                          <div class="fio">
                            <span>{{ comment.user.name }}</span>
                            <span>{{ comment.user.surname }}</span>
                          </div>
                          <span class="time">{{ comment.created_at }}</span>
                        </div>
                        <span class="comment__descr">{{
                          comment.description
                        }}</span>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>

            <div class="window__edit hidden" :data-id="advt.id">
              <h2 class="window__title">Редактирование</h2>
              <span v-on:click="closeEditWindow()">close</span>
              <form
                v-on:submit.prevent="
                  editAdvt(
                    advt.id,
                    advt.header,
                    advt.description,
                    advt.point_meeting,
                    advt.place
                  )
                "
                class="window__form"
              >
                <div class="window__left">
                  <div class="header_">
                    <label class="header__label"> Заголовок </label>
                    <input
                      class="window__input-header"
                      type="text"
                      placeholder="Заголовок"
                      v-model="advt.header"
                    />
                  </div>
                  <div class="place">
                    <label class="place__label"> Место рыбалки </label>
                    <input
                      class="window__input-place"
                      type="text"
                      placeholder="Место рыбалки"
                      v-model="advt.place"
                    />
                  </div>
                </div>
                <div class="window__center">
                  <div class="point">
                    <label class="point__label"> Место встречи </label>
                    <input
                      class="window__input-point"
                      type="text"
                      placeholder="Место встречи"
                      v-model="advt.point_meeting"
                    />
                  </div>
                  <button class="window__btn btn-reset">Отредактировать</button>
                </div>
                <div class="descr">
                  <label class="descr__label"> Описание </label>
                  <textarea
                    class="window__input-descr"
                    placeholder="Описание"
                    v-model="advt.description"
                  />
                </div>
              </form>
            </div>
          </div>
        </li>
      </ol>
    </div>
    <div v-if="!advts">
      <span>Этот пользователь не выкладывал объявления</span>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import AddComment from "../components/AddComment.vue";

export default {
  data() {
    return {
      user: [],
      advts: [],
      userId: localStorage.getItem("id"),
      role: localStorage.getItem("role"),
      token: localStorage.getItem("token"),
      rest_comment: localStorage.getItem("comment"),
    };
  },
  components: {
    AddComment,
  },
  mounted() {
    this.output();
  },
  methods: {
    output() {
      axios
        .post("http://cz57780.tw1.ru/api/getAdvt", {
          id: this.userId,
        })
        .then((response) => {
          let massive = response.data;
          if (massive.length != 0) {
            console.log(response.data);
            this.advts = response.data;
            for (let i = 0; i < this.advts.length; i++) {
              this.date = new Date(Date.parse(this.advts[i].created_at));
              this.dateTime = this.date.toLocaleTimeString().slice(0, -3);
              this.dateDay = this.date.toLocaleDateString();
              this.advts[i].created_at = this.dateDay + " " + this.dateTime;
              for (let o = 0; o < this.advts[i].comments.length; o++) {
                this.date = new Date(
                  Date.parse(this.advts[i].comments[o].created_at)
                );
                this.dateTime = this.date.toLocaleTimeString().slice(0, -3);
                this.dateDay = this.date.toLocaleDateString();
                this.advts[i].comments[o].created_at =
                  this.dateDay + " " + this.dateTime;
              }
            }
          } else {
            this.advts = null;
          }
        })
        .catch((error) => {
          console.log(error.response);
        });
    },

    deleteAdvt(id) {
      axios
        .post("http://cz57780.tw1.ru/api/deleteAdvt", {
          id: id,
        })
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log(error);
        });
    },

    openEditWindow(id) {
      document.querySelector(".window__edit[data-id='"+id+"']").classList.toggle("hidden");
    },

    closeEditWindow() {
      document.querySelector(".window__edit").classList.toggle("hidden");
    },

    editAdvt(id, headerAdvt, descrAdvt, pointAdvt, placeAdvt) {
      axios
        .post("http://cz57780.tw1.ru/api/editAdvt", {
          id: id,
          header: headerAdvt,
          description: descrAdvt,
          point_meeting: pointAdvt,
          place: placeAdvt,
        })
        .then((response) => {
          console.log(response.data);
          alert("Объявление отредактировано!");
          this.closeEditWindow();
          this.output();
        })
        .catch((error) => {
          console.log(error.response.data);
        });
    },
  },
};
</script>

<style scoped>
.back__comments {
  padding-bottom: 100px;
}

.back__wrapper {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(20px);
  border-radius: 15px;
}

.hidden {
  display: none;
}

.home__title {
  padding-top: 20px;
  text-align: center;
  margin: 0;
  margin-bottom: 20px;
  font-weight: 700;
  font-size: 26px;
  line-height: 100%;
  color: black;
}

.home__list {
  backdrop-filter: blur(20px);
  margin-bottom: 50px;
}

.advt__wrapper {
  width: 100%;
  display: flex;
  flex-direction: column;
  padding: 25px;
}

.advt__bottom {
  display: flex;
  justify-content: space-between;
}

.advt__top {
  display: flex;
  justify-content: space-between;
}

.advt__title {
  font-weight: 700;
  font-size: 30px;
  line-height: 33px;
  color: #27673f;
  margin-bottom: 12px;
}

.advt-fio__profile {
  margin-right: 5px;
}

.advt__fio {
  margin-bottom: 40px;
}

.advt__places {
  display: flex;
  margin-bottom: 40px;
}

.advt__point {
  margin-right: 50px;
}

.advt__point,
.advt__place {
  max-width: 240px;
  display: flex;
  flex-direction: column;
}

.advt__point-title,
.advt__place-title {
  font-weight: 700;
  font-size: 20px;
  line-height: 22px;
  color: #000000;
}

.advt__point-value,
.advt__place-value {
  font-weight: 400;
  font-size: 18px;
  line-height: 20px;
  color: #000000;
}

.advt__fio {
  align-items: flex-end;
  font-weight: 700;
  font-size: 18px;
  line-height: 20px;
  color: #27673f;
}

.advt__descr {
  margin-right: 25px;
  position: relative;
  max-width: 500px;
  display: flex;
  flex-direction: column;
}

.advt__descr-title {
  font-weight: 700;
  font-size: 20px;
  line-height: 22px;
  color: #000000;
  margin-bottom: 3px;
}

.advt__descr-value {
  font-weight: 400;
  font-size: 18px;
  line-height: 20px;
  color: #000000;
}

.advt__btn-delete {
  display: flex;
  flex-direction: column;
  align-items: center;
  position: absolute;
  top: 7px;
  z-index: 1;
  right: -268px;
}

.advt__descr-btn {
  display: flex;
}

.advt__btns {
  display: flex;
  flex-direction: column;
}

.advt__btns-delete {
  margin-bottom: 10px;
}

.advt__btns-delete,
.advt__btns-edit {
  font-family: "Comfortaa";
  padding: 15px 25px;
  font-weight: 700;
  font-size: 14px;
  line-height: 16px;
  color: #ebeaf0;
  background: #395963;
  border-radius: 5px;
}

.advt__delete {
  padding: 15px 60px;
  background: #395963;
  border-radius: 5px;
  font-family: "Comfortaa";
  font-weight: 700;
  font-size: 14px;
  line-height: 16px;
  color: #ebeaf0;
}

.list {
  display: flex;
  /* flex-direction: column; */
  list-style-type: none;
}

.content {
  list-style-type: none;
  display: flex;
  flex-direction: column;
}

.fio {
  display: flex;
}

.fio:hover {
  color: blue;
  cursor: pointer;
}

.fio > span:not(:last-child) {
  margin-right: 10px;
}

.advt__comments {
  display: flex;
  flex-direction: column;
  width: 520px;
}

.comments__title {
  font-weight: 700;
  font-size: 24px;
  line-height: 27px;
  color: #395963;
  margin-bottom: 15px;
}

.comments__none {
  font-weight: 700;
  font-size: 16px;
  line-height: 18px;
  color: #000000;
}

.comment {
  margin-bottom: 20px;
}

.comments__wrapper {
  display: flex;
}

.comment__left {
  margin-right: 30px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.comment__left > img {
  margin-bottom: 10px;
}

.comment__right {
  width: 440px;
  display: flex;
  flex-direction: column;
}

.fio-and-time > .fio {
  font-weight: 700;
  font-size: 24px;
  line-height: 27px;
  color: #395963;
}

.fio-and-time {
  display: flex;
  justify-content: space-between;
  margin-bottom: 9px;
}

.comment__descr {
  font-weight: 700;
  font-size: 16px;
  line-height: 18px;
  color: #000000;
  padding-bottom: 5px;
  border-bottom: 1px solid #395963;
}

.time,
.advt__time {
  font-weight: 700;
  font-size: 18px;
  line-height: 20px;
  color: #698899;
}

.window__form {
  display: flex;
  justify-content: space-between;
}

.window__left,
.window__center,
.descr {
  width: calc((100% - 50px) / 3);
  display: flex;
  flex-direction: column;
}

.header_,
.place,
.point {
  display: flex;
  flex-direction: column;
}

.header_ {
  margin-bottom: 20px;
}

.point {
  margin-bottom: 47px;
}

.window__input-header,
.window__input-point,
.window__input-place {
  padding: 10px 20px;
  font-family: "Comfortaa";
  font-weight: 700;
  font-size: 18px;
  line-height: 20px;
  background: #ffffff;
  border: 1px solid #395963;
  border-radius: 5px;
}

.window__input-descr {
  font-family: "Comfortaa";
  font-weight: 700;
  font-size: 18px;
  line-height: 20px;
  padding: 10px 20px;
  height: 136px;
  background: #ffffff;
  border: 1px solid #395963;
  border-radius: 5px;
  resize: none;
}

.header__label,
.place__label,
.point__label,
.descr__label {
  font-weight: 600;
  font-size: 20px;
  line-height: 100%;
  color: #223835;
  margin-bottom: 10px;
}

.window__btn {
  margin: 0 auto;
  width: min-content;
  font-family: "Comfortaa";
  font-weight: 700;
  font-size: 14px;
  line-height: 16px;
  color: #ebeaf0;
  padding: 15px 30px;
  background: #395963;
  border-radius: 5px;
}
</style>
