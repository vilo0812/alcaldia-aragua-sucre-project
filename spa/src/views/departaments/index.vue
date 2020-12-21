<template>
  <div>
    <v-row
    align="center"
    justify="center"
    >
      <v-col
      cols="12"
      sm="9"
      md="5"
      >
        <v-card 
          class="elevation-2"
          color="deep-purple accent-4"
        >
          <v-card-title>
            Departamentos
            <v-spacer />
            <v-btn  
              color="primary" 
              large
              @click="changeModalState(true, 'Crear')"
            >
              Agregar Departamento
            </v-btn>
          </v-card-title>
          <Simpletable  @editing="editing" @deleting="deleting"/>
        </v-card>
      </v-col>
    </v-row>
    <!--   Modal Update Or Create Alcaldia -->
    <UpdateOrCreate :action="action" :data="departament" @close="close"/>
    <!--   Modal Delete Alcaldia -->
    <DeleteModal :data="departament" module-name="Departamento" action-delete-name="deleteDepartament"/>
  </div>
</template>

<script>
  import Simpletable from '@/components/departaments/Simpletable.vue'
  import UpdateOrCreate from '@/components/departaments/UpdateOrCreate.vue'
  import DeleteModal from '@/components/base/modals/DeleteModal.vue'
  export default {
    name: 'Departaments',
    data () {
      return {
        action : '',
        departament: null
      }
    },
    components: {
      Simpletable,
      UpdateOrCreate,
      DeleteModal
    },
    methods: {
      changeModalState(state, action = null) {
        this.departament = null
        this.action = action
        this.$store.commit('CHANGE_MODAL_STATE', state)
      },
      editing(departament){
        this.changeModalState(true, 'Editar')
        this.departament = departament
      },
      deleting(departament){
        this.departament = departament
        this.$store.commit('CHANGE_MODAL_DELETE_STATE', true)
      },
      close(){
        this.departament = null
        this.action = null
        this.$store.commit('CHANGE_MODAL_STATE', false)
      },
    }
  }
</script>

<style>

</style>