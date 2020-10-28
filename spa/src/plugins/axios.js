import axios from 'axios'

if (process.env.NODE_ENV === 'production' && process.env.VUE_APP_API_URL) {
  axios.defaults.baseURL = `${process.env.VUE_APP_API_URL}`
} else {
  axios.defaults.baseURL = `${process.env.VUE_APP_BASE_URL}`
}