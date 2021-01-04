<template>
	<Modal>
        <template slot="header">
          <h4>{{action}} Equipo</h4>
        </template>
  
        <template slot="body">
          <v-form
            ref="form"
            v-model="valid"
            lazy-validation
          >
            <v-text-field
              v-model="gadget"
              :counter="30"
              :rules="gadgetRules"
              label="equipo"
              required
              :value="getGadget"
            ></v-text-field>
            <v-select
              :items="departaments"
              label="Departamento"
              item-text="name"
              item-value="id"
              :rules="departamentsRules"
              :value="getDepartament"
              v-model="departament_id"
            ></v-select>
            <v-select
              :items="statusList"
              label="Estatus"
              item-text="name"
              item-value="id"
              :rules="statusRules"
              :value="getStatus"
              v-model="status"
            ></v-select>
            <v-text-field
              v-model="code"
              :counter="10"
              :rules="codeRules"
              label="Codigo"
              required
              :value="getCode"
            ></v-text-field>
          </v-form>
        </template>
  
        <template slot="footer">
          <v-btn color="error" @click="changeModalState()">Cancelar</v-btn>
          <v-btn  :class="action == 'Actualizar' ? 'warning' : 'primary'" @click="updateOrCreateGadget()">{{ action }}</v-btn>
        </template>
    </Modal>
</template>
<script>
import { mapActions, mapGetters } from 'vuex'
import Modal from '@/components/base/modals'
export default {
  name: 'UpdateOrCreate',
  computed: {
    getGadget() {
      return this.gadget = this.data != null ? this.data.name : ''
    },
    getCode() {
      return this.code = this.data != null ? this.data.code : ''
    },
    getDepartament() {
      return this.departament_id = this.data != null ? this.data.departament_id.id : ''
    },
    getStatus() {
      return this.status = this.data != null ? this.data.status : ''
    },
    ...mapGetters({
        departaments: 'departaments',
        user:'user'
      }),
  },
	components: {
      Modal
    },
  data () {
    return {
      status: 0 ,
      valid: true,
      statusList:[
      {id:0, name:'desincorporado'},
      {id:1, name:'incorporado'}
      ],
      gadget: '',
      gadgetRules: [
        v => !!v || 'equipo es requerido',
        v => (v && v.length <= 30) || 'deben ser menos de 30 caracteres',
      ],
      code: '',
      codeRules: [
        v => !!v || 'codigo es requerido',
        v => (v && v.length <= 10) || 'deben ser menos de 10 caracteres',
      ],
      departament_id:null,
      departamentsRules:[
        v => !!v || 'departamento es requerido',
      ],
      statusRules:[
        v => !!v || 'estatus es requerido',
      ],
    }
  },
  methods: {
    ...mapActions({
      updateOrCreate: 'updateOrCreateGadgets',
      getDepartaments: 'getDepartaments',
      setOverlay: 'setOverlay'
    }),
  	changeModalState() {
      this.gadget = ''
      this.$emit('close')
    },
    validate () {
      this.$refs.form.validate()
    },
    async updateOrCreateGadget() {
      this.validate()
      this.setOverlay(true)
      const { gadget, departament_id, code, status, user } = this
      const id = this.data != null ? this.data.id : ''
      try {
        const resp = await this.updateOrCreate({ gadget, code, departament_id, status, user, id })
        this.$swal({
            icon: 'success',
            title: '¡Exito!',
            confirmButtonColor: '#3085d6',
          })
        this.changeModalState()
        this.setOverlay(false)
      } catch (error) {
          console.log(error)
          this.$swal({
            icon: 'error',
            title: '¡Error con los registros!',
            confirmButtonColor: '#3085d6',
          })
          this.changeModalState()
          this.setOverlay(false)
      }
    },
  },
  props: {
    action: '',
    data: null
  },
  async created() {
      this.setOverlay(true)
      try {
      await this.getDepartaments()
      this.setOverlay(false)
      } catch (error) {
        console.log(error)
        this.$swal({
          icon: 'error',
          title: '¡Error al buscar registros!',
          confirmButtonColor: '#3085d6',
        })
        this.setOverlay(false)
      }
    },
}
</script>

<style lang="css" scoped>
</style>