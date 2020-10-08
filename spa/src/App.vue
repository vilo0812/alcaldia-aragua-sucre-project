<template>
  <v-app>

    <core-app-bar />

    <core-drawer />

    <core-view />
    
    <core-footer />
  </v-app>
</template>

<script>
  export default {
    name: 'App',

    components: {
      CoreAppBar: () => import('@/components/core/AppBar'),
      CoreDrawer: () => import('@/components/core/Drawer'),
      CoreView: () => import('@/components/core/View'),
      CoreFooter: () => import('@/components/core/Footer'),
    },
  }
</script>