function page (path) {
    return () =>
    import(`@/views/${path}`).then(
        m => m.default || m,
        )
}
function comp (path) {
    return () =>
    import(`@/components/${path}`).then(
        m => m.default || m,
        )
}

export default [
{
    path: '/',
    name: 'home',
    components: { default: page('home'), header: comp('core/AppBar.vue')},
    meta:{
      auth: true
    }
},
{
    path: '/login',
    name: 'auth-login',
    component: page('auth'),
},
{
    path: '/register',
    name: 'auth-register',
    component: page('auth/Register.vue'),
},
/* Errors */
{
    path: '*',
    name: 'error-404',
    props: false,
    component: page('errors/404.vue'),
},
]

