<template>
  <v-app>
    <overlay/>
    <router-view name="header" />
      <router-view />
    <router-view name="footer" />
  </v-app>
</template>

<script>
import overlay from '@/components/base/overlay'
  export default {
    name: 'App',
    data () {
      return{
      }
    },
    components: {
      overlay,
    },
  }
</script>