function page (path) {
    return () =>
    import(/* webpackChunkName: '' */ `@/views/${path}`).then(
        m => m.default || m,
        )
}
function comp (path) {
    return () =>
    import(/* webpackChunkName: '' */ `@/components/${path}`).then(
        m => m.default || m,
        )
}

export default [
{
    path: '/',
    name: 'auth-login',
    component: page('auth/Login.vue'),
},
{
    path: '/register',
    name: 'auth-register',
    component: page('auth/Register.vue'),
},
{
    path: '/home',
    name: 'home',
    components: { default: page('Home.vue'), header: comp('core/AppBar.vue')},
},

/* Errors */
{
    path: '*',
    name: 'error-404',
    props: false,
    component: page('errors/404.vue'),
},
]

