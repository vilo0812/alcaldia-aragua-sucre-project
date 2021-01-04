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
            Equipos
            <v-spacer />
            <v-btn  
              color="primary" 
              large
              @click="changeModalState(true, 'Crear')"
            >
              Agregar Equipo
            </v-btn>
            <v-btn  
              color="success" 
              large
              @click="viewPFD"
            >
              Registros PDF
            </v-btn>
          </v-card-title>
          <Simpletable  @editing="editing" @deleting="deleting"/>
        </v-card>
      </v-col>
    </v-row>
    <!--   Modal Update Or Create Alcaldia -->
    <UpdateOrCreate :action="action" :data="gadget" @close="close"/>
    <!--   Modal Delete Alcaldia -->
    <DeleteModal :data="gadget" module-name="Equipo" action-delete-name="deleteGadget"/>
  </div>
</template>

<script>
  import Simpletable from '@/components/gadgets/Simpletable.vue'
  import UpdateOrCreate from '@/components/gadgets/UpdateOrCreate.vue'
  import DeleteModal from '@/components/base/modals/DeleteModal.vue'
  export default {
    name: 'Gadgets',
    data () {
      return {
        action : '',
        gadget: null
      }
    },
    components: {
      Simpletable,
      UpdateOrCreate,
      DeleteModal
    },
    methods: {
      changeModalState(state, action = null) {
        this.gadget = null
        this.action = action
        this.$store.commit('CHANGE_MODAL_STATE', state)
      },
      editing(gadget){
        this.changeModalState(true, 'Editar')
        this.gadget = gadget
      },
      deleting(gadget){
        this.gadget = gadget
        this.$store.commit('CHANGE_MODAL_DELETE_STATE', true)
      },
      close(){
        this.gadget = null
        this.action = null
        this.$store.commit('CHANGE_MODAL_STATE', false)
      },
      viewPFD(){
        let location
        if (process.env.NODE_ENV === 'production' && process.env.VUE_APP_API_URL) {
          location = `${process.env.VUE_APP_API_URL}/gadgetPDF`
        } else {
          location = `${process.env.VUE_APP_BASE_URL}/gadgetPDF`
        }
        window.location = location
      }
    }
  }
</script>

<style>

</style>