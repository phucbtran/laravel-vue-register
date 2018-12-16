import Vue from 'vue'
import Router from 'vue-router'
import Register from '../components/Register'
import Home from '../components/Home'
import Welcome from '../components/Welcome'

Vue.use(Router)

var routers = [
	{
		path: '/register',
		name: 'register',
		component: Register,
	},
    {
        path: '/home',
        name: 'home',
        component: Home,
    },
    {
        path: '/welcome',
        name: 'welcome',
        component: Welcome,
    }
];

var router = new Router({
    mode: 'history',
	routes: routers
});

router.beforeEach((to, from, next) => {

	next();
});

// router.beforeEach((to, from, next) => {
//     if(to.matched.some(record => record.meta.requiresAuth)) {
//         if (localStorage.getItem('jwt') == null) {
//             next({
//                 path: '/login',
//                 params: { nextUrl: to.fullPath }
//             })
//         } else {
//             let user = JSON.parse(localStorage.getItem('user'))
//             if(to.matched.some(record => record.meta.is_admin)) {
//                 if(user.is_admin == 1){
//                     next()
//                 }
//                 else{
//                     next({ name: 'userboard'})
//                 }
//             }
//             else if(to.matched.some(record => record.meta.is_user)) {
//                 if(user.is_admin == 0){
//                     next()
//                 }
//                 else{
//                     next({ name: 'admin'})
//                 }
//             }
//             next()
//         }
//     } else {
//         next()
//     }
// });


export default router;