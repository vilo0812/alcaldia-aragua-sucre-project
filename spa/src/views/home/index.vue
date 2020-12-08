<template>
	<div>
		<v-row
		align="center"
		justify="center"
		>
			<v-col
			cols="12"
			sm="8"
			md="4"
			>
				<v-card 
					class="elevation-2"
					color="#D1C4E9"
				>
				<v-toolbar
				color="primary"
				dark
				flat
				dense
				>
				<v-toolbar-title>Home</v-toolbar-title>
				</v-toolbar>
				<v-img
				height="300"
				src="https://cdn.vuetifyjs.com/images/cards/cooking.png"
				></v-img>
				<v-card-text>
					inicio de la plantilla de vuetify
				</v-card-text>
				<v-card-actions>
				<v-spacer />
					<v-btn
					color="primary"
					>
					ok
					</v-btn>
				</v-card-actions>
				</v-card>
			</v-col>
		</v-row>
	</div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {

  name: 'Home',

  data () {
    return {

    }
  },
  computed: {
		...mapGetters({
		token: 'token',
		user: 'user',
		check: 'check',
		role: 'role',
		}),
	},
}
</script>

<style lang="css" scoped>
</style>