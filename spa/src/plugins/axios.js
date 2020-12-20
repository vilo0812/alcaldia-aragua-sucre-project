import axios from 'axios'
import store from '@/store'
import route from '@/router'
if (process.env.NODE_ENV === 'production' && process.env.VUE_APP_API_URL) {
  axios.defaults.baseURL = `${process.env.VUE_APP_API_URL}`
} else {
  axios.defaults.baseURL = `${process.env.VUE_APP_BASE_URL}`
}
// Config Token
axios.interceptors.request.use((request) => {
  const token = store.getters['token']
  if (token) {
    request.headers.common.Authorization = `Bearer ${token}`
  }
  return request
}, error => {
  return Promise.reject(error)
})
// Config Response interceptor
axios.interceptors.response.use(response => response, error => {
  if (error.response) {
    const { status } = error.response
    if (status === 401) {
      if (store.getters['check']) {
        store.commit('logout')
        localStorage.removeItem("auth");
        route.push({ name: 'auth-login' })
      }
    }
    if (status === 404) {
      route.push({ name: 'error-404' })
    }
    if (status >= 500) {}
  } else {
    this.$swal({
          icon: 'error',
          title: '¡Error del servidor!',
          text: 'no hemos podido establecer conexión con el servidor',
          confirmButtonColor: '#3085d6',
        })
  }
  return Promise.reject(error)
})

axios.interceptors.request.use((request) => {
  const token = store.getters['token']
  if (token) {
    request.headers.common.Authorization = `Bearer ${token}`
  }
  return request
}, error => {
	if(error.response.status == 401){
		store.commit('SET_USER',null)
    store.commit('SET_TOKEN',null)
		router.push('/login');
	}
  	return Promise.reject(error)
})