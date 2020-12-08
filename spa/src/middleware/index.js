import auth from './auth.js'

export default async (to, from, next) => {
  auth(to, from, next)
}