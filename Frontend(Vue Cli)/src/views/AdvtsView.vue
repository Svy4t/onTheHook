<template>
  <div class="back">
    <HeaderComponent :id="userId" />
    <div class="home">
      <div class="home__header">
        <h1 @click="tab('All')" class="home__title active-header">
          Объявления
        </h1>
        <FilterComponentVue :openList="openList" />
        <h2 v-if="userId" @click="tab('My')" class="home__title-enable">Мои участия</h2>
      </div>
      <ul class="home__content active-content list-reset">
        <div class="home__first-col">
          <li
            class="home__item home-item"
            v-for="ad in advt.first"
            :key="ad.id"
            @click="showAdvt(ad.id)"
          >
            <div class="home-item__header">
              <div class="home-item__car">
                <svg
                  width="16"
                  height="14"
                  viewBox="0 0 16 14"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M12.736 8.24402C12.7185 8.19432 12.6943 8.14711 12.664 8.10363L12.568 7.98664L12.448 7.89304C12.4034 7.86353 12.355 7.83992 12.304 7.82285C12.2564 7.7991 12.205 7.78328 12.152 7.77605C12.0235 7.75096 11.8906 7.75704 11.765 7.79376C11.6395 7.83048 11.5251 7.89672 11.432 7.98664C11.3976 8.0237 11.3655 8.06277 11.336 8.10363C11.3057 8.14711 11.2815 8.19432 11.264 8.24402C11.2409 8.28823 11.2248 8.33555 11.216 8.38441C11.2121 8.43633 11.2121 8.48847 11.216 8.5404C11.2169 8.74501 11.3002 8.94108 11.448 9.08636C11.522 9.16178 11.6121 9.22037 11.712 9.25794C11.8032 9.29597 11.9009 9.31713 12 9.32034C12.2122 9.32034 12.4157 9.23817 12.5657 9.0919C12.7157 8.94563 12.8 8.74725 12.8 8.5404C12.8039 8.48847 12.8039 8.43633 12.8 8.38441C12.7862 8.33467 12.7646 8.28731 12.736 8.24402ZM14.208 4.72647L13.12 1.5599C12.954 1.10226 12.6462 0.706258 12.2391 0.426772C11.832 0.147285 11.3459 -0.00185385 10.848 1.73956e-05H5.152C4.65411 -0.00185385 4.16796 0.147285 3.76088 0.426772C3.3538 0.706258 3.04596 1.10226 2.88 1.5599L1.792 4.72647C1.28026 4.85712 0.827133 5.14894 0.503064 5.55657C0.178994 5.96419 0.00214129 6.46478 0 6.98051V10.1003C0.00139161 10.583 0.155903 11.0535 0.442351 11.4473C0.728799 11.8411 1.13316 12.1388 1.6 12.2997V13.2201C1.6 13.4269 1.68429 13.6253 1.83431 13.7716C1.98434 13.9178 2.18783 14 2.4 14C2.61217 14 2.81566 13.9178 2.96569 13.7716C3.11571 13.6253 3.2 13.4269 3.2 13.2201V12.4401H12.8V13.2201C12.8 13.4269 12.8843 13.6253 13.0343 13.7716C13.1843 13.9178 13.3878 14 13.6 14C13.8122 14 14.0157 13.9178 14.1657 13.7716C14.3157 13.6253 14.4 13.4269 14.4 13.2201V12.2997C14.8668 12.1388 15.2712 11.8411 15.5576 11.4473C15.8441 11.0535 15.9986 10.583 16 10.1003V6.98051C15.9979 6.46478 15.821 5.96419 15.4969 5.55657C15.1729 5.14894 14.7197 4.85712 14.208 4.72647ZM4.392 2.05127C4.44567 1.89636 4.54792 1.7618 4.6843 1.66663C4.82068 1.57146 4.98428 1.52048 5.152 1.52091H10.848C11.0225 1.51203 11.1951 1.55907 11.3395 1.65483C11.484 1.7506 11.5923 1.88983 11.648 2.05127L12.488 4.64068H3.512L4.392 2.05127ZM14.4 10.1003C14.4 10.3071 14.3157 10.5055 14.1657 10.6518C14.0157 10.7981 13.8122 10.8802 13.6 10.8802H2.4C2.18783 10.8802 1.98434 10.7981 1.83431 10.6518C1.68429 10.5055 1.6 10.3071 1.6 10.1003V6.98051C1.6 6.77366 1.68429 6.57527 1.83431 6.42901C1.98434 6.28274 2.18783 6.20057 2.4 6.20057H13.6C13.8122 6.20057 14.0157 6.28274 14.1657 6.42901C14.3157 6.57527 14.4 6.77366 14.4 6.98051V10.1003ZM4.736 8.24402C4.71849 8.19432 4.69428 8.14711 4.664 8.10363L4.568 7.98664C4.4555 7.87841 4.31264 7.8051 4.15745 7.77595C4.00226 7.7468 3.84169 7.76312 3.696 7.82285C3.5978 7.85997 3.50808 7.91563 3.432 7.98664C3.3976 8.0237 3.36554 8.06277 3.336 8.10363C3.30572 8.14711 3.28151 8.19432 3.264 8.24402C3.23536 8.28731 3.21377 8.33467 3.2 8.38441C3.19607 8.43633 3.19607 8.48847 3.2 8.5404C3.20066 8.69465 3.24823 8.84524 3.33668 8.97314C3.42513 9.10104 3.55049 9.2005 3.69692 9.25893C3.84334 9.31737 4.00426 9.33217 4.15931 9.30145C4.31436 9.27073 4.45658 9.19588 4.568 9.08636C4.7158 8.94108 4.79912 8.74501 4.8 8.5404C4.80393 8.48847 4.80393 8.43633 4.8 8.38441C4.78623 8.33467 4.76464 8.28731 4.736 8.24402Z"
                    fill="#F23535"
                  />
                </svg>
                <span class="home-item__car-span">{{ ad.car.name_car }}</span>
              </div>
              <div class="home-item__passengers">
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
                <span class="home-item__passengers-span"
                  >{{ ad.passengers.length }}/{{
                    ad.car.allowed_number_of_seats
                  }}</span
                >
              </div>
            </div>
            <span class="home-item__descr">{{ ad.header }}</span>
            <div class="home-item__footer">
              <div class="home-item__person">
                <img
                  :src="'http://cz57780.tw1.ru/avatars/' + ad.user.avatar"
                  alt="avatar"
                  class="home-item__person-img"
                />
                <span class="home-item__person-name"
                  >{{ ad.user.name }}{{ ad.user.surname }}</span
                >
              </div>
              <div class="home-item__time">
                <svg
                  width="17"
                  height="20"
                  viewBox="0 0 17 20"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M6.60409 3.13C6.33888 3.17774 6.10349 3.32888 5.94971 3.55017C5.79593 3.77147 5.73635 4.04478 5.78409 4.31C5.83183 4.57522 5.98297 4.81061 6.20426 4.96439C6.42556 5.11817 6.69887 5.17774 6.96409 5.13C7.29443 5.07293 7.62887 5.04283 7.96409 5.04C9.55539 5.04 11.0815 5.67214 12.2067 6.79736C13.332 7.92258 13.9641 9.4487 13.9641 11.04C13.9613 11.3752 13.9312 11.7097 13.8741 12.04C13.8273 12.2998 13.8852 12.5675 14.0351 12.7848C14.1849 13.0021 14.4146 13.1514 14.6741 13.2H14.8541C15.0909 13.2039 15.3214 13.1236 15.5045 12.9734C15.6876 12.8232 15.8115 12.613 15.8541 12.38C15.9469 11.9257 15.9971 11.4637 16.0041 11C15.9995 9.21977 15.4013 7.49193 14.3041 6.09L15.2141 5.19C15.4024 5.0017 15.5082 4.7463 15.5082 4.48C15.5082 4.2137 15.4024 3.9583 15.2141 3.77C15.0258 3.5817 14.7704 3.47591 14.5041 3.47591C14.2378 3.47591 13.9824 3.5817 13.7941 3.77L12.8941 4.68C11.495 3.59417 9.77511 3.00329 8.00409 3C7.53437 2.9991 7.06562 3.04263 6.60409 3.13ZM6.00409 2H10.0041C10.2693 2 10.5237 1.89464 10.7112 1.70711C10.8987 1.51957 11.0041 1.26522 11.0041 1C11.0041 0.734784 10.8987 0.48043 10.7112 0.292893C10.5237 0.105357 10.2693 0 10.0041 0H6.00409C5.73887 0 5.48452 0.105357 5.29698 0.292893C5.10945 0.48043 5.00409 0.734784 5.00409 1C5.00409 1.26522 5.10945 1.51957 5.29698 1.70711C5.48452 1.89464 5.73887 2 6.00409 2ZM9.49409 11.08C9.49409 11.08 9.49409 11.03 9.49409 11C9.49409 10.97 9.49409 10.95 9.49409 10.92L10.8341 9.59C10.9273 9.49676 11.0013 9.38607 11.0518 9.26425C11.1022 9.14243 11.1282 9.01186 11.1282 8.88C11.1282 8.74814 11.1022 8.61757 11.0518 8.49575C11.0013 8.37393 10.9273 8.26324 10.8341 8.17C10.7409 8.07676 10.6302 8.0028 10.5083 7.95234C10.3865 7.90188 10.2559 7.87591 10.1241 7.87591C9.99223 7.87591 9.86166 7.90188 9.73984 7.95234C9.61802 8.0028 9.50733 8.07676 9.41409 8.17L8.08409 9.5H7.92409L1.71409 3.29C1.52579 3.1017 1.27039 2.99591 1.00409 2.99591C0.73779 2.99591 0.482395 3.1017 0.294091 3.29C0.105788 3.4783 1.9841e-09 3.7337 0 4C-1.9841e-09 4.2663 0.105788 4.5217 0.294091 4.71L0.774091 5.19L1.68409 6.1C0.497561 7.6396 -0.0878467 9.55853 0.0372412 11.4983C0.162329 13.438 0.989356 15.2658 2.3638 16.6403C3.73825 18.0147 5.5661 18.8418 7.50583 18.9669C9.44557 19.0919 11.3645 18.5065 12.9041 17.32L14.2941 18.71C14.3871 18.8037 14.4977 18.8781 14.6195 18.9289C14.7414 18.9797 14.8721 19.0058 15.0041 19.0058C15.1361 19.0058 15.2668 18.9797 15.3887 18.9289C15.5105 18.8781 15.6211 18.8037 15.7141 18.71C15.8078 18.617 15.8822 18.5064 15.933 18.3846C15.9838 18.2627 16.0099 18.132 16.0099 18C16.0099 17.868 15.9838 17.7373 15.933 17.6154C15.8822 17.4936 15.8078 17.383 15.7141 17.29L9.49409 11.08ZM8.00409 17C6.89895 17.0031 5.81443 16.7008 4.87014 16.1266C3.92586 15.5525 3.15851 14.7286 2.65272 13.746C2.14694 12.7634 1.92236 11.6602 2.00377 10.558C2.08518 9.45588 2.46942 8.39764 3.11409 7.5L6.51409 10.89C6.51409 10.89 6.51409 10.94 6.51409 10.97C6.51011 11.1687 6.54564 11.3661 6.61862 11.5509C6.69159 11.7357 6.80055 11.9042 6.93918 12.0466C7.0778 12.1889 7.24333 12.3023 7.42614 12.3801C7.60895 12.458 7.8054 12.4987 8.00409 12.5H8.08409L11.4741 15.9C10.4592 16.6172 9.24676 17.0015 8.00409 17Z"
                    fill="#899DA5"
                  />
                </svg>
                <span class="home-item__time-span">{{ ad.date }}</span>
              </div>
            </div>
          </li>
        </div>
        <div class="home__second-col">
          <li
            class="home__item home-item"
            v-for="ad in advt.second"
            :key="ad.id"
            @click="showAdvt(ad.id)"
          >
            <div class="home-item__header">
              <div class="home-item__car">
                <svg
                  width="16"
                  height="14"
                  viewBox="0 0 16 14"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M12.736 8.24402C12.7185 8.19432 12.6943 8.14711 12.664 8.10363L12.568 7.98664L12.448 7.89304C12.4034 7.86353 12.355 7.83992 12.304 7.82285C12.2564 7.7991 12.205 7.78328 12.152 7.77605C12.0235 7.75096 11.8906 7.75704 11.765 7.79376C11.6395 7.83048 11.5251 7.89672 11.432 7.98664C11.3976 8.0237 11.3655 8.06277 11.336 8.10363C11.3057 8.14711 11.2815 8.19432 11.264 8.24402C11.2409 8.28823 11.2248 8.33555 11.216 8.38441C11.2121 8.43633 11.2121 8.48847 11.216 8.5404C11.2169 8.74501 11.3002 8.94108 11.448 9.08636C11.522 9.16178 11.6121 9.22037 11.712 9.25794C11.8032 9.29597 11.9009 9.31713 12 9.32034C12.2122 9.32034 12.4157 9.23817 12.5657 9.0919C12.7157 8.94563 12.8 8.74725 12.8 8.5404C12.8039 8.48847 12.8039 8.43633 12.8 8.38441C12.7862 8.33467 12.7646 8.28731 12.736 8.24402ZM14.208 4.72647L13.12 1.5599C12.954 1.10226 12.6462 0.706258 12.2391 0.426772C11.832 0.147285 11.3459 -0.00185385 10.848 1.73956e-05H5.152C4.65411 -0.00185385 4.16796 0.147285 3.76088 0.426772C3.3538 0.706258 3.04596 1.10226 2.88 1.5599L1.792 4.72647C1.28026 4.85712 0.827133 5.14894 0.503064 5.55657C0.178994 5.96419 0.00214129 6.46478 0 6.98051V10.1003C0.00139161 10.583 0.155903 11.0535 0.442351 11.4473C0.728799 11.8411 1.13316 12.1388 1.6 12.2997V13.2201C1.6 13.4269 1.68429 13.6253 1.83431 13.7716C1.98434 13.9178 2.18783 14 2.4 14C2.61217 14 2.81566 13.9178 2.96569 13.7716C3.11571 13.6253 3.2 13.4269 3.2 13.2201V12.4401H12.8V13.2201C12.8 13.4269 12.8843 13.6253 13.0343 13.7716C13.1843 13.9178 13.3878 14 13.6 14C13.8122 14 14.0157 13.9178 14.1657 13.7716C14.3157 13.6253 14.4 13.4269 14.4 13.2201V12.2997C14.8668 12.1388 15.2712 11.8411 15.5576 11.4473C15.8441 11.0535 15.9986 10.583 16 10.1003V6.98051C15.9979 6.46478 15.821 5.96419 15.4969 5.55657C15.1729 5.14894 14.7197 4.85712 14.208 4.72647ZM4.392 2.05127C4.44567 1.89636 4.54792 1.7618 4.6843 1.66663C4.82068 1.57146 4.98428 1.52048 5.152 1.52091H10.848C11.0225 1.51203 11.1951 1.55907 11.3395 1.65483C11.484 1.7506 11.5923 1.88983 11.648 2.05127L12.488 4.64068H3.512L4.392 2.05127ZM14.4 10.1003C14.4 10.3071 14.3157 10.5055 14.1657 10.6518C14.0157 10.7981 13.8122 10.8802 13.6 10.8802H2.4C2.18783 10.8802 1.98434 10.7981 1.83431 10.6518C1.68429 10.5055 1.6 10.3071 1.6 10.1003V6.98051C1.6 6.77366 1.68429 6.57527 1.83431 6.42901C1.98434 6.28274 2.18783 6.20057 2.4 6.20057H13.6C13.8122 6.20057 14.0157 6.28274 14.1657 6.42901C14.3157 6.57527 14.4 6.77366 14.4 6.98051V10.1003ZM4.736 8.24402C4.71849 8.19432 4.69428 8.14711 4.664 8.10363L4.568 7.98664C4.4555 7.87841 4.31264 7.8051 4.15745 7.77595C4.00226 7.7468 3.84169 7.76312 3.696 7.82285C3.5978 7.85997 3.50808 7.91563 3.432 7.98664C3.3976 8.0237 3.36554 8.06277 3.336 8.10363C3.30572 8.14711 3.28151 8.19432 3.264 8.24402C3.23536 8.28731 3.21377 8.33467 3.2 8.38441C3.19607 8.43633 3.19607 8.48847 3.2 8.5404C3.20066 8.69465 3.24823 8.84524 3.33668 8.97314C3.42513 9.10104 3.55049 9.2005 3.69692 9.25893C3.84334 9.31737 4.00426 9.33217 4.15931 9.30145C4.31436 9.27073 4.45658 9.19588 4.568 9.08636C4.7158 8.94108 4.79912 8.74501 4.8 8.5404C4.80393 8.48847 4.80393 8.43633 4.8 8.38441C4.78623 8.33467 4.76464 8.28731 4.736 8.24402Z"
                    fill="#F23535"
                  />
                </svg>
                <span class="home-item__car-span">{{ ad.car.name_car }}</span>
              </div>
              <div class="home-item__passengers">
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
                <span class="home-item__passengers-span"
                  >{{ ad.passengers.length }}/{{
                    ad.car.allowed_number_of_seats
                  }}</span
                >
              </div>
            </div>
            <span class="home-item__descr">{{ ad.header }}</span>
            <div class="home-item__footer">
              <div class="home-item__person">
                <img
                  :src="'http://cz57780.tw1.ru/avatars/' + ad.user.avatar"
                  alt="avatar"
                  class="home-item__person-img"
                />
                <span class="home-item__person-name"
                  >{{ ad.user.name }}{{ ad.user.surname }}</span
                >
              </div>
              <div class="home-item__time">
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
                <span class="home-item__time-span">{{ ad.date }}</span>
              </div>
            </div>
          </li>
        </div>
        <div class="home__third-col">
          <li
            class="home__item home-item"
            v-for="ad in advt.third"
            :key="ad.id"
            @click="showAdvt(ad.id)"
          >
            <div class="home-item__header">
              <div class="home-item__car">
                <svg
                  width="16"
                  height="14"
                  viewBox="0 0 16 14"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M12.736 8.24402C12.7185 8.19432 12.6943 8.14711 12.664 8.10363L12.568 7.98664L12.448 7.89304C12.4034 7.86353 12.355 7.83992 12.304 7.82285C12.2564 7.7991 12.205 7.78328 12.152 7.77605C12.0235 7.75096 11.8906 7.75704 11.765 7.79376C11.6395 7.83048 11.5251 7.89672 11.432 7.98664C11.3976 8.0237 11.3655 8.06277 11.336 8.10363C11.3057 8.14711 11.2815 8.19432 11.264 8.24402C11.2409 8.28823 11.2248 8.33555 11.216 8.38441C11.2121 8.43633 11.2121 8.48847 11.216 8.5404C11.2169 8.74501 11.3002 8.94108 11.448 9.08636C11.522 9.16178 11.6121 9.22037 11.712 9.25794C11.8032 9.29597 11.9009 9.31713 12 9.32034C12.2122 9.32034 12.4157 9.23817 12.5657 9.0919C12.7157 8.94563 12.8 8.74725 12.8 8.5404C12.8039 8.48847 12.8039 8.43633 12.8 8.38441C12.7862 8.33467 12.7646 8.28731 12.736 8.24402ZM14.208 4.72647L13.12 1.5599C12.954 1.10226 12.6462 0.706258 12.2391 0.426772C11.832 0.147285 11.3459 -0.00185385 10.848 1.73956e-05H5.152C4.65411 -0.00185385 4.16796 0.147285 3.76088 0.426772C3.3538 0.706258 3.04596 1.10226 2.88 1.5599L1.792 4.72647C1.28026 4.85712 0.827133 5.14894 0.503064 5.55657C0.178994 5.96419 0.00214129 6.46478 0 6.98051V10.1003C0.00139161 10.583 0.155903 11.0535 0.442351 11.4473C0.728799 11.8411 1.13316 12.1388 1.6 12.2997V13.2201C1.6 13.4269 1.68429 13.6253 1.83431 13.7716C1.98434 13.9178 2.18783 14 2.4 14C2.61217 14 2.81566 13.9178 2.96569 13.7716C3.11571 13.6253 3.2 13.4269 3.2 13.2201V12.4401H12.8V13.2201C12.8 13.4269 12.8843 13.6253 13.0343 13.7716C13.1843 13.9178 13.3878 14 13.6 14C13.8122 14 14.0157 13.9178 14.1657 13.7716C14.3157 13.6253 14.4 13.4269 14.4 13.2201V12.2997C14.8668 12.1388 15.2712 11.8411 15.5576 11.4473C15.8441 11.0535 15.9986 10.583 16 10.1003V6.98051C15.9979 6.46478 15.821 5.96419 15.4969 5.55657C15.1729 5.14894 14.7197 4.85712 14.208 4.72647ZM4.392 2.05127C4.44567 1.89636 4.54792 1.7618 4.6843 1.66663C4.82068 1.57146 4.98428 1.52048 5.152 1.52091H10.848C11.0225 1.51203 11.1951 1.55907 11.3395 1.65483C11.484 1.7506 11.5923 1.88983 11.648 2.05127L12.488 4.64068H3.512L4.392 2.05127ZM14.4 10.1003C14.4 10.3071 14.3157 10.5055 14.1657 10.6518C14.0157 10.7981 13.8122 10.8802 13.6 10.8802H2.4C2.18783 10.8802 1.98434 10.7981 1.83431 10.6518C1.68429 10.5055 1.6 10.3071 1.6 10.1003V6.98051C1.6 6.77366 1.68429 6.57527 1.83431 6.42901C1.98434 6.28274 2.18783 6.20057 2.4 6.20057H13.6C13.8122 6.20057 14.0157 6.28274 14.1657 6.42901C14.3157 6.57527 14.4 6.77366 14.4 6.98051V10.1003ZM4.736 8.24402C4.71849 8.19432 4.69428 8.14711 4.664 8.10363L4.568 7.98664C4.4555 7.87841 4.31264 7.8051 4.15745 7.77595C4.00226 7.7468 3.84169 7.76312 3.696 7.82285C3.5978 7.85997 3.50808 7.91563 3.432 7.98664C3.3976 8.0237 3.36554 8.06277 3.336 8.10363C3.30572 8.14711 3.28151 8.19432 3.264 8.24402C3.23536 8.28731 3.21377 8.33467 3.2 8.38441C3.19607 8.43633 3.19607 8.48847 3.2 8.5404C3.20066 8.69465 3.24823 8.84524 3.33668 8.97314C3.42513 9.10104 3.55049 9.2005 3.69692 9.25893C3.84334 9.31737 4.00426 9.33217 4.15931 9.30145C4.31436 9.27073 4.45658 9.19588 4.568 9.08636C4.7158 8.94108 4.79912 8.74501 4.8 8.5404C4.80393 8.48847 4.80393 8.43633 4.8 8.38441C4.78623 8.33467 4.76464 8.28731 4.736 8.24402Z"
                    fill="#F23535"
                  />
                </svg>
                <span class="home-item__car-span">{{ ad.car.name_car }}</span>
              </div>
              <div class="home-item__passengers">
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
                <span class="home-item__passengers-span"
                  >{{ ad.passengers.length }}/{{
                    ad.car.allowed_number_of_seats
                  }}</span
                >
              </div>
            </div>
            <span class="home-item__descr">{{ ad.header }}</span>
            <div class="home-item__footer">
              <div class="home-item__person">
                <img
                  :src="'http://cz57780.tw1.ru/avatars/' + ad.user.avatar"
                  alt="avatar"
                  class="home-item__person-img"
                />
                <span class="home-item__person-name"
                  >{{ ad.user.name }} {{ ad.user.surname }}</span
                >
              </div>
              <div class="home-item__time">
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
                <span class="home-item__time-span">{{ ad.date }}</span>
              </div>
            </div>
          </li>
        </div>
      </ul>
    </div>
    <div class="advt">
      <svg
        class="advt__cancel"
        @click="toggleAdvt()"
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
      <ShowAdvtComponent :id="advtId" :openList="openList" />
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
import FilterComponentVue from "@/components/FilterComponent.vue";
import ShowAdvtComponent from "@/components/ShowAdvtComponent.vue";

export default {
  name: "HomeView",
  components: {
    ShowAdvtComponent,
    HeaderComponent,
    FilterComponentVue,
  },
  data() {
    return {
      encodeText,
      decodeText,
      getCookie,
      setCookie,
      rest_comment: getCookie("comment"),
      rest_car: getCookie("car"),
      role: getCookie("role"),
      userId: getCookie("id"),
      token: getCookie("token"),
      avatar: getCookie("avatar"),
      advt: [],
      originalAdvts: [],
      dateFilter: this.$route.params.date,
      advtId: Number,
      openList: "All",
    };
  },
  mounted() {
    this.output();
  },
  beforeUpdate() {
    this.dateFilter = this.$route.params.date;
    if (this.dateFilter) this.filterAdvts(this.dateFilter);
    else this.advt = this.threeDivision(this.originalAdvts);
  },
  methods: {
    threeDivision(array) {
      let firstColumn = [];
      let secondColumn = [];
      let thirdColumn = [];
      for (let index = 0; index < array.length; index++) {
        if (index % 3 === 0) {
          firstColumn.push(array[index]);
        } else if (index % 3 === 1) {
          secondColumn.push(array[index]);
        } else {
          thirdColumn.push(array[index]);
        }
      }
      return {
        first: firstColumn,
        second: secondColumn,
        third: thirdColumn,
      };
    },
    output() {
      axios
        .get("http://cz57780.tw1.ru/api/advt")
        .then((response) => {
          for (let index = 0; index < response.data.length; index++) {
            if (new Date(response.data[index].date) < new Date()) {
              response.data.splice(index, 1);
              index -= 1;
            }
          }
          this.advt = this.timeNormalize(response.data);
          this.originalAdvts = this.advt;
          this.advt = this.threeDivision(this.advt);
          // console.log(this.advt);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    outputMyParticipation() {
      axios
        .post("http://cz57780.tw1.ru/api/allMyParticipation", {
          user_id: this.userId,
        })
        .then((response) => {
          this.advt = this.timeNormalize(response.data);
          this.originalAdvts = this.advt;
          this.advt = this.threeDivision(this.advt);
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    deleteComment(commentId) {
      axios
        .post("http://cz57780.tw1.ru/api/deleteComment", {
          id: commentId,
        })
        .then((response) => {
          console.log(response);
          this.output();
        })
        .catch((error) => {
          console.log(error.response.data);
        });
    },
    deleteAdvt(advtId) {
      axios
        .post("http://cz57780.tw1.ru/api/deleteAdvt", {
          id: advtId,
        })
        .then((response) => {
          console.log(response);
          this.output();
        })
        .catch((error) => {
          console.log(error.response.data);
        });
    },
    goUserProfile(id) {
      if (this.token === undefined) {
        alert("Авторизуйтесь");
        return;
      }
      if (id == this.userId) {
        this.$router.push({
          path: "/profile",
        });
      } else {
        this.$router.push(`/profileUser/${this.token}`);
      }
    },
    filterAdvts(date) {
      this.advt = this.threeDivision(
        this.originalAdvts.filter((ad) => ad.date === date)
      );
    },
    tab(text) {
      if (text === "My") {
        document
          .querySelector(".home__title-enable")
          .classList.add("active-header");
        document
          .querySelector(".home__title")
          .classList.remove("active-header");
        this.openList = "My";
        this.outputMyParticipation();
      } else {
        document.querySelector(".home__title").classList.add("active-header");
        document
          .querySelector(".home__title-enable")
          .classList.remove("active-header");
        this.openList = "All";
        this.output();
      }
    },
    timeNormalize(array) {
      array.forEach((el) => {
        this.date = new Date(Date.parse(el.created_at));
        this.dateTime = this.date.toLocaleTimeString().slice(0, -3);
        this.dateDay = this.date.toLocaleDateString();
        el.created_at = this.dateDay + " " + this.dateTime;
        el.comments.forEach((comment) => {
          this.date = new Date(Date.parse(comment.created_at));
          this.dateTime = this.date.toLocaleTimeString().slice(0, -3);
          this.dateDay = this.date.toLocaleDateString();
          comment.created_at = this.dateDay + " " + this.dateTime;
        });
      });
      return array;
    },
    showAdvt(id) {
      this.advtId = id;
      this.toggleAdvt();
    },
    toggleAdvt() {
      document.querySelector(".advt").classList.toggle("advt-open");
    },
  },
};
</script>
<style scoped>
.back {
  min-height: 100vh;
  background-image: url("@/assets/background-for-advts.png");
  background-size: cover;
  background-attachment: fixed;
}

.home {
  max-width: 1480px;
  margin: 0 auto;
  padding: 50px 30px;
}

.home__title {
  margin: 0;
  margin-right: 5px;
  font-weight: 600;
  font-size: 24px;
  line-height: 33px;
  color: var(--white);
}

.home__header {
  display: flex;
  align-items: flex-end;
  margin-bottom: 20px;
}

.home__title-enable {
  margin: 0;
  font-weight: 600;
  font-size: 24px;
  line-height: 33px;
  color: var(--white);
}

.home__title:hover,
.home__title-enable:hover {
  cursor: pointer;
  /* color: #192a39; */
}

.home__content {
  overflow: auto;
  max-height: 777px;
  display: none;
  gap: 20px;
}

.home__first-col,
.home__second-col,
.home__third-col {
  width: 32.3943661971831%;
}

.home__item {
  display: flex;
  flex-direction: column;
  background-color: var(--white);
  padding: 15px 30px;
  border-radius: 15px;
}

.home-item:not(:last-child) {
  margin-bottom: 20px;
}

.home-item__header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 7px;
}

.home-item__car {
  display: flex;
  align-items: center;
}

.home-item__car svg {
  margin-right: 5px;
}

.home-item__car-span {
  font-weight: 600;
  font-size: 16px;
  line-height: 22px;
  color: var(--red);
}

.home-item__passengers {
  display: flex;
  align-items: center;
}

.home-item__passengers svg {
  margin-right: 5px;
}

.home-item__passengers-span {
  font-weight: 600;
  font-size: 16px;
  line-height: 22px;
  color: var(--blue);
}

.home-item__descr {
  margin-bottom: 10px;
  font-weight: 700;
  font-size: 18px;
  line-height: 130%;
  color: var(--blue);
}

.home-item__footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.home-item__person {
  display: flex;
  align-items: center;
}

.home-item__person-img {
  width: 30px;
  height: 30px;
  border-radius: 100%;
  margin-right: 5px;
}

.home-item__person-name {
  font-weight: 400;
  font-size: 16px;
  line-height: 22px;
  color: var(--blue);
}

.home-item__time {
  display: flex;
  align-items: center;
}

.home-item__time svg {
  margin-right: 5px;
}

.home-item__time-span {
  font-weight: 500;
  font-size: 16px;
  line-height: 22px;
  color: var(--grey);
}

.active-header {
  font-weight: 700;
  font-size: 48px;
  line-height: 54px;
  color: var(--white);
}

.active-content {
  display: flex;
}

.advt {
  display: none;
  position: absolute;
  left: 0;
  top: 0;
  z-index: 5;
}

.advt-open {
  display: block;
}

.advt__cancel {
  position: relative;
  z-index: 10;
  left: 1365px;
  top: 104px;
  cursor: pointer;
}
</style>
