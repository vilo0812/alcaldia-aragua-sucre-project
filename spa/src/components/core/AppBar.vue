<template>
  <div>
    <v-app-bar
        color="deep-purple accent-4"
        dense
        dark
      >
        <v-toolbar-title>Alcaldia</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-menu
          left
          bottom
        >
          <template v-slot:activator="{ on, attrs }">
            <v-btn
            text
              v-bind="attrs"
              v-on="on"
            >
              Modulos
            </v-btn>
          </template>
          <v-list>
            <v-list-item
              v-for= "(item,index) in modules"
              :key="index"
              @click="() => {}"
              :to="{ path: item.path }"
            >
              <v-list-item-title>
                {{item.name}}
              </v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
        <v-btn text @click="logout">
          Cerrar Sesión
        </v-btn>
      </v-app-bar>
    </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {

  name: 'AppBar',

  data () {
    return {
      modules : [
      {name : 'alcaldia', path:'mayors'},
      {name : 'departamentos', path:'departaments'},
      {name : 'equipos', path:'padgets'}
      ]
    }
  },
  methods: {
    async logout () {
      this.setOverlay(true)
      try{
        const resp = await this.$store.dispatch('logout')
        console.log(resp)
        this.$router.push({ name: 'auth-login' })
        this.setOverlay(false)
      }catch (error) {
      this.setOverlay(false)
      console.log(error)
      }
    },
    async fetchUser () {
      this.setOverlay(true)
      try{
        await this.$store.dispatch('fetchUser')
        this.setOverlay(false)
      }catch (error) {
      this.setOverlay(false)
      console.log(error)
      }
    },
    ...mapActions({
      setOverlay: 'setOverlay'
    })
  }
}
</script>

<style lang="css" scoped>
</style>