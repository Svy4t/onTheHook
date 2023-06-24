<template>
  <router-view />
</template>

<script>
</script>

<style>
:root {
  --red:    #E51717;
  --blue:   #192A39;
  --white:  #F5F7F9;
  --grey:   #899DA5;
  --grey40:   rgba(137, 157, 165, 0.4);
  --blue60:   rgba(25, 42, 57, 0.6);
  --blue75:   rgba(25, 42, 57, 0.75);
}

*,
*::after,
*::before {
  font-family: 'NotoSans';
  box-sizing: inherit;
}

picture {
  display: inline-block;
}

/* *:focus-visible {
  outline: none;
} */

html {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  overflow: hidden;
}

a {
  color: inherit;
  text-decoration: none;
}

img {
  max-width: 100%;
}

body {
  margin: 0;
  padding: 0;
  background-color: #ffffff;
}

/* glob */
.list-reset {
  margin: 0;
  padding: 0;
  list-style: none;
}

.btn-reset {
  padding: 0;
  border: none;
  background-color: transparent;
  cursor: pointer;
}
</style>
