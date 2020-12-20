<template>
	<Modal>
        <template slot="header">
          <h4>{{action}} Alcaldia</h4>
        </template>
  
        <template slot="body">
          <v-form
            ref="form"
            v-model="valid"
            lazy-validation
          >
            <v-text-field
              v-model="mayor"
              :counter="30"
              :rules="mayorRules"
              label="Alcaldia"
              required
              :value="getMayor"
            ></v-text-field>
          </v-form>
        </template>
  
        <template slot="footer">
          <v-btn color="error" @click="changeModalState()">Cancelar</v-btn>
          <v-btn  :class="action == 'Actualizar' ? 'warning' : 'primary'" @click="updateOrCreateMayor()">{{ action }}</v-btn>
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
    getMayor() {
      return this.mayor = this.data != null ? this.data.name : ''
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
      mayor: '',
      mayorRules: [
        v => !!v || 'Alcaldia es requerida',
        v => (v && v.length <= 30) || 'deben ser menos de 10 caracteres',
      ],
    }
  },
  methods: {
    ...mapActions({
      updateOrCreate: 'updateOrCreateMayors',
      setOverlay: 'setOverlay'
    }),
  	changeModalState() {
      this.mayor = ''
      this.$event('close')
    },
    validate () {
      this.$refs.form.validate()
    },
    async updateOrCreateMayor() {
      this.setOverlay(true)
      this.validate()
      const { mayor } = this
      const id = this.data != null ? this.data.id : ''
      try {
        const resp = await this.updateOrCreate({ mayor, id })
        this.$swal({
            icon: 'success',
            title: '¡Exito!',
            confirmButtonColor: '#3085d6',
          })
        this.mayor = ''
        this.$event('close')
        this.setOverlay(false)
      } catch (error) {
          console.log(error)
          this.$swal({
            icon: 'error',
            title: '¡Error con los registros!',
            confirmButtonColor: '#3085d6',
          })
          this.$event('close')
          this.setOverlay(false)
      }
    },
  },
  props: {
    action: '',
    data: null
  },
}
</script>

<style lang="css" scoped>
</style>