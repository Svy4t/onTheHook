<template>
  <div class="car__wrapper">
    <div class="car">
      <div v-if="car.max_places === 8" class="car__eight-seater">
        <img
          class="car__img"
          src="@/assets/car-eight-seater.png"
          alt="весьмиместная машина"
        />
      </div>
      <div v-if="car.max_places === 7" class="car__seven-seater">
        <img
          class="car__img"
          src="@/assets/car-seven-seater.png"
          alt="семиместная машина"
        />
      </div>
      <div v-if="car.max_places === 6" class="car__six-seater">
        <img
          class="car__img"
          src="@/assets/car-six-seater.png"
          alt="шестиместная машина"
        />
      </div>
      <div v-if="car.max_places === 5" class="car__five-seater">
        <img
          class="car__img"
          src="@/assets/car-five-seater.png"
          alt="пятиместная машина"
        />
      </div>
      <div v-if="car.max_places === 4" class="car__four-seater">
        <img
          class="car__img"
          src="@/assets/car-four-seater.png"
          alt="четырехместная машина"
        />
      </div>
      <div v-if="car.max_places === 2" class="car__two-seater">
        <img
          class="car__img"
          src="@/assets/car-two-seater.png"
          alt="двухместная машина"
        />
      </div>
      <div
        v-if="userId && rest_car == false"
        class="car__seaters"
        v-bind:class="{
          'car__seaters-two': car.max_places === 2,
          'car__seaters-four': car.max_places === 4,
          'car__seaters-five': car.max_places === 5,
          'car__seaters-six': car.max_places === 6,
          'car__seaters-seven': car.max_places === 7,
          'car__seaters-eight': car.max_places === 8,
          'row-gap-11px': car.max_places > 3,
        }"
      >
        <div class="car__seaters-front">
          <div class="car__seaters-front__driver">
            <svg
              width="28"
              height="28"
              viewBox="0 0 28 28"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M27 14C27 21.4558 21.4558 27 14 27C6.54416 27 1 21.4558 1 14C1 6.54416 6.54416 1 14 1C21.4558 1 27 6.54416 27 14Z"
                stroke="#192A39"
              />
              <path
                d="M25.2712 7.51988C21.6997 1.30331 13.7361 -0.843961 7.52059 2.72516C1.37381 6.25703 -0.796573 14.0809 2.60846 20.2669L2.61674 20.281C2.65235 20.3464 2.68879 20.4118 2.72605 20.4764C4.44413 23.4662 7.27948 25.651 10.6084 26.5501C13.9372 27.4493 17.487 26.9892 20.4766 25.2711C23.4663 23.553 25.651 20.7175 26.5502 17.3885C27.4493 14.0595 26.9892 10.5097 25.2712 7.51988ZM8.18057 3.87374C13.7634 0.665672 20.9147 2.60012 24.1226 8.18237C25.3986 10.3912 25.9517 12.5778 25.6181 15.1069L18.4553 12.5C18.3128 11.5737 17.7664 10.7475 17.0573 10.1348C16.3482 9.52201 15.4441 9.18184 14.5069 9.17521H13.4106C12.4734 9.18184 11.5693 9.52201 10.8602 10.1348C10.1511 10.7475 9.64246 11.5737 9.5 12.5L2.34048 15.1069C2.04818 12.8183 2.51687 10.8762 3.54226 8.80945C4.56766 6.74268 6.18146 5.0254 8.18057 3.87374ZM24.5 18.5L18.4553 16.5V14.3087L25.3283 16.8087C25.3093 16.8866 25.2894 16.9644 25.2687 17.0414C25.0735 17.7615 25 18 24.5 18.5ZM3.47328 18.6903C3 18 2.86307 17.6144 2.66395 16.8137L9.53695 14.3136L9.5 16.5L3.47328 18.6903ZM4.16855 20.3033L9.62804 18.3159C9.81506 19.1527 10.2715 19.905 10.9273 20.4573C11.0842 20.5882 11.2107 20.7517 11.2978 20.9365C11.3849 21.1213 11.4306 21.3229 11.4316 21.5273V25.3837C8.43531 24.7129 5.82507 22.8862 4.16855 20.3008V20.3033ZM13.1974 25.5866C13.1974 25.5816 13.1974 25.5759 13.1974 25.5709V21.5132C13.1964 21.1156 13.1084 20.7231 12.9396 20.3632C12.7708 20.0033 12.5253 19.6846 12.2203 19.4297C11.9314 19.1872 11.6992 18.8845 11.5398 18.5427C11.3805 18.2009 11.2979 17.8284 11.2978 17.4513V13.3638C11.3209 12.6915 11.3628 12.0741 11.8449 11.6051C12.3271 11.136 12.7745 10.8683 13.4471 10.8638H14.5435C15.2164 10.8683 15.6538 11.1164 16.136 11.5858C16.6182 12.0552 16.6685 12.6714 16.6912 13.3439C16.6912 13.3671 16.6912 13.3903 16.6912 13.4127V17.4298C16.6908 17.8063 16.6082 18.1782 16.4492 18.5195C16.2901 18.8608 16.0584 19.1632 15.7703 19.4057C15.4652 19.6606 15.2196 19.9792 15.0506 20.3391C14.8817 20.699 14.7935 21.0916 14.7924 21.4892C14.7912 21.8868 14.7924 25.4848 14.7924 25.5063C14.7924 25.5278 14.7924 25.5494 14.7924 25.5709C13.9695 25.6574 14.0166 25.6773 13.1941 25.5874L13.1974 25.5866ZM19.8167 24.1217C18.8003 24.7073 17.7011 25.1355 16.5565 25.392V21.5273C16.5578 21.3228 16.6038 21.1211 16.6912 20.9363C16.7786 20.7515 16.9053 20.588 17.0625 20.4573C17.7184 19.9048 18.1749 19.1521 18.3617 18.315L23.827 20.3025C22.8182 21.8809 21.4422 23.1908 19.8167 24.1217Z"
                fill="#192A39"
              />
            </svg>
          </div>
          <div
            class="car__seaters-front__seater"
            :title="firstPassenger.name + ' ' + firstPassenger.surname"
          >
            <img
              @click='goProfile(firstPassenger.id)'
              v-if="firstPassenger !== 'empty'"
              :src="'http://cz57780.tw1.ru/avatars/' + firstPassenger.avatar"
              alt=""
            />
            <div
              v-else
              @click="siteInCar(car.advt_id, advt.user_id)"
              class="car__seaters-front__seater-add"
            >
              <svg
                width="16"
                height="16"
                viewBox="0 0 16 16"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M8.00031 1.15771C7.16058 1.15771 6.47984 1.83845 6.47984 2.67818V6.09924C6.47984 6.30917 6.30966 6.47935 6.09972 6.47935H2.67867C1.83894 6.47935 1.1582 7.16009 1.1582 7.99982C1.1582 8.83955 1.83894 9.52029 2.67867 9.52029L6.09972 9.52029C6.30966 9.52029 6.47984 9.69047 6.47984 9.90041V13.3215C6.47984 14.1612 7.16058 14.8419 8.00031 14.8419C8.84004 14.8419 9.52078 14.1612 9.52078 13.3215V9.90041C9.52078 9.69047 9.69096 9.52029 9.90089 9.52029H13.3219C14.1617 9.52029 14.8424 8.83955 14.8424 7.99982C14.8424 7.16009 14.1617 6.47935 13.3219 6.47935H9.90089C9.69096 6.47935 9.52078 6.30917 9.52078 6.09924V2.67818C9.52078 1.83845 8.84004 1.15771 8.00031 1.15771Z"
                  stroke="#192A39"
                  stroke-width="1.5"
                />
              </svg>
            </div>
          </div>
        </div>
        <div
          v-if="car.max_places > 2"
          class="car__seaters-center"
          v-bind:class="{
            'column-gap-9':
              car.max_places === 4 ||
              car.max_places === 6 ||
              car.max_places === 7,
            'column-gap-5': car.max_places === 5 || car.max_places === 8,
          }"
        >
          <div class="car__seaters-center__seater-wrapper">
            <div
              v-if="secondPassenger !== 'have no place'"
              class="car__seaters-center__seater"
              :title="secondPassenger.name + ' ' + secondPassenger.surname"
            >
              <img
                @click='goProfile(secondPassenger.id)'
                v-if="secondPassenger !== 'empty'"
                :src="'http://cz57780.tw1.ru/avatars/' + secondPassenger.avatar"
                alt=""
              />
              <div
                v-else
                @click="siteInCar(car.advt_id, advt.user_id)"
                class="car__seaters-center__seater-add"
              >
                <svg
                  width="16"
                  height="16"
                  viewBox="0 0 16 16"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M8.00031 1.15771C7.16058 1.15771 6.47984 1.83845 6.47984 2.67818V6.09924C6.47984 6.30917 6.30966 6.47935 6.09972 6.47935H2.67867C1.83894 6.47935 1.1582 7.16009 1.1582 7.99982C1.1582 8.83955 1.83894 9.52029 2.67867 9.52029L6.09972 9.52029C6.30966 9.52029 6.47984 9.69047 6.47984 9.90041V13.3215C6.47984 14.1612 7.16058 14.8419 8.00031 14.8419C8.84004 14.8419 9.52078 14.1612 9.52078 13.3215V9.90041C9.52078 9.69047 9.69096 9.52029 9.90089 9.52029H13.3219C14.1617 9.52029 14.8424 8.83955 14.8424 7.99982C14.8424 7.16009 14.1617 6.47935 13.3219 6.47935H9.90089C9.69096 6.47935 9.52078 6.30917 9.52078 6.09924V2.67818C9.52078 1.83845 8.84004 1.15771 8.00031 1.15771Z"
                    stroke="#192A39"
                    stroke-width="1.5"
                  />
                </svg>
              </div>
            </div>
            <div class="car__seaters-center__none" v-else>
              <svg
                width="18"
                height="23"
                viewBox="0 0 18 23"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M4.42857 8V5.66667C4.42857 3.08934 6.47527 1 9 1C11.5247 1 13.5714 3.08934 13.5714 5.66667V8M11.2859 17.3336L6.71433 12.6666M6.71443 17.3336L11.2859 12.6666M4.65714 22H13.3429C14.623 22 15.263 22 15.752 21.7457C16.1821 21.522 16.5317 21.165 16.7509 20.726C17 20.2269 17 19.5735 17 18.2667V11.7333C17 10.4265 17 9.77315 16.7509 9.27402C16.5317 8.83498 16.1821 8.47802 15.752 8.25432C15.263 8 14.623 8 13.3429 8H4.65714C3.37702 8 2.73696 8 2.24802 8.25432C1.81794 8.47802 1.46827 8.83498 1.24913 9.27402C1 9.77315 1 10.4265 1 11.7333V18.2667C1 19.5735 1 20.2269 1.24913 20.726C1.46827 21.165 1.81794 21.522 2.24802 21.7457C2.73696 22 3.37702 22 4.65714 22Z"
                  stroke="#899DA5"
                  stroke-width="2"
                  stroke-linecap="round"
                />
              </svg>
            </div>
          </div>
          <div class="car__seaters-center__seater-wrapper">
            <div
              v-if="thirdPassenger !== 'have no place'"
              class="car__seaters-center__seater"
              :title="thirdPassenger.name + ' ' + thirdPassenger.surname"
            >
              <img
                @click='goProfile(thirdPassenger.id)'
                v-if="thirdPassenger !== 'empty'"
                :src="'http://cz57780.tw1.ru/avatars/' + thirdPassenger.avatar"
                alt=""
              />
              <div
                v-else
                @click="siteInCar(car.advt_id, advt.user_id)"
                class="car__seaters-center__seater-add"
              >
                <svg
                  width="16"
                  height="16"
                  viewBox="0 0 16 16"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M8.00031 1.15771C7.16058 1.15771 6.47984 1.83845 6.47984 2.67818V6.09924C6.47984 6.30917 6.30966 6.47935 6.09972 6.47935H2.67867C1.83894 6.47935 1.1582 7.16009 1.1582 7.99982C1.1582 8.83955 1.83894 9.52029 2.67867 9.52029L6.09972 9.52029C6.30966 9.52029 6.47984 9.69047 6.47984 9.90041V13.3215C6.47984 14.1612 7.16058 14.8419 8.00031 14.8419C8.84004 14.8419 9.52078 14.1612 9.52078 13.3215V9.90041C9.52078 9.69047 9.69096 9.52029 9.90089 9.52029H13.3219C14.1617 9.52029 14.8424 8.83955 14.8424 7.99982C14.8424 7.16009 14.1617 6.47935 13.3219 6.47935H9.90089C9.69096 6.47935 9.52078 6.30917 9.52078 6.09924V2.67818C9.52078 1.83845 8.84004 1.15771 8.00031 1.15771Z"
                    stroke="#192A39"
                    stroke-width="1.5"
                  />
                </svg>
              </div>
            </div>
            <div class="car__seaters-center__none" v-else>
              <svg
                width="18"
                height="23"
                viewBox="0 0 18 23"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M4.42857 8V5.66667C4.42857 3.08934 6.47527 1 9 1C11.5247 1 13.5714 3.08934 13.5714 5.66667V8M11.2859 17.3336L6.71433 12.6666M6.71443 17.3336L11.2859 12.6666M4.65714 22H13.3429C14.623 22 15.263 22 15.752 21.7457C16.1821 21.522 16.5317 21.165 16.7509 20.726C17 20.2269 17 19.5735 17 18.2667V11.7333C17 10.4265 17 9.77315 16.7509 9.27402C16.5317 8.83498 16.1821 8.47802 15.752 8.25432C15.263 8 14.623 8 13.3429 8H4.65714C3.37702 8 2.73696 8 2.24802 8.25432C1.81794 8.47802 1.46827 8.83498 1.24913 9.27402C1 9.77315 1 10.4265 1 11.7333V18.2667C1 19.5735 1 20.2269 1.24913 20.726C1.46827 21.165 1.81794 21.522 2.24802 21.7457C2.73696 22 3.37702 22 4.65714 22Z"
                  stroke="#899DA5"
                  stroke-width="2"
                  stroke-linecap="round"
                />
              </svg>
            </div>
          </div>
          <div
            v-if="car.max_places === 5 || car.max_places === 8"
            class="car__seaters-center__seater-wrapper"
          >
            <div
              v-if="fourthPassenger !== 'have no place'"
              class="car__seaters-center__seater"
              :title="fourthPassenger.name + ' ' + fourthPassenger.surname"
            >
              <img
                @click='goProfile(fourthPassenger.id)'
                v-if="fourthPassenger !== 'empty'"
                :src="'http://cz57780.tw1.ru/avatars/' + fourthPassenger.avatar"
                alt=""
              />
              <div
                v-else
                @click="siteInCar(car.advt_id, advt.user_id)"
                class="car__seaters-center__seater-add"
              >
                <svg
                  width="16"
                  height="16"
                  viewBox="0 0 16 16"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M8.00031 1.15771C7.16058 1.15771 6.47984 1.83845 6.47984 2.67818V6.09924C6.47984 6.30917 6.30966 6.47935 6.09972 6.47935H2.67867C1.83894 6.47935 1.1582 7.16009 1.1582 7.99982C1.1582 8.83955 1.83894 9.52029 2.67867 9.52029L6.09972 9.52029C6.30966 9.52029 6.47984 9.69047 6.47984 9.90041V13.3215C6.47984 14.1612 7.16058 14.8419 8.00031 14.8419C8.84004 14.8419 9.52078 14.1612 9.52078 13.3215V9.90041C9.52078 9.69047 9.69096 9.52029 9.90089 9.52029H13.3219C14.1617 9.52029 14.8424 8.83955 14.8424 7.99982C14.8424 7.16009 14.1617 6.47935 13.3219 6.47935H9.90089C9.69096 6.47935 9.52078 6.30917 9.52078 6.09924V2.67818C9.52078 1.83845 8.84004 1.15771 8.00031 1.15771Z"
                    stroke="#192A39"
                    stroke-width="1.5"
                  />
                </svg>
              </div>
            </div>
            <div class="car__seaters-center__none" v-else>
              <svg
                width="18"
                height="23"
                viewBox="0 0 18 23"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M4.42857 8V5.66667C4.42857 3.08934 6.47527 1 9 1C11.5247 1 13.5714 3.08934 13.5714 5.66667V8M11.2859 17.3336L6.71433 12.6666M6.71443 17.3336L11.2859 12.6666M4.65714 22H13.3429C14.623 22 15.263 22 15.752 21.7457C16.1821 21.522 16.5317 21.165 16.7509 20.726C17 20.2269 17 19.5735 17 18.2667V11.7333C17 10.4265 17 9.77315 16.7509 9.27402C16.5317 8.83498 16.1821 8.47802 15.752 8.25432C15.263 8 14.623 8 13.3429 8H4.65714C3.37702 8 2.73696 8 2.24802 8.25432C1.81794 8.47802 1.46827 8.83498 1.24913 9.27402C1 9.77315 1 10.4265 1 11.7333V18.2667C1 19.5735 1 20.2269 1.24913 20.726C1.46827 21.165 1.81794 21.522 2.24802 21.7457C2.73696 22 3.37702 22 4.65714 22Z"
                  stroke="#899DA5"
                  stroke-width="2"
                  stroke-linecap="round"
                />
              </svg>
            </div>
          </div>
        </div>
        <div
          v-if="car.max_places > 5"
          class="car__seaters-back"
          v-bind:class="{
            'column-gap-9': car.max_places === 6,
            'column-gap-5': car.max_places > 6,
          }"
        >
          <div class="car__seaters-back__seater-wrapper">
            <div
              v-if="fifthPassenger !== 'have no place'"
              class="car__seaters-back__seater"
              :title="fifthPassenger.name + ' ' + fifthPassenger.surname"
            >
              <img
                @click='goProfile(fifthPassenger.id)'
                v-if="fifthPassenger !== 'empty'"
                :src="'http://cz57780.tw1.ru/avatars/' + fifthPassenger.avatar"
                alt=""
              />
              <div
                v-else
                @click="siteInCar(car.advt_id, advt.user_id)"
                class="car__seaters-back__seater-add"
              >
                <svg
                  width="16"
                  height="16"
                  viewBox="0 0 16 16"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M8.00031 1.15771C7.16058 1.15771 6.47984 1.83845 6.47984 2.67818V6.09924C6.47984 6.30917 6.30966 6.47935 6.09972 6.47935H2.67867C1.83894 6.47935 1.1582 7.16009 1.1582 7.99982C1.1582 8.83955 1.83894 9.52029 2.67867 9.52029L6.09972 9.52029C6.30966 9.52029 6.47984 9.69047 6.47984 9.90041V13.3215C6.47984 14.1612 7.16058 14.8419 8.00031 14.8419C8.84004 14.8419 9.52078 14.1612 9.52078 13.3215V9.90041C9.52078 9.69047 9.69096 9.52029 9.90089 9.52029H13.3219C14.1617 9.52029 14.8424 8.83955 14.8424 7.99982C14.8424 7.16009 14.1617 6.47935 13.3219 6.47935H9.90089C9.69096 6.47935 9.52078 6.30917 9.52078 6.09924V2.67818C9.52078 1.83845 8.84004 1.15771 8.00031 1.15771Z"
                    stroke="#192A39"
                    stroke-width="1.5"
                  />
                </svg>
              </div>
            </div>
            <div class="car__seaters-back__none" v-else>
              <svg
                width="18"
                height="23"
                viewBox="0 0 18 23"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M4.42857 8V5.66667C4.42857 3.08934 6.47527 1 9 1C11.5247 1 13.5714 3.08934 13.5714 5.66667V8M11.2859 17.3336L6.71433 12.6666M6.71443 17.3336L11.2859 12.6666M4.65714 22H13.3429C14.623 22 15.263 22 15.752 21.7457C16.1821 21.522 16.5317 21.165 16.7509 20.726C17 20.2269 17 19.5735 17 18.2667V11.7333C17 10.4265 17 9.77315 16.7509 9.27402C16.5317 8.83498 16.1821 8.47802 15.752 8.25432C15.263 8 14.623 8 13.3429 8H4.65714C3.37702 8 2.73696 8 2.24802 8.25432C1.81794 8.47802 1.46827 8.83498 1.24913 9.27402C1 9.77315 1 10.4265 1 11.7333V18.2667C1 19.5735 1 20.2269 1.24913 20.726C1.46827 21.165 1.81794 21.522 2.24802 21.7457C2.73696 22 3.37702 22 4.65714 22Z"
                  stroke="#899DA5"
                  stroke-width="2"
                  stroke-linecap="round"
                />
              </svg>
            </div>
          </div>
          <div class="car__seaters-back__seater-wrapper">
            <div
              v-if="sixthPassenger !== 'have no place'"
              class="car__seaters-back__seater"
              :title="sixthPassenger.name + ' ' + sixthPassenger.surname"
            >
              <img
                @click='goProfile(sixthPassenger.id)'
                :src="'http://cz57780.tw1.ru/avatars/' + sixthPassenger.avatar"
                v-if="sixthPassenger !== 'empty'"
                alt=""
              />
              <div
                v-else
                @click="siteInCar(car.advt_id, advt.user_id)"
                class="car__seaters-back__seater-add"
              >
                <svg
                  width="16"
                  height="16"
                  viewBox="0 0 16 16"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M8.00031 1.15771C7.16058 1.15771 6.47984 1.83845 6.47984 2.67818V6.09924C6.47984 6.30917 6.30966 6.47935 6.09972 6.47935H2.67867C1.83894 6.47935 1.1582 7.16009 1.1582 7.99982C1.1582 8.83955 1.83894 9.52029 2.67867 9.52029L6.09972 9.52029C6.30966 9.52029 6.47984 9.69047 6.47984 9.90041V13.3215C6.47984 14.1612 7.16058 14.8419 8.00031 14.8419C8.84004 14.8419 9.52078 14.1612 9.52078 13.3215V9.90041C9.52078 9.69047 9.69096 9.52029 9.90089 9.52029H13.3219C14.1617 9.52029 14.8424 8.83955 14.8424 7.99982C14.8424 7.16009 14.1617 6.47935 13.3219 6.47935H9.90089C9.69096 6.47935 9.52078 6.30917 9.52078 6.09924V2.67818C9.52078 1.83845 8.84004 1.15771 8.00031 1.15771Z"
                    stroke="#192A39"
                    stroke-width="1.5"
                  />
                </svg>
              </div>
            </div>
            <div class="car__seaters-back__none" v-else>
              <svg
                width="18"
                height="23"
                viewBox="0 0 18 23"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M4.42857 8V5.66667C4.42857 3.08934 6.47527 1 9 1C11.5247 1 13.5714 3.08934 13.5714 5.66667V8M11.2859 17.3336L6.71433 12.6666M6.71443 17.3336L11.2859 12.6666M4.65714 22H13.3429C14.623 22 15.263 22 15.752 21.7457C16.1821 21.522 16.5317 21.165 16.7509 20.726C17 20.2269 17 19.5735 17 18.2667V11.7333C17 10.4265 17 9.77315 16.7509 9.27402C16.5317 8.83498 16.1821 8.47802 15.752 8.25432C15.263 8 14.623 8 13.3429 8H4.65714C3.37702 8 2.73696 8 2.24802 8.25432C1.81794 8.47802 1.46827 8.83498 1.24913 9.27402C1 9.77315 1 10.4265 1 11.7333V18.2667C1 19.5735 1 20.2269 1.24913 20.726C1.46827 21.165 1.81794 21.522 2.24802 21.7457C2.73696 22 3.37702 22 4.65714 22Z"
                  stroke="#899DA5"
                  stroke-width="2"
                  stroke-linecap="round"
                />
              </svg>
            </div>
          </div>
          <div
            v-if="car.max_places > 6"
            class="car__seaters-back__seater-wrapper"
          >
            <div
              @click='goProfile(seventhPassenger.id)'
              v-if="seventhPassenger !== 'have no place'"
              class="car__seaters-back__seater"
              :title="seventhPassenger.name + ' ' + seventhPassenger.surname"
            >
              <img
                :src="
                  'http://cz57780.tw1.ru/avatars/' + seventhPassenger.avatar
                "
                v-if="sixthPassenger !== 'empty'"
                alt=""
              />
              <div
                v-else
                @click="siteInCar(car.advt_id, advt.user_id)"
                class="car__seaters-back__seater-add"
              >
                <svg
                  width="16"
                  height="16"
                  viewBox="0 0 16 16"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M8.00031 1.15771C7.16058 1.15771 6.47984 1.83845 6.47984 2.67818V6.09924C6.47984 6.30917 6.30966 6.47935 6.09972 6.47935H2.67867C1.83894 6.47935 1.1582 7.16009 1.1582 7.99982C1.1582 8.83955 1.83894 9.52029 2.67867 9.52029L6.09972 9.52029C6.30966 9.52029 6.47984 9.69047 6.47984 9.90041V13.3215C6.47984 14.1612 7.16058 14.8419 8.00031 14.8419C8.84004 14.8419 9.52078 14.1612 9.52078 13.3215V9.90041C9.52078 9.69047 9.69096 9.52029 9.90089 9.52029H13.3219C14.1617 9.52029 14.8424 8.83955 14.8424 7.99982C14.8424 7.16009 14.1617 6.47935 13.3219 6.47935H9.90089C9.69096 6.47935 9.52078 6.30917 9.52078 6.09924V2.67818C9.52078 1.83845 8.84004 1.15771 8.00031 1.15771Z"
                    stroke="#192A39"
                    stroke-width="1.5"
                  />
                </svg>
              </div>
            </div>
            <div class="car__seaters-back__none" v-else>
              <svg
                width="18"
                height="23"
                viewBox="0 0 18 23"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M4.42857 8V5.66667C4.42857 3.08934 6.47527 1 9 1C11.5247 1 13.5714 3.08934 13.5714 5.66667V8M11.2859 17.3336L6.71433 12.6666M6.71443 17.3336L11.2859 12.6666M4.65714 22H13.3429C14.623 22 15.263 22 15.752 21.7457C16.1821 21.522 16.5317 21.165 16.7509 20.726C17 20.2269 17 19.5735 17 18.2667V11.7333C17 10.4265 17 9.77315 16.7509 9.27402C16.5317 8.83498 16.1821 8.47802 15.752 8.25432C15.263 8 14.623 8 13.3429 8H4.65714C3.37702 8 2.73696 8 2.24802 8.25432C1.81794 8.47802 1.46827 8.83498 1.24913 9.27402C1 9.77315 1 10.4265 1 11.7333V18.2667C1 19.5735 1 20.2269 1.24913 20.726C1.46827 21.165 1.81794 21.522 2.24802 21.7457C2.73696 22 3.37702 22 4.65714 22Z"
                  stroke="#899DA5"
                  stroke-width="2"
                  stroke-linecap="round"
                />
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
      v-if="itsMe && openList === 'All'"
      @click="exitOfCar(car.advt_id)"
      class="car__exit"
    >
      <svg
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M6.99985 7C6.99985 7.55228 7.44756 8 7.99985 8C8.55213 8 8.99985 7.55228 8.99985 7H6.99985ZM8.99985 17C8.99985 16.4477 8.55213 16 7.99985 16C7.44756 16 6.99985 16.4477 6.99985 17H8.99985ZM9.09187 21.782L9.54586 20.891L9.54586 20.891L9.09187 21.782ZM8.21783 20.908L7.32683 21.362H7.32683L8.21783 20.908ZM19.7819 20.908L20.6729 21.362L19.7819 20.908ZM18.9078 21.782L18.4538 20.891L18.4538 20.891L18.9078 21.782ZM18.9078 2.21799L18.4538 3.10899V3.10899L18.9078 2.21799ZM19.7819 3.09202L18.8909 3.54601V3.54601L19.7819 3.09202ZM8.21783 3.09202L7.32683 2.63803V2.63803L8.21783 3.09202ZM9.09187 2.21799L8.63788 1.32698V1.32698L9.09187 2.21799ZM2.99985 11C2.44756 11 1.99985 11.4477 1.99985 12C1.99985 12.5523 2.44756 13 2.99985 13L2.99985 11ZM13.9998 13C14.5521 13 14.9998 12.5523 14.9998 12C14.9998 11.4477 14.5521 11 13.9998 11V13ZM5.70695 9.70711C6.09748 9.31658 6.09748 8.68342 5.70695 8.29289C5.31643 7.90237 4.68326 7.90237 4.29274 8.29289L5.70695 9.70711ZM3.13122 10.8686L2.42411 10.1615H2.42411L3.13122 10.8686ZM3.13122 13.1314L2.42411 13.8385L2.42411 13.8385L3.13122 13.1314ZM4.29274 15.7071C4.68327 16.0976 5.31643 16.0976 5.70696 15.7071C6.09748 15.3166 6.09748 14.6834 5.70696 14.2929L4.29274 15.7071ZM2.46301 11.691L3.41406 12L2.46301 11.691ZM2.46301 12.309L3.41406 12L2.46301 12.309ZM8.99985 7V5.2H6.99985V7H8.99985ZM11.1998 3H16.7998V1H11.1998V3ZM18.9998 5.2V18.8H20.9998V5.2H18.9998ZM16.7998 21H11.1998V23H16.7998V21ZM8.99985 18.8V17H6.99985V18.8H8.99985ZM11.1998 21C10.6233 21 10.251 20.9992 9.96768 20.9761C9.69602 20.9539 9.5953 20.9162 9.54586 20.891L8.63788 22.673C9.01626 22.8658 9.40947 22.9371 9.80482 22.9694C10.1885 23.0008 10.6563 23 11.1998 23V21ZM6.99985 18.8C6.99985 19.3436 6.99907 19.8114 7.03042 20.195C7.06272 20.5904 7.13403 20.9836 7.32683 21.362L9.10884 20.454C9.08365 20.4045 9.04597 20.3038 9.02377 20.0322C9.00063 19.7488 8.99985 19.3766 8.99985 18.8H6.99985ZM9.54586 20.891C9.3577 20.7951 9.20471 20.6422 9.10884 20.454L7.32683 21.362C7.61445 21.9265 8.07339 22.3854 8.63788 22.673L9.54586 20.891ZM18.9998 18.8C18.9998 19.3766 18.9991 19.7488 18.9759 20.0322C18.9537 20.3038 18.916 20.4045 18.8909 20.454L20.6729 21.362C20.8657 20.9836 20.937 20.5904 20.9693 20.195C21.0006 19.8114 20.9998 19.3436 20.9998 18.8H18.9998ZM16.7998 23C17.3434 23 17.8112 23.0008 18.1949 22.9694C18.5902 22.9371 18.9834 22.8658 19.3618 22.673L18.4538 20.891C18.4044 20.9162 18.3037 20.9539 18.032 20.9761C17.7487 20.9992 17.3764 21 16.7998 21V23ZM18.8909 20.454C18.795 20.6422 18.642 20.7951 18.4538 20.891L19.3618 22.673C19.9263 22.3854 20.3852 21.9265 20.6729 21.362L18.8909 20.454ZM16.7998 3C17.3764 3 17.7487 3.00078 18.032 3.02393C18.3037 3.04612 18.4044 3.0838 18.4538 3.10899L19.3618 1.32698C18.9834 1.13419 18.5902 1.06287 18.1949 1.03057C17.8112 0.999222 17.3434 1 16.7998 1V3ZM20.9998 5.2C20.9998 4.65645 21.0006 4.18864 20.9693 3.80497C20.937 3.40963 20.8657 3.01641 20.6729 2.63803L18.8909 3.54601C18.916 3.59545 18.9537 3.69617 18.9759 3.96784C18.9991 4.25117 18.9998 4.62345 18.9998 5.2H20.9998ZM18.4538 3.10899C18.642 3.20487 18.795 3.35785 18.8909 3.54601L20.6729 2.63803C20.3852 2.07354 19.9263 1.6146 19.3618 1.32698L18.4538 3.10899ZM8.99985 5.2C8.99985 4.62345 9.00063 4.25117 9.02377 3.96784C9.04597 3.69617 9.08365 3.59545 9.10884 3.54601L7.32683 2.63803C7.13403 3.01641 7.06272 3.40963 7.03042 3.80497C6.99907 4.18864 6.99985 4.65645 6.99985 5.2H8.99985ZM11.1998 1C10.6563 1 10.1885 0.999222 9.80482 1.03057C9.40947 1.06287 9.01626 1.13419 8.63788 1.32698L9.54586 3.10899C9.5953 3.0838 9.69602 3.04612 9.96768 3.02393C10.251 3.00078 10.6233 3 11.1998 3V1ZM9.10884 3.54601C9.20471 3.35785 9.3577 3.20487 9.54586 3.10899L8.63788 1.32698C8.07339 1.6146 7.61445 2.07354 7.32683 2.63803L9.10884 3.54601ZM2.99985 13L13.9998 13V11L2.99985 11L2.99985 13ZM4.29274 8.29289L2.42411 10.1615L3.83833 11.5757L5.70695 9.70711L4.29274 8.29289ZM2.42411 13.8385L4.29274 15.7071L5.70696 14.2929L3.83832 12.4243L2.42411 13.8385ZM2.42411 10.1615C2.23777 10.3479 2.05494 10.5296 1.91409 10.6955C1.76565 10.8704 1.60608 11.0922 1.51195 11.382L3.41406 12C3.39412 12.0614 3.37064 12.0701 3.43877 11.9899C3.51447 11.9007 3.62865 11.7854 3.83833 11.5757L2.42411 10.1615ZM3.83833 12.4243C3.62866 12.2146 3.51447 12.0993 3.43877 12.0101C3.37064 11.9299 3.39412 11.9386 3.41406 12L1.51195 12.618C1.60608 12.9078 1.76566 13.1296 1.91409 13.3045C2.05494 13.4704 2.23777 13.6521 2.42411 13.8385L3.83833 12.4243ZM1.51195 11.382C1.38143 11.7837 1.38143 12.2163 1.51195 12.618L3.41406 12V12L1.51195 11.382Z"
          fill="#E51717"
        />
      </svg>
    </div>
    <div class="car__info-wrapper">
      <div class="car__info">
        <div class="car__info-name">
          <FlagComponentVue :flag="car.country" />
          {{ car.name_car }}
        </div>
        <div class="car__info-years">
          {{ car.year_from }}-{{ carYearTo }}
          <span v-if="carYearTo !== 'н.в.'" class="car__info-years__span"
            >гг.</span
          >
        </div>
        <div class="car__info-class">Класс: {{ car.class }}</div>
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
import FlagComponentVue from "./FlagComponent.vue";

export default {
  components: {
    FlagComponentVue,
  },
  data() {
    return {
      encodeText,
      decodeText,
      getCookie,
      setCookie,
      rest_comment: getCookie("comment"),
      rest_car: false,
      role: getCookie("role"),
      userId: getCookie("id"),
      token: getCookie("token"),
      firstPassenger: "",
      secondPassenger: "",
      thirdPassenger: "",
      fourthPassenger: "",
      fifthPassenger: "",
      sixthPassenger: "",
      seventhPassenger: "",
      passengers: [],
      itsMe: false,
      dataBaseCars: [],
      flagName: "",
      carYearTo: "",
    };
  },
  props: {
    car: Object,
    advt: Object,
    openList: String,
  },
  watch: {
    car() {
      this.getPassengers();
      if (this.car.year_to === null) this.carYearTo = "н.в.";
      else this.carYearTo = this.car.year_to;
      this.getRests();
    },
  },
  methods: {
    getPassengers() {
      axios
        .post("http://cz57780.tw1.ru/api/passengers", {
          advt_id: this.car.advt_id,
        })
        .then((response) => {
          // console.log(response);
          this.itsMe = false;
          this.firstPassenger = "empty";
          this.secondPassenger = "empty";
          this.thirdPassenger = "empty";
          this.fourthPassenger = "empty";
          this.fifthPassenger = "empty";
          this.firstPassenger = "empty";
          this.sixthPassenger = "empty";
          this.seventhPassenger = "empty";
          this.passengers = response.data;
          console.log(this.passengers);
          this.passengers.forEach((element) => {
            if (element.id == this.userId) this.itsMe = true;
          });
          if (this.car.max_places - 1 > this.car.allowed_number_of_seats)
            for (
              let i = this.car.max_places - 1;
              i > this.car.allowed_number_of_seats;
              i--
            ) {
              this.passengers[i - 1] = "have no place";
            }
          if (this.passengers[0]) this.firstPassenger = this.passengers[0];
          if (this.passengers[1]) this.secondPassenger = this.passengers[1];
          if (this.passengers[2]) this.thirdPassenger = this.passengers[2];
          if (this.passengers[3]) this.fourthPassenger = this.passengers[3];
          if (this.passengers[4]) this.fifthPassenger = this.passengers[4];
          if (this.car.max_places === 6) {
            this.sixthPassenger = this.fifthPassenger;
            this.fifthPassenger = this.fourthPassenger;
          }
          if (this.passengers[5]) this.sixthPassenger = this.passengers[5];
          if (this.passengers[6]) this.seventhPassenger = this.passengers[6];
          if (this.car.max_places === 7) {
            this.seventhPassenger = this.sixthPassenger;
            this.sixthPassenger = this.fifthPassenger;
            this.fifthPassenger = this.fourthPassenger;
          }
          // console.log(this.car.max_places);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    siteInCar(advtId, userIdAdvt) {
      // console.log(this.rest_car);
      if (this.itsMe) return;
      if (this.openList === "My") {
        return;
      }
      if (this.token === undefined) {
        alert("Авторизуйтесь!!!");
        return;
      }
      if (this.rest_car === "ban") {
        alert("У вас ограничение, вы не можете садиться в машину!!!");
        return;
      }
      if (userIdAdvt == this.userId) {
        alert("Вы не можете сесть в машину,так как это ваша машина)");
        return;
      }
      // if (array.length === 0) {
      //   axios
      //     .post("http://cz57780.tw1.ru/api/siteInCar", {
      //       token: this.token,
      //       advt_id: advtId,
      //     })
      //     .then((response) => {
      //       alert(response.data);
      //       this.getPassengers();
      //       return;
      //     })
      //     .catch((error) => {
      //       console.log(error.data);
      //     });
      // }
      axios
        .post("http://cz57780.tw1.ru/api/siteInCar", {
          token: this.token,
          advt_id: advtId,
        })
        .then((response) => {
          alert(response.data);
          this.getPassengers();
          return;
        })
        .catch((error) => {
          console.log(error.data);
        });
    },
    exitOfCar(advtId) {
      // console.log(advtId);
      this.itsMe = false;
      axios
        .post("http://cz57780.tw1.ru/api/getOutOfTheCar", {
          user_id: Number(this.userId),
          advt_id: advtId,
        })
        .then((response) => {
          // console.log(response.data);
          alert(response.data);
          this.getPassengers();
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
          this.rest_car = res.data.car;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    goProfile(id) {
      this.$router.push({ path: `/profile/${id}` });
    }
  },
};
</script>

<style scoped>
.car__img {
  width: 160px;
}

.car__wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;

}

.car {
  position: relative;
  z-index: 1;
}

.car__seaters {
  position: absolute;
  left: calc(50% - 47px);
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 5px;
  background-color: var(--blue75);
  box-shadow: 0px 0px 6px 2px var(--blue);
  border-radius: 15px;
}

.car__seaters-two {
  top: 163px;
}

.car__seaters-four {
  top: 152px;
}

.car__seaters-five {
  top: 162px;
  left: 15px;
}

.car__seaters-six {
  top: 152px;
}

.car__seaters-seven {
  top: 144px;
  left: 21px;
}

.car__seaters-eight {
  top: 136px;
  left: 43px;
}

.car__seaters-front {
  display: flex;
}

.car__seaters-front__driver {
  position: relative;
  width: 38px;
  height: 38px;
  margin-right: 9px;
  border-radius: 10px;
  background-color: var(--grey);
}

.car__seaters-front__driver svg {
  position: absolute;
  top: calc(50% - 14px);
  left: calc(50% - 14px);
}

.car__seaters-front__seater img,
.car__seaters-center__seater img,
.car__seaters-back__seater img {
  width: 38px;
  height: 38px;
  border-radius: 100%;
  outline: 1px solid var(--white);
  outline-offset: -1px;
}

.car__seaters-front__seater,
.car__seaters-center__seater,
.car__seaters-back__seater {
  height: 38px;
  cursor: pointer;
}

.car__seaters-front__seater:hover img,
.car__seaters-center__seater:hover img,
.car__seaters-back__seater:hover img {
  outline: 1px solid var(--blue);
}

.car__seaters-center {
  display: flex;
}

.car__seaters-back {
  display: flex;
}

.car__seaters-center__none,
.car__seaters-back__none {
  position: relative;
  width: 38px;
  height: 38px;
  background-color: var(--blue);
  border-radius: 10px;
}

.car__seaters-center__none svg,
.car__seaters-back__none svg {
  position: absolute;
  top: calc(50% - 11.5px);
  left: calc(50% - 9px);
}

.car__seaters-back__seater-add,
.car__seaters-front__seater-add,
.car__seaters-center__seater-add {
  position: relative;
  width: 38px;
  height: 38px;
  border-radius: 10px;
  background-color: var(--white);
}

.car__seaters-back__seater-add svg,
.car__seaters-front__seater-add svg,
.car__seaters-center__seater-add svg {
  position: absolute;
  top: calc(50% - 12px);
  left: calc(50% - 12px);
  width: 24px;
  height: 24px;
}

.car__exit {
  position: absolute;
  right: 9px;
  top: -36px;
  height: 24px;
}

.car__exit:hover {
  cursor: pointer;
}

.car__info-wrapper {
  background-color: var(--blue);
  border-radius: 15px;
}

.car__info {
  display: flex;
  flex-direction: column;
  padding: 10px 15px;
  min-width: 160px;
}

.car__info-name {
  display: flex;
  align-items: center;
  margin-bottom: 2px;
  font-weight: 600;
  font-size: 16px;
  line-height: 22px;
  color: var(--white);
}

.car__info-class {
  font-weight: 600;
  font-size: 16px;
  line-height: 22px;
  color: var(--white);
}

.car__info-years {
  font-weight: 600;
  font-size: 16px;
  line-height: 22px;
  color: var(--white);
}
</style>

<style scoped>
.column-gap-9 {
  column-gap: 9px;
}

.column-gap-5 {
  column-gap: 5px;
}

.row-gap-11px {
  row-gap: 11px;
}
</style>
