<template>
    <v-simple-table>
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left w-50">
              Name
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
            v-for="item in mayors"
            :key="item.id"
          >
            <td>{{ item.name }}</td>
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
  import { mapGetters,mapActions } from 'vuex'
  export default {
    name: 'Simpletable',
    data: () => ({
    }),
    computed: {
      ...mapGetters({
        mayors: 'mayors',
      }),
    },
    methods:{
      ...mapActions({
        getMayors: 'getMayors',
        setOverlay: 'setOverlay'
      }),
      editing: function(mayor) {
        this.$emit("editing",mayor);
      },
      deleting: function(mayor) {
        this.$emit("deleting",mayor);
      },
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
    }
  }
</script>

<style>

</style>