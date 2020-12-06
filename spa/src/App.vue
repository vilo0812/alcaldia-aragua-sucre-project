<template>
  <v-app>
    <router-view name="header" />
      <div>
        <v-overlay :value="overlay">
          <v-progress-circular
            indeterminate
            size="64"
          />
        </v-overlay>
        <router-view />
      </div>
    <router-view name="footer" />
  </v-app>
</template>

<script>
  import { mapGetters } from 'vuex'
  export default {
    name: 'App',
    data () {
      return{
      }
    },
      computed: {
      ...mapGetters({
        overlay: 'overlay',
      }),
    },
  }
</script>