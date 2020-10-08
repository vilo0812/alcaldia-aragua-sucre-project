<template>
  <v-main id="content">
    <router-view />
    <!-- <v-overlay :value="overlay">
      <v-progress-circular
        indeterminate
        size="64"
      />
    </v-overlay> -->
  </v-main>
</template>

<script>
  // import { mapGetters } from 'vuex'
  export default {
    name: 'CoreView',
    computed: {
      // ...mapGetters({
      //   overlay: 'config/overlay',
      // }),
    },
  }
</script>
