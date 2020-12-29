<template>
  <div>
    <v-row
    align="center"
    justify="center"
    >
      <v-col
      cols="12"
      sm="9"
      >
        <v-card 
          class="elevation-2"
          color="deep-purple accent-4"
        >
          <v-card-title>
            Alcaldias
            <v-spacer />
            <v-btn  
              color="primary" 
              large
              @click="changeModalState(true, 'Crear')"
            >
              Agregar Alcaldia
            </v-btn>
          </v-card-title>
          <Simpletable  @editing="editing" @deleting="deleting"/>
        </v-card>
      </v-col>
    </v-row>
    <!--   Modal Update Or Create Alcaldia -->
    <UpdateOrCreate :action="action" :data="mayor" @close="close"/>
    <!--   Modal Delete Alcaldia -->
    <DeleteModal :data="mayor" module-name="Alcaldia" action-delete-name="deleteMayor"/>
  </div>
</template>

<script>
  import Simpletable from '@/components/mayors/Simpletable.vue'
  import UpdateOrCreate from '@/components/mayors/UpdateOrCreate.vue'
  import DeleteModal from '@/components/base/modals/DeleteModal.vue'
  export default {
    name: 'Mayors',
    data () {
      return {
        action : '',
        mayor: null
      }
    },
    components: {
      Simpletable,
      UpdateOrCreate,
      DeleteModal
    },
    methods: {
      changeModalState(state, action = null) {
        this.mayor = null
        this.action = action
        this.$store.commit('CHANGE_MODAL_STATE', state)
      },
      editing(mayor){
        this.changeModalState(true, 'Editar')
        this.mayor = mayor
      },
      deleting(mayor){
        this.mayor = mayor
        this.$store.commit('CHANGE_MODAL_DELETE_STATE', true)
      },
      close(){
        this.mayor = null
        this.action = null
        this.$store.commit('CHANGE_MODAL_STATE', false)
      },
    }
  }
</script>

<style>

</style>