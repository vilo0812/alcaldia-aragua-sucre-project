<template>
	<v-col cols="12" class="imagen">
		<v-row class="d-flex flex-column flex-md-row">
			<v-col  sm="12" md="4">
			       		<v-card height="600" class="grey lighten-4 d-flex justify-center align-center" >
			       			<v-col class="mx-7">
			       				<h1 class="text-center mb-5 font-weight-black">Register</h1>
		       				<v-form
					            ref="form"
					            v-model="valid"
					            lazy-validation
					          >
								<v-text-field
								class="mb-5 "
								type="Nombre Completo"
								append-icon="mdi-account"
								label="Nombre: "
								v-model="form.name"
								:rules="nameRules"
								></v-text-field>
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
								<v-text-field
								class="mb-5 "
								type="password"
								append-icon="mdi-lock-open"
								required
								label="Repetir Contraseña: "
								v-model="form.password_confirmation"						
								:rules="rep_passwordRules"
								></v-text-field>
								<v-btn block text small color="primary" class="my-5" :to="{ name: 'auth-login'}">Iniciar Sesión
									<v-icon small class="mx-2">mdi-login</v-icon>
								</v-btn>
								<v-btn block color="primary" class="mr-4 block pb-3" @click.stop="register">Registrar</v-btn>
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
  name: 'Register',
  data () {
    return {
    	valid: true,
    	form: {
    		name:'',
	        email: '',
	        password: '',
	        password_confirmation: '',
	      },
	   	nameRules:[
	        v => !!v || 'nombre es requerido',
	      ],
	   	emailRules:[
	        v => !!v || 'correo electronico es requerido',
	      ],
	   	passwordRules:[
	        v => !!v || 'contraseña es requerida',
	        v => v === this.form.rep_password || 'contraseñas no coinciden'
	      ],
	   	rep_passwordRules:[
	        v => !!v || 'repetir contraseña es requerida',
	        v => v === this.form.password || 'contraseñas no coinciden'
	      ],
    }
  },
  methods: {
  	 validate () {
      this.$refs.form.validate()
    },
    async register () {
      this.validate()
      this.setOverlay(true)
      try {
      await this.$store.dispatch('register', this.form)
      this.$swal({
        icon: 'success',
        title: '¡exito!',
        text: "usuario registrado exitosamente",
        confirmButtonColor: '#3085d6',
      })
      this.$router.push({ name: 'auth-login' })
      this.setOverlay(false)
      } catch (error) {
      console.log(error.response.data.errors)
      this.setOverlay(false)
      	this.$swal({
	        icon: 'error',
	        title: '¡Error!',
	        text: "Error al registrar",
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