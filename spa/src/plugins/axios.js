import axios from 'axios'
import store from '@/store'
if (process.env.NODE_ENV === 'production' && process.env.VUE_APP_API_URL) {
  axios.defaults.baseURL = `${process.env.VUE_APP_API_URL}`
} else {
  axios.defaults.baseURL = `${process.env.VUE_APP_BASE_URL}`
}
// Config Before Request
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