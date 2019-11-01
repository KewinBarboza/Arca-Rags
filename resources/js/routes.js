import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    // mode:'history',
    
    routes:
    [
        {
            path:'/',
            name:'Home',
            component: require('./views/Home').default
        },
        {
            path:'/Productos',
            name:'Productos',
            component: require('./views/Productos').default
        },
        {
            path:'/Producto/:url',
            name:'Producto',
            component: require('./views/Producto').default
        },
        {
            path:'/Contactanos',
            name:'Contactanos',
            component: require('./views/Contactanos').default
        },
        {
            path:'/RegistrarProductoComponent',
            name:'RegistrarProducto',
            component: require('./components/RegistrarProductoComponent').default
        },
        {
            path:'/Categoria',
            name:'Categoria',
            component: require('./components/Categoria').default
        },
        {
            path:'*',
            component: require('./views/404').default
        }
    ]

    
})