<template>
  <div @click="openTooltip()" class="tooltip">
    <svg
      class="tooltip__svg"
      width="33"
      height="33"
      viewBox="0 0 33 33"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <circle
        cx="16.5"
        cy="16.5"
        r="15.5"
        fill="#F5F7F9"
        stroke="#192A39"
        stroke-width="2"
      />
      <path
        d="M16.5 21C16.2033 21 15.9133 21.088 15.6666 21.2528C15.42 21.4176 15.2277 21.6519 15.1142 21.926C15.0006 22.2001 14.9709 22.5017 15.0288 22.7926C15.0867 23.0836 15.2296 23.3509 15.4393 23.5607C15.6491 23.7704 15.9164 23.9133 16.2074 23.9712C16.4983 24.0291 16.7999 23.9993 17.074 23.8858C17.3481 23.7723 17.5824 23.58 17.7472 23.3334C17.912 23.0867 18 22.7967 18 22.5C18 22.1022 17.842 21.7206 17.5607 21.4393C17.2794 21.158 16.8978 21 16.5 21ZM16.5 9C16.1022 9 15.7206 9.15804 15.4393 9.43934C15.158 9.72064 15 10.1022 15 10.5V18C15 18.3978 15.158 18.7794 15.4393 19.0607C15.7206 19.342 16.1022 19.5 16.5 19.5C16.8978 19.5 17.2794 19.342 17.5607 19.0607C17.842 18.7794 18 18.3978 18 18V10.5C18 10.1022 17.842 9.72064 17.5607 9.43934C17.2794 9.15804 16.8978 9 16.5 9Z"
        fill="#F23535"
      />
    </svg>
    <div class="tooltip__content" :class="{'active': tooltipIsOpen}">
      <div class="tooltip__driver">
        <div class="tooltip__driver-icon">
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
        Водитель
      </div>
      <div class="tooltip__passenger">
        <img
          class="tooltip__passenger-icon"
          src="@/assets/47.png"
          alt="avatar"
        />
        Пассажир
      </div>
      <div class="tooltip__empty-seat">
        <div class="tooltip__empty-seat__icon">
          <svg
            width="28"
            height="28"
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
        <span class="tooltip__empty-seat__text">Свободное место</span>
      </div>
      <div class="tooltip__have-no-place">
        <div class="tooltip__have-no-place__icon">
          <svg
            width="16"
            height="21"
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
        Нет места
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tooltipIsOpen: false,
    }
  },
  methods: {
    openTooltip() {
      this.tooltipIsOpen === false ? this.tooltipIsOpen = true : this.tooltipIsOpen = false;
    },
  },
};
</script>

<style scoped>
.tooltip {
  width: fit-content;
  position: relative;
  z-index: 2;
}

.tooltip__svg {
  position: relative;
  z-index: 3;
}

.tooltip__svg:hover circle {
  stroke: var(--red);
}

.tooltip__svg:hover {
  cursor: pointer;
}

.tooltip__content {
  position: absolute;
  top: 10px;
  left: 10px;
  z-index: 0;
  display: none;
  flex-direction: column;
  background-color: var(--blue);
  padding: 10px 27px;
  border-radius: 15px;
}

.active {
  display: flex;
}

.tooltip__driver,
.tooltip__passenger,
.tooltip__empty-seat,
.tooltip__have-no-place {
  display: flex;
  align-items: center;

  font-weight: 400;
  font-size: 18px;
  line-height: 130%;
  color: var(--white);
}

.tooltip__driver,
.tooltip__passenger,
.tooltip__empty-seat {
  margin-bottom: 5px;
}

.tooltip__driver-icon {
  position: relative;
  width: 38px;
  height: 38px;
  margin-right: 10px;
  border-radius: 10px;
  background-color: var(--grey);
}

.tooltip__driver-icon svg {
  position: absolute;
  top: calc(50% - 14px);
  left: calc(50% - 14px);
}

.tooltip__passenger-icon {
  width: 38px;
  height: 38px;
  margin-right: 10px;
}

.tooltip__empty-seat__text {
  width: max-content;
}

.tooltip__empty-seat__icon {
  flex-shrink: 0;
  position: relative;
  width: 38px;
  height: 38px;
  margin-right: 10px;
  border-radius: 10px;
  background-color: var(--white);
}

.tooltip__empty-seat__icon svg {
  position: absolute;
  top: calc(50% - 14px);
  left: calc(50% - 14px);
}

.tooltip__have-no-place__icon {
  position: relative;
  width: 38px;
  height: 38px;
  margin-right: 10px;
  outline: 2px solid var(--grey);
  outline-offset: -2px;
  border-radius: 10px;
  background-color: var(--blue);
}

.tooltip__have-no-place__icon svg {
  position: absolute;
  top: calc(50% - 10.5px);
  left: calc(50% - 8px);
}
</style>
