<template>
    <v-simple-table >
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left w-50">
              Name
            </th>
            <th class="text-left w-50">
              Codigo
            </th>
            <th class="text-left w-50">
              Departamento
            </th>
            <th class="text-left w-50">
              estatus
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
            v-for="item in gadgets"
            :key="item.id"
          >
            <td>{{ item.name }}</td>
            <td>{{ item.code }}</td>
            <td>{{ item.departament_id.name }}</td>
            <td>{{ item.status}}</td>
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
        gadgets: 'gadgets',
      }),
    },
    methods:{
      ...mapActions({
        getGadgets: 'getGadgets',
        setOverlay: 'setOverlay'
      }),
      editing: function(gadget) {
        this.$emit("editing",gadget);
      },
      deleting: function(gadget) {
        this.$emit("deleting",gadget);
      },
    },
    async created() {

      this.setOverlay(true)
      try {
      await this.getGadgets()
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
.ancho{
  width: 100%;
  background-color: black;
}
</style>