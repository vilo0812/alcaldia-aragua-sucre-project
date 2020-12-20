<template>
  <v-row justify="center">
      <v-dialog
        v-model="modalDeleteState"
        persistent
        max-width="600px"
      >
        <v-card>
          <v-card-title class="headline">
              <h4>Eliminar {{ moduleName }}</h4>
              <v-spacer></v-spacer>
              <v-btn
                @click="changeModalState(false)"
                color="error"
                fab
                dark
                small
              >
                <v-icon>mdi-close</v-icon>
              </v-btn>
          </v-card-title>
          <v-card-text>
             <v-container>
              <h4>¿ Está seguro que desea eliminar el elemento ?</h4>
            </v-container>
          </v-card-text>
          <v-card-actions>
              <v-btn color="primary" @click="changeModalState(false)">Cancelar</v-btn>
              <v-btn class="error" @click="deleteModule">Eliminar</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
  </v-row>
</template>

<script>
import { mapGetters } from 'vuex'
import Modal from '@/components/base/modals'
export default {
  computed: {
    ...mapGetters({
      modalDeleteState: 'modalDeleteState'
    }),
  },
  name: 'DeleteModal',
   props: {
    data: {
      required: true
    },
    moduleName: {
      type: String,
      required: true
    },
    actionDeleteName: {
      type: String,
      required: true
    }
   },
   components: {
      Modal,
    },
  data () {
    return {

    }
  },
  methods: {
    changeModalState(state) {
      this.$store.commit('CHANGE_MODAL_DELETE_STATE', state)
    },
    async deleteModule() {
      const { actionDeleteName } = this
      const id = this.data != null ? this.data.id : ''
      try {
        const resp = await this.$store.dispatch(actionDeleteName, id)
        this.$swal({
            icon: 'success',
            title: '¡Exito!',
            title: resp.message,
            confirmButtonColor: '#3085d6',
          })
        this.changeModalState(false)
      } catch (error) {
        this.$swal({
            icon: 'error',
            title: 'Ha ocurrido un error , intentanlo nuevamente',
            confirmButtonColor: '#3085d6',
          })
        this.changeModalState(false)
      }
    }
  }
}
</script>

<style lang="css" scoped>
</style>