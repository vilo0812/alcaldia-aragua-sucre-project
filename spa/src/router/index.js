import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes'
import middleware from '@/middleware'

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
  //whereever it's the token of the app
  // const token = Cookies.get('token')
  // if (token) {
  //   store.commit('SET_TOKEN', { token: token })
  // }
}

const router = createRouter()
searchToken()
router.beforeEach(middleware)

export default router