<template>
    <v-simple-table>
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left w-50">
              Name
            </th>
            <th class="text-left w-50">
              Alcaldia
            </th>
            <th class="text-right">
              Editar
            </th>
            <th class="text-right">
              Eliminar
            </th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="item in departaments"
            :key="item.id"
          >
            <td>{{ item.name }}</td>
            <td>{{ item.mayor_id.name }}</td>
            <td class="text-right"> 
                <v-btn
                  depressed
                  color="warning"
                  @click="editing(item)"
                >
                  Editar
                </v-btn>
            </td>
            <td class="text-right"> 
                <v-btn
                  depressed
                  color="error"
                  @click="deleting(item)"
                >
                  Eliminar
                </v-btn>
            </td>
          </tr>
        </tbody>
      </template>
  </v-simple-table>
</template>

<script>
  import axios from 'axios'
  import { mapGetters,mapActions } from 'vuex'
  export default {
    name: 'Simpletable',
    data: () => ({
    }),
    computed: {
      ...mapGetters({
        departaments: 'departaments',
      }),
    },
    methods:{
      ...mapActions({
        getDepartaments: 'getDepartaments',
        setOverlay: 'setOverlay'
      }),
      editing: function(departament) {
        this.$emit("editing",departament);
      },
      deleting: function(departament) {
        this.$emit("deleting",departament);
      },
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
    }
  }
</script>

<style>

</style>