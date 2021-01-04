<template>
	<Modal>
        <template slot="header">
          <h4>{{action}} Departamento</h4>
        </template>
  
        <template slot="body">
          <v-form
            ref="form"
            v-model="valid"
            lazy-validation
          >
            <v-text-field
              v-model="departament"
              :counter="30"
              :rules="departamentRules"
              label="Departamento"
              required
              :value="getDepartament"
            ></v-text-field>
            <v-select
              :items="mayors"
              label="Alcaldia"
              item-text="name"
              item-value="id"
              :rules="mayorRules"
              :value="getMayor"
              v-model="mayor_id"
            ></v-select>
          </v-form>
        </template>
  
        <template slot="footer">
          <v-btn color="error" @click="changeModalState()">Cancelar</v-btn>
          <v-btn  :class="action == 'Actualizar' ? 'warning' : 'primary'" @click="updateOrCreateDepartament()">{{ action }}</v-btn>
        </template>
    </Modal>
</template>
<script>
import { mapActions, mapGetters } from 'vuex'
import Modal from '@/components/base/modals'
export default {
  name: 'UpdateOrCreate',
  created() {

  },
  computed: {
    getDepartament() {
      return this.departament = this.data != null ? this.data.name : ''
    },
    getMayor() {
      return this.mayor_id = this.data != null ? this.data.mayor_id.id  : ''
    },
    ...mapGetters({
      mayors: 'mayors',
    }),

  },
	components: {
      Modal
    },
  data () {
    return {
      valid: true,
      mayor_id:null,
      departament: '',
      departamentRules: [
        v => !!v || 'Departament es requerida',
        v => (v && v.length <= 30) || 'deben ser menos de 30 caracteres',
      ],
      mayorRules: [
        v => !!v || 'Alcaldia es requerida',
      ],
    }
  },
  methods: {
    ...mapActions({
      updateOrCreate: 'updateOrCreateDepartaments',
      getMayors: 'getMayors',
      setOverlay: 'setOverlay'
    }),
  	changeModalState() {
      this.departament = ''
      this.$emit('close')
    },
    validate () {
      this.$refs.form.validate()
    },
    async updateOrCreateDepartament() {
      this.validate()
      this.setOverlay(true)
      const { departament,mayor_id } = this
      const id = this.data != null ? this.data.id : ''
      try {
        const resp = await this.updateOrCreate({ departament, mayor_id,  id })
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
      await this.getMayors()
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