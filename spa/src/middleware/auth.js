import store from '@/store'

export default async (to, from, next) => {
  const auth = to.matched.some(record => record.meta.auth);//devuelve true si la ruta tiene activado el meta requiresAuth
  if (!store.getters['check'] && auth) {
   return next('/login')
  }
  return next()
}
