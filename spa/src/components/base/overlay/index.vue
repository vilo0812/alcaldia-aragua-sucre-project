<template>
	<div>
		<v-overlay :value="overlay">
      <v-progress-circular
        indeterminate
        size="64"
      />
    </v-overlay>
	</div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {

  name: 'Overlay',

  data () {
    return {
    }
  },
    computed: {
      ...mapGetters({
        overlay: 'overlay',
      }),
    },
}
</script>

<style lang="css" scoped>
</style>