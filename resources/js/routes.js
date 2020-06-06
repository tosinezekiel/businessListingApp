import Vue from 'vue';
import VueRouter from 'vue-router'

Vue.use(VueRouter) 
import store from './store'

import Home from './views/Home'
import Business from './views/Business'
import Login from './views/Login'
import Dashboard from './views/auth/Dashboard'
import Create from './views/auth/Create'
import Categories from './views/auth/Categories'
import Listing from './views/auth/Listing'
import Logout from './views/auth/Logout'
import SearchResult from './views/SearchResult'
import Single from './views/Single'



function guest(to, from, next) {
    if (!store.state.isSignedin) {
        next();
    } else {
        next('/admin/dashboard');
    }
}

function auth(to, from, next) {
    if(store.state.isSignedin){
        next();
    }else{
        next('/login');
    }
}

export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home,
            meta:{
                title: 'Home'
            }
        },
        {
            path: '/businesses',
            name: 'Business',
            component: Business,
            
            meta:{
                title: 'Business'
            }

        },
        {
            path: '/login',
            name: 'Login',
            component: Login,
            beforeEnter: guest,
            meta:{
                title: 'Login'
            }

        },
        {
            path: '/admin/dashboard',
            name: 'Dashboard',
            beforeEnter: auth,
            component: Dashboard,
            meta:{
                title: 'Dashboard'
            }

        },
        {
            path: '/admin/business/create',
            name: 'Create',
            beforeEnter: auth,
            component: Create,
            meta:{
                title: 'Create'
            }

        },
        {
            path: '/admin/categories/create',
            name: 'Categories',
            beforeEnter: auth,
            component: Categories,
            meta:{
                title: 'Categories'
            }

        },
        {
            path: '/admin/businesses',
            name: 'Listing',
            beforeEnter: auth,
            component: Listing,
            meta:{
                title: 'Listing'
            }

        },
        {
            path: '/logout',
            name: 'Logout',
            beforeEnter: auth,
            component: Logout,
            meta:{
                title: 'Logout'
            }

        },
        {
            path: '/business/search-result/:searchtext',
            name: 'SearchResult',
           
            component: SearchResult,
            meta:{
                title: 'SearchResult'
            }

        },
        {
            path: '/business/:id',
            name: 'Single',
           
            component: Single,
            meta:{
                title: 'Single'
            }

        }
        // {
        //     path: '*',
        //     component: error404
        // }

    ],
    mode: 'history',
});
