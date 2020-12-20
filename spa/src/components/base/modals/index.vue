<template>
  <v-row justify="center">
      <v-dialog
        v-model="modalState"
        persistent
        max-width="600px"
      >
        <v-card>
          <v-card-title class="headline">
              <slot name="header"></slot>
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
              <slot name="body"></slot>
            </v-container>
          </v-card-text>
          <v-card-actions>
              <slot name="footer"></slot>
          </v-card-actions>
        </v-card>
      </v-dialog>
  </v-row>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  name: "Modal",
  computed: {
      ...mapGetters({
        modalState: 'modalState'
      }),
    },
  methods: {
    changeModalState(state) {
      this.$store.commit('CHANGE_MODAL_STATE', state)
    },
  }
};
</script>

<style lang="scss">
/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>
