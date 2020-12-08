import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes'
import middleware from '@/middleware'
import store from '@/store'

Vue.use(VueRouter)

function createRouter () {
  const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes,
  })
  return router;
}
function searchToken () {
  //search from localstorage or cookie or
  var auth = JSON.parse(localStorage.getItem('auth'))
  if (auth) {
    store.commit('SET_USER',auth.user)
    store.commit('SET_TOKEN',auth.token)
  }
}

searchToken()
const router = createRouter()
router.beforeEach(middleware)
export default router