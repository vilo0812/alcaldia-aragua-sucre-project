<template>
	<v-col cols="12" class="imagen">
		<v-row class="d-flex flex-column flex-md-row">
			<v-col  sm="12" md="4">
			       		<v-card height="560" class="grey lighten-4 d-flex justify-center align-center" >
			       			<v-col class="mx-7">
			       				<h1 class="text-center mb-5 font-weight-black">Registrate</h1>
								<v-text-field
								class="mb-5 "
								type="email"
								append-icon="mdi-account"
								label="Correo: "
								v-model="form.email"
								></v-text-field>
								<v-text-field
								class="mb-5 "
								type="password"
								append-icon="mdi-lock-open"
								required
								label="Contraseña: "
								v-model="form.password"
								></v-text-field>
								<v-btn block text small color="primary" class="my-5" :to="{ name: 'auth-login'}">iniciar sesión
									<v-icon small class="mx-2">mdi-key-change</v-icon>
								</v-btn>
								<v-btn block color="primary" class="mr-4 block pb-3" @click.stop="register">registrar</v-btn>
			       			</v-col>
			       		</v-card>
			</v-col>
		</v-row>
	</v-col>
</template>

<script>
export default {

  name: 'Register',

  data () {
    return {
    	form: {
	        email: '',
	        password: ''
	      }
    }
  },
  methods: {
    register () {
      alert("epale")
    }
  }
}
</script>

<style>
	.imagen{
		background: url(./../../assets/img/sucre.jpeg);
		background-position: center;
		background-size:cover;
	}
</style>