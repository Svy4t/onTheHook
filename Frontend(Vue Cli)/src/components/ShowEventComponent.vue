<template>
  <div class="main">
    <div class="content">
      <div class="main-content__wrapper">
        <div class="main-content__header">
          <div v-if="event.organizer" class="main-content__header__avatar">
            <img
              :src="'http://cz57780.tw1.ru/avatars/' + event.organizer.avatar"
              alt="avatar"
              class="main-content__header__avatar-img"
            />
            <span class="main-content__header__avatar-span">
              {{ event.organizer.name }} {{ event.organizer.surname }}
            </span>
            <div class="avatar__btns">
              <DropDownForAvatarComponentVue
                :mode="'organizer'"
                :role="role"
                :partId="event.organizer.id"
                :organizerId="event.organizer.id"
                :userId="userId"
                :eventId="event.id"
              />
            </div>
          </div>
          <div class="main-content__header-win event__win">
            <svg
              width="40"
              height="40"
              viewBox="0 0 40 40"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M38 4H32V2C32 1.46957 31.7893 0.960859 31.4142 0.585786C31.0391 0.210714 30.5304 0 30 0H10C9.46957 0 8.96086 0.210714 8.58579 0.585786C8.21071 0.960859 8 1.46957 8 2V4H2C1.46957 4 0.960859 4.21071 0.585786 4.58579C0.210714 4.96086 0 5.46957 0 6V12C0 14.1217 0.842855 16.1566 2.34315 17.6569C3.84344 19.1571 5.87827 20 8 20H11.08C12.8891 22.0183 15.3281 23.3647 18 23.82V28H16C14.4087 28 12.8826 28.6321 11.7574 29.7574C10.6321 30.8826 10 32.4087 10 34V38C10 38.5304 10.2107 39.0391 10.5858 39.4142C10.9609 39.7893 11.4696 40 12 40H28C28.5304 40 29.0391 39.7893 29.4142 39.4142C29.7893 39.0391 30 38.5304 30 38V34C30 32.4087 29.3679 30.8826 28.2426 29.7574C27.1174 28.6321 25.5913 28 24 28H22V23.82C24.6719 23.3647 27.1109 22.0183 28.92 20H32C34.1217 20 36.1566 19.1571 37.6569 17.6569C39.1571 16.1566 40 14.1217 40 12V6C40 5.46957 39.7893 4.96086 39.4142 4.58579C39.0391 4.21071 38.5304 4 38 4ZM8 16C6.93913 16 5.92172 15.5786 5.17157 14.8284C4.42143 14.0783 4 13.0609 4 12V8H8V12C8.0044 13.3634 8.24112 14.7161 8.7 16H8ZM24 32C24.5304 32 25.0391 32.2107 25.4142 32.5858C25.7893 32.9609 26 33.4696 26 34V36H14V34C14 33.4696 14.2107 32.9609 14.5858 32.5858C14.9609 32.2107 15.4696 32 16 32H24ZM28 12C28 14.1217 27.1571 16.1566 25.6569 17.6569C24.1566 19.1571 22.1217 20 20 20C17.8783 20 15.8434 19.1571 14.3431 17.6569C12.8429 16.1566 12 14.1217 12 12V4H28V12ZM36 12C36 13.0609 35.5786 14.0783 34.8284 14.8284C34.0783 15.5786 33.0609 16 32 16H31.3C31.7589 14.7161 31.9956 13.3634 32 12V8H36V12Z"
                fill="#192A39"
              />
            </svg>
            <div class="event__win-money">
              <span>{{ event.win }}</span
              >руб.
            </div>
          </div>
          <div class="main-content__header-people event__max-people">
            <svg
              width="35"
              height="27"
              viewBox="0 0 22 17"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M11.3 8.72C11.8336 8.25813 12.2616 7.68688 12.5549 7.04502C12.8482 6.40316 13 5.70571 13 5C13 3.67392 12.4732 2.40215 11.5355 1.46447C10.5979 0.526784 9.32608 1.78911e-07 8 1.78911e-07C6.67392 1.78911e-07 5.40215 0.526784 4.46447 1.46447C3.52678 2.40215 3 3.67392 3 5C2.99999 5.70571 3.1518 6.40316 3.44513 7.04502C3.73845 7.68688 4.16642 8.25813 4.7 8.72C3.30014 9.35388 2.11247 10.3775 1.27898 11.6685C0.445495 12.9596 0.00147185 14.4633 0 16C0 16.2652 0.105357 16.5196 0.292893 16.7071C0.48043 16.8946 0.734784 17 1 17C1.26522 17 1.51957 16.8946 1.70711 16.7071C1.89464 16.5196 2 16.2652 2 16C2 14.4087 2.63214 12.8826 3.75736 11.7574C4.88258 10.6321 6.4087 10 8 10C9.5913 10 11.1174 10.6321 12.2426 11.7574C13.3679 12.8826 14 14.4087 14 16C14 16.2652 14.1054 16.5196 14.2929 16.7071C14.4804 16.8946 14.7348 17 15 17C15.2652 17 15.5196 16.8946 15.7071 16.7071C15.8946 16.5196 16 16.2652 16 16C15.9985 14.4633 15.5545 12.9596 14.721 11.6685C13.8875 10.3775 12.6999 9.35388 11.3 8.72ZM8 8C7.40666 8 6.82664 7.82405 6.33329 7.49441C5.83994 7.16476 5.45542 6.69623 5.22836 6.14805C5.0013 5.59987 4.94189 4.99667 5.05764 4.41473C5.1734 3.83279 5.45912 3.29824 5.87868 2.87868C6.29824 2.45912 6.83279 2.1734 7.41473 2.05764C7.99667 1.94189 8.59987 2.0013 9.14805 2.22836C9.69623 2.45542 10.1648 2.83994 10.4944 3.33329C10.8241 3.82664 11 4.40666 11 5C11 5.79565 10.6839 6.55871 10.1213 7.12132C9.55871 7.68393 8.79565 8 8 8ZM17.74 8.32C18.38 7.59933 18.798 6.70905 18.9438 5.75634C19.0896 4.80362 18.9569 3.82907 18.5618 2.95C18.1666 2.07093 17.5258 1.3248 16.7165 0.801423C15.9071 0.27805 14.9638 -0.0002576 14 1.78911e-07C13.7348 1.78911e-07 13.4804 0.105357 13.2929 0.292893C13.1054 0.48043 13 0.734784 13 1C13 1.26522 13.1054 1.51957 13.2929 1.70711C13.4804 1.89464 13.7348 2 14 2C14.7956 2 15.5587 2.31607 16.1213 2.87868C16.6839 3.44129 17 4.20435 17 5C16.9986 5.52524 16.8593 6.0409 16.5961 6.49542C16.3328 6.94994 15.9549 7.32738 15.5 7.59C15.3517 7.67552 15.2279 7.79766 15.1404 7.94474C15.0528 8.09182 15.0045 8.2589 15 8.43C14.9958 8.59976 15.0349 8.7678 15.1137 8.91826C15.1924 9.06872 15.3081 9.19665 15.45 9.29L15.84 9.55L15.97 9.62C17.1754 10.1917 18.1923 11.096 18.901 12.2263C19.6096 13.3566 19.9805 14.6659 19.97 16C19.97 16.2652 20.0754 16.5196 20.2629 16.7071C20.4504 16.8946 20.7048 17 20.97 17C21.2352 17 21.4896 16.8946 21.6771 16.7071C21.8646 16.5196 21.97 16.2652 21.97 16C21.9782 14.4654 21.5938 12.9543 20.8535 11.6101C20.1131 10.2659 19.0413 9.13331 17.74 8.32Z"
                fill="#192A39"
              />
            </svg>
            <div class="event__max-people__count">
              {{ event.max_people }} max
            </div>
          </div>
        </div>
        <div class="main-content__title">
          {{ event.header }}
        </div>
        <div class="main-content__middle">
          <div class="main-content__middle-place">
            <svg
              width="24"
              height="29"
              viewBox="0 0 24 29"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M12 0C8.8174 0 5.76516 1.22214 3.51472 3.39755C1.26428 5.57297 0 8.52346 0 11.6C0 19.4299 10.575 28.2749 11.025 28.6519C11.2967 28.8766 11.6425 29 12 29C12.3575 29 12.7033 28.8766 12.975 28.6519C13.5 28.2749 24 19.4299 24 11.6C24 8.52346 22.7357 5.57297 20.4853 3.39755C18.2348 1.22214 15.1826 0 12 0ZM12 25.5924C8.805 22.6924 3 16.4429 3 11.6C3 9.29259 3.94821 7.07971 5.63604 5.44815C7.32387 3.81659 9.61305 2.89999 12 2.89999C14.3869 2.89999 16.6761 3.81659 18.364 5.44815C20.0518 7.07971 21 9.29259 21 11.6C21 16.4429 15.195 22.7069 12 25.5924ZM12 5.79998C10.8133 5.79998 9.65327 6.14014 8.66658 6.77745C7.67988 7.41476 6.91085 8.3206 6.45672 9.38041C6.0026 10.4402 5.88378 11.6064 6.11529 12.7315C6.3468 13.8566 6.91824 14.89 7.75736 15.7012C8.59647 16.5123 9.66557 17.0647 10.8295 17.2885C11.9933 17.5123 13.1997 17.3974 14.2961 16.9584C15.3925 16.5195 16.3295 15.7761 16.9888 14.8223C17.6481 13.8685 18 12.7471 18 11.6C18 10.0617 17.3679 8.58646 16.2426 7.49876C15.1174 6.41105 13.5913 5.79998 12 5.79998ZM12 14.5C11.4067 14.5 10.8266 14.3299 10.3333 14.0112C9.83994 13.6926 9.45542 13.2396 9.22836 12.7097C9.0013 12.1798 8.94189 11.5967 9.05764 11.0342C9.1734 10.4717 9.45912 9.95493 9.87868 9.54936C10.2982 9.14379 10.8328 8.86759 11.4147 8.75569C11.9967 8.6438 12.5999 8.70123 13.1481 8.92072C13.6962 9.14021 14.1648 9.51191 14.4944 9.98881C14.8241 10.4657 15 11.0264 15 11.6C15 12.3691 14.6839 13.1067 14.1213 13.6506C13.5587 14.1944 12.7956 14.5 12 14.5Z"
                fill="#F23535"
              />
            </svg>
            {{ event.place }}
          </div>
          <div class="main-content__middle-time event__time">
            <div class="event__time-to">
              <svg
                width="18"
                height="18"
                viewBox="0 0 20 20"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17317C0.00433284 8.00043 -0.193701 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8079C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7363 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM10 18C8.41775 18 6.87104 17.5308 5.55544 16.6518C4.23985 15.7727 3.21447 14.5233 2.60897 13.0615C2.00347 11.5997 1.84504 9.99113 2.15372 8.43928C2.4624 6.88743 3.22433 5.46197 4.34315 4.34315C5.46197 3.22433 6.88743 2.4624 8.43928 2.15372C9.99113 1.84504 11.5997 2.00346 13.0615 2.60896C14.5233 3.21447 15.7727 4.23984 16.6518 5.55544C17.5308 6.87103 18 8.41775 18 10C18 12.1217 17.1572 14.1566 15.6569 15.6569C14.1566 17.1571 12.1217 18 10 18ZM13.1 10.63L11 9.42V5C11 4.73478 10.8946 4.48043 10.7071 4.29289C10.5196 4.10536 10.2652 4 10 4C9.73479 4 9.48043 4.10536 9.2929 4.29289C9.10536 4.48043 9 4.73478 9 5V10C9 10 9 10.08 9 10.12C9.00593 10.1889 9.02281 10.2564 9.05 10.32C9.0706 10.3793 9.09741 10.4363 9.13 10.49C9.15737 10.5468 9.1909 10.6005 9.23 10.65L9.39001 10.78L9.48 10.87L12.08 12.37C12.2324 12.4564 12.4048 12.5012 12.58 12.5C12.8014 12.5015 13.0171 12.4296 13.1932 12.2953C13.3693 12.1611 13.4959 11.9722 13.5531 11.7583C13.6103 11.5444 13.5948 11.3176 13.5092 11.1134C13.4236 10.9092 13.2726 10.7392 13.08 10.63H13.1Z"
                  fill="#F23535"
                />
              </svg>
              <span class="event__time-to__span">c</span>
              {{ event.day }} {{ event.start }}
            </div>
            <div class="event__time-from">
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
              <span class="event__time-to__span">до</span>
              {{ event.day }} {{ event.end }}
            </div>
          </div>
        </div>
        <span class="main-content__description">{{ event.description }}</span>
        <div
          v-if="
            rest_part == false &&
            userId &&
            (userId != organizer.id || openList === 'Admin')
          "
          class="btns"
        >
          <div v-if="openList === 'All'" class="main-content__btns">
            <button
              @click="addPart(event.id)"
              class="main-content__btns-add"
              :disabled="ItsMe"
            >
              УЧАСТВОВАТЬ
            </button>
            <button
              @click="deletePart()"
              class="main-content__btns-remove"
              :disabled="!ItsMe"
            >
              НЕ УЧАСТВОВАТЬ
            </button>
          </div>
          <div v-if="openList === 'Admin'" class="main-content__btns">
            <button
              @click="confirmedEvent(organizer.id)"
              class="main-content__btns-add"
            >
              ПОТВЕРДИТЬ
            </button>
            <button
              @click="deleteEvent(organizer.id)"
              class="main-content__btns-remove"
            >
              УДАЛИТЬ
            </button>
          </div>
        </div>
        <div
          class="people"
          :class="{ openList: openPeople }"
          @mouseover="open('over')"
          @mouseout="open('out')"
        >
          <div class="people__wrapper">
            <div class="people__count">
              <svg
                width="22"
                height="17"
                viewBox="0 0 22 17"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M11.3 8.72C11.8336 8.25813 12.2616 7.68688 12.5549 7.04502C12.8482 6.40316 13 5.70571 13 5C13 3.67392 12.4732 2.40215 11.5355 1.46447C10.5979 0.526784 9.32608 1.78911e-07 8 1.78911e-07C6.67392 1.78911e-07 5.40215 0.526784 4.46447 1.46447C3.52678 2.40215 3 3.67392 3 5C2.99999 5.70571 3.1518 6.40316 3.44513 7.04502C3.73845 7.68688 4.16642 8.25813 4.7 8.72C3.30014 9.35388 2.11247 10.3775 1.27898 11.6685C0.445495 12.9596 0.00147185 14.4633 0 16C0 16.2652 0.105357 16.5196 0.292893 16.7071C0.48043 16.8946 0.734784 17 1 17C1.26522 17 1.51957 16.8946 1.70711 16.7071C1.89464 16.5196 2 16.2652 2 16C2 14.4087 2.63214 12.8826 3.75736 11.7574C4.88258 10.6321 6.4087 10 8 10C9.5913 10 11.1174 10.6321 12.2426 11.7574C13.3679 12.8826 14 14.4087 14 16C14 16.2652 14.1054 16.5196 14.2929 16.7071C14.4804 16.8946 14.7348 17 15 17C15.2652 17 15.5196 16.8946 15.7071 16.7071C15.8946 16.5196 16 16.2652 16 16C15.9985 14.4633 15.5545 12.9596 14.721 11.6685C13.8875 10.3775 12.6999 9.35388 11.3 8.72ZM8 8C7.40666 8 6.82664 7.82405 6.33329 7.49441C5.83994 7.16476 5.45542 6.69623 5.22836 6.14805C5.0013 5.59987 4.94189 4.99667 5.05764 4.41473C5.1734 3.83279 5.45912 3.29824 5.87868 2.87868C6.29824 2.45912 6.83279 2.1734 7.41473 2.05764C7.99667 1.94189 8.59987 2.0013 9.14805 2.22836C9.69623 2.45542 10.1648 2.83994 10.4944 3.33329C10.8241 3.82664 11 4.40666 11 5C11 5.79565 10.6839 6.55871 10.1213 7.12132C9.55871 7.68393 8.79565 8 8 8ZM17.74 8.32C18.38 7.59933 18.798 6.70905 18.9438 5.75634C19.0896 4.80362 18.9569 3.82907 18.5618 2.95C18.1666 2.07093 17.5258 1.3248 16.7165 0.801423C15.9071 0.27805 14.9638 -0.0002576 14 1.78911e-07C13.7348 1.78911e-07 13.4804 0.105357 13.2929 0.292893C13.1054 0.48043 13 0.734784 13 1C13 1.26522 13.1054 1.51957 13.2929 1.70711C13.4804 1.89464 13.7348 2 14 2C14.7956 2 15.5587 2.31607 16.1213 2.87868C16.6839 3.44129 17 4.20435 17 5C16.9986 5.52524 16.8593 6.0409 16.5961 6.49542C16.3328 6.94994 15.9549 7.32738 15.5 7.59C15.3517 7.67552 15.2279 7.79766 15.1404 7.94474C15.0528 8.09182 15.0045 8.2589 15 8.43C14.9958 8.59976 15.0349 8.7678 15.1137 8.91826C15.1924 9.06872 15.3081 9.19665 15.45 9.29L15.84 9.55L15.97 9.62C17.1754 10.1917 18.1923 11.096 18.901 12.2263C19.6096 13.3566 19.9805 14.6659 19.97 16C19.97 16.2652 20.0754 16.5196 20.2629 16.7071C20.4504 16.8946 20.7048 17 20.97 17C21.2352 17 21.4896 16.8946 21.6771 16.7071C21.8646 16.5196 21.97 16.2652 21.97 16C21.9782 14.4654 21.5938 12.9543 20.8535 11.6101C20.1131 10.2659 19.0413 9.13331 17.74 8.32Z"
                  fill="#f5f7f9"
                />
              </svg>
              {{ parts.length }}
            </div>
            <div
              v-for="part in event.parts"
              :key="part.id"
              class="people__item"
            >
              <img
                class="people__avatar"
                v-if="part.avatar"
                :src="'http://cz57780.tw1.ru/avatars/' + part.avatar"
                alt=""
              />
              <div class="people__content" v-if="openPeople">
                <div class="people__name">
                  {{ part.name }} {{ part.surname }}
                </div>
                <div
                  class="people__btns"
                  @click="updateParts()"
                  @mouseover="open('over')"
                  v-if="openList === 'All'"
                >
                  <DropDownForAvatarComponentVue
                    :mode="'part'"
                    :role="role"
                    :partId="part.id"
                    :organizerId="event.organizer.id"
                    :userId="userId"
                    :eventId="event.id"
                  />
                </div>
              </div>
            </div>
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
import DropDownForAvatarComponentVue from "./DropDownForAvatarComponent.vue";

export default {
  components: {
    DropDownForAvatarComponentVue,
  },
  data() {
    return {
      encodeText,
      decodeText,
      setCookie,
      getCookie,
      event: {},
      organizer: {},
      parts: [],
      ItsMe: false,
      openPeople: false,
      userId: getCookie("id"),
      role: getCookie("role"),
      rest_part: false,
    };
  },
  props: {
    id: Number,
    openList: String,
  },
  watch: {
    id() {
      this.output();
      this.getRests();
    },
  },
  methods: {
    output() {
      axios
        .get(`http://cz57780.tw1.ru/api/event/${this.id}`)
        .then((response) => {
          this.ItsMe = false;
          this.event = response.data[0];
          this.parts = this.event.parts;
          this.parts.forEach((element) => {
            console.log(element);
            if (element.id == this.userId) this.ItsMe = true;
          });
          this.organizer = this.event.organizer;
          this.event.day = this.event.day.split("-");
          switch (this.event.day[1]) {
            case "01":
              this.event.day = `${this.event.day[2]} янв`;
              break;
            case "02":
              this.event.day = `${this.event.day[2]} фев`;
              break;
            case "03":
              this.event.day = `${this.event.day[2]} мар`;
              break;
            case "04":
              this.event.day = `${this.event.day[2]} апр`;
              break;
            case "05":
              this.event.day = `${this.event.day[2]} мая`;
              break;
            case "06":
              this.event.day = `${this.event.day[2]} июн`;
              break;
            case "07":
              this.event.day = `${this.event.day[2]} июл`;
              break;
            case "08":
              this.event.day = `${this.event.day[2]} авг`;
              break;
            case "09":
              this.event.day = `${this.event.day[2]} сен`;
              break;
            case "10":
              this.event.day = `${this.event.day[2]} окт`;
              break;
            case "11":
              this.event.day = `${this.event.day[2]} ноя`;
              break;
            case "12":
              this.event.day = `${this.event.day[2]} дек`;
              break;
          }
          this.event.start = this.event.start.slice(0, -3);
          this.event.end = this.event.end.slice(0, -3);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    addPart(event_id) {
      axios
        .post("http://cz57780.tw1.ru/api/addParticipant", {
          user_id: this.userId,
          event_id: event_id,
        })
        .then((data) => {
          console.log(data);
          this.output();
          this.ItsMe = true;
        })
        .catch((data) => {
          console.log(data);
        });
    },
    open(move) {
      if (move === "out") this.openPeople = false;
      else this.openPeople = true;
    },
    deletePart(id = this.userId, event_id = this.event.id) {
      // console.log(id,event_id);
      axios
        .post("http://cz57780.tw1.ru/api/deleteParticipant", {
          user_id: id,
          event_id: event_id,
        })
        .then((data) => {
          console.log(data);
          this.output();
        })
        .catch((data) => {
          console.log(data);
        });
    },
    updateParts() {
      setTimeout(() => {
        this.output();
      }, 500);
    },
    confirmedEvent(id) {
      axios
        .post("http://cz57780.tw1.ru/api/confirmedEvent", {
          event_id: id,
        })
        .then(() => {
          // console.log(data);
          this.addNot("Запрос на создание соревнования подтверждено!");
        })
        .catch((data) => {
          console.log(data);
        });
    },
    getRests() {
      axios
        .post("http://cz57780.tw1.ru/api/getRests", {
          id: this.userId,
        })
        .then((res) => {
          console.log(res);
          this.rest_part = res.data.part;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    addNot(text) {
      axios
        .post("http://cz57780.tw1.ru/api/addNot", {
          user_id: this.userId,
          description: text,
        })
        .then((response) => {
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    deleteEvent(id) {
      axios
        .post("http://cz57780.tw1.ru/api/deleteEvent", {
          event_id: id,
        })
        .then(() => {
          // console.log(data);
          this.addNot("Запрос на создание соревнования отклонено!");
        })
        .catch((data) => {
          console.log(data);
        });
    },
  },
};
</script>

<style scoped>
button:disabled {
  cursor: no-drop;
  opacity: 0.6;
}

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
  position: relative;
  min-height: 600px;
  display: flex;
  flex-direction: column;
  background-color: var(--white);
  margin-bottom: 10px;
  border-radius: 15px;
  padding: 20px 110px 30px 40px;
}

.main-content__header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 15px;
}

.main-content__header__avatar {
  position: relative;
  display: flex;
  align-items: center;
}

.main-content__header__avatar-img {
  width: 50px;
  height: 50px;
  border-radius: 100%;
  margin-right: 10px;
}

.main-content__header-win {
  display: flex;
  align-items: center;
  font-weight: 700;
  font-size: 22px;
  line-height: 130%;
  color: var(--blue);
}

.main-content__header-win svg {
  margin-right: 10px;
}

.main-content__header-win span {
  margin-right: 3px;
  font-weight: 700;
  font-size: 34px;
  line-height: 130%;
}

.main-content__header-people {
  display: flex;
  align-items: center;
}

.main-content__header-people svg {
  margin-right: 8px;
}

.event__max-people__count {
  font-weight: 600;
  font-size: 18px;
  line-height: 25px;
  color: var(--blue);
}

.main-content__title {
  font-weight: 700;
  font-size: 18px;
  line-height: 130%;
  color: var(--blue);
  margin-bottom: 12px;
}

.main-content__middle {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
}

.main-content__middle-place {
  display: flex;
  align-items: center;
  font-weight: 600;
  font-size: 18px;
  line-height: 25px;
  color: var(--red);
}

.main-content__middle-place svg {
  margin-right: 10px;
}

.main-content__middle-time {
  display: flex;
  flex-direction: column;
}

.event__time-to {
  display: flex;
  align-items: center;
  margin-bottom: 5px;
  font-weight: 500;
  font-size: 18px;
  line-height: 25px;
  color: var(--red);
}

.event__time-to svg {
  margin-right: 6px;
}

.event__time-to__span {
  margin-right: 3px;
  color: var(--blue);
}

.event__time-from {
  display: flex;
  align-items: center;
  margin-bottom: 5px;
  font-weight: 500;
  font-size: 18px;
  line-height: 25px;
  color: var(--grey);
}

.event__time-from svg {
  margin-right: 6px;
}

.main-content__description {
  font-weight: 400;
  font-size: 18px;
  line-height: 130%;
  color: var(--blue);
  margin-bottom: auto;
}

.main-content__btns {
  display: flex;
  justify-content: space-between;
}

.main-content__btns-add,
.main-content__btns-remove {
  width: 300px;
  font-weight: 700;
  font-size: 14px;
  line-height: 19px;
  border: none;
  border-radius: 15px;
  padding: 13px 0;
  text-align: center;
  cursor: pointer;
}

.main-content__btns-add {
  background-color: var(--blue);
  color: var(--white);
}

.main-content__btns-remove {
  outline: 2px solid var(--blue);
  background-color: var(--white);
  color: var(--blue);
}

.people {
  position: absolute;
  right: 0;
  top: 0;
  width: 70px;
  height: 100%;
  background-color: var(--blue);
  padding: 20px 10px 0;
  border-radius: 15px;
  transition: width 0.05s ease-in-out;
}

.people__avatar {
  width: 50px;
  height: 50px;
  outline: 2px solid var(--white);
  outline-offset: -2px;
  border-radius: 100%;
}

.people__wrapper {
  height: 582px;
  overflow: auto;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.people__count {
  display: flex;
  align-items: center;
  margin-bottom: 22px;
  font-weight: 600;
  font-size: 16px;
  line-height: 22px;
  color: var(--white);
}

.people__count svg {
  margin-right: 5px;
}

.openList {
  width: 240px;
  padding: 15px 25px 0 20px;
}

.openList .people__wrapper {
  align-items: flex-start;
}

.people__item {
  position: relative;
  display: flex;
  align-items: center;
  width: 100%;
  padding-left: 0px;
}

.openList .people__item {
  padding-left: 10px;
}

.people__item:not(:last-child) {
  margin-bottom: 15px;
}

.people__avatar {
  margin-right: 15px;
}

.people__name {
  font-weight: 600;
  font-size: 14px;
  line-height: 19px;
  color: var(--white);
}

.people__btns {
  display: none;
}

.people__item:hover .people__btns {
  display: block;
  cursor: pointer;
}

.avatar__btns {
  display: none;
}

.main-content__header__avatar:hover .avatar__btns {
  display: block;
  cursor: pointer;
}
</style>
