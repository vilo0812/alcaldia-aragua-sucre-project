<template>
	<v-col cols="12" class="imagen">
		<v-row class="d-flex flex-column flex-md-row">
			<v-col  sm="12" md="4">
			       		<v-card height="600" class="grey lighten-4 d-flex justify-center align-center" >
			       			<v-col class="mx-7">
			       				<h1 class="text-center mb-5 font-weight-black">Iniciar Sesión</h1>
			       				<v-form
						            ref="form"
						            v-model="valid"
						            lazy-validation
						          >
								<v-text-field
								class="mb-5 "
								type="email"
								append-icon="mdi-email"
								label="Correo: "
								v-model="form.email"
								:rules="emailRules"
								></v-text-field>
								<v-text-field
								class="mb-5 "
								type="password"
								append-icon="mdi-lock-open"
								required
								label="Contraseña: "
								v-model="form.password"								
								:rules="passwordRules"
								></v-text-field>
								<v-btn block text small color="primary" class="my-5" :to="{ name: 'auth-register'}">registrar
									<v-icon small class="mx-2">mdi-account-plus</v-icon>
								</v-btn>
								<v-btn block color="primary" class="mr-4 block pb-3" @click.stop="login">iniciar sesión</v-btn>
							</v-form>
			       			</v-col>
			       		</v-card>
			</v-col>
			<v-col sm="12" md="6" class="d-flex justify-center align-start " height="700">
       			<img src="./../../assets/img/sucre.jpeg" alt="" width="500"  >
	       	</v-col>
		</v-row>
	</v-col>
</template>
<script>
import { mapGetters } from 'vuex'
import { mapActions } from 'vuex'
export default {
  name: 'Login',
  data () {
    return {
    	valid: true,
    	form: {
	        email: '',
	        password: ''
	      },
	   	emailRules:[
	        v => !!v || 'correo electronico es requerido',
	      ],
	   	passwordRules:[
	        v => !!v || 'contraseña es requerida',
	      ],
    }
  },
  methods: {
  	 validate () {
      this.$refs.form.validate()
    },
    async login () {
      this.validate()
      this.setOverlay(true)
      try {
      await this.$store.dispatch('login', this.form)
      this.$router.push({ name: 'home' })
      this.setOverlay(false)
      } catch (error) {
      	console.log(error)
      this.setOverlay(false)
      	this.$swal({
	        icon: 'error',
	        title: '¡Error!',
	        text: "usuario o contraseña equivocados",
	        confirmButtonColor: '#3085d6',
	      })
      }
    },
    ...mapActions({
      setOverlay: 'setOverlay'
    })
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