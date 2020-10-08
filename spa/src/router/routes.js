function page (path) {
    return () =>
    import(/* webpackChunkName: '' */ `@/views/${path}`).then(
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
    component: page('Home.vue'),
},

/* Errors */
{
    path: '*',
    name: 'error-404',
    props: false,
    component: page('errors/404.vue'),
},
]

