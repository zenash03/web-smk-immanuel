import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
	{
		path: '/',
		component: () => import('@/views/Login.vue')
	},
	{
		path: '/home',
		component: () => import('@/views/Home.vue'),
		meta: {
			auth: true
		}
	},
	{
		path: '/magang',
		component: () => import('@/layouts/Dashboard.vue'),
		meta: {
			auth: true
		},
		children: [
			{
				path: 'pendaftar',
				component: () => import('@/views/magang/Pendaftar.vue'),
				meta: {
					auth: true
				}
			},
			{
				path: 'daftarkan-perusahaan',
				component: () => import('@/views/magang/DaftarkanPerusahaan.vue'),
				meta: {
					auth: true
				}
			},
			{
				path: 'daftar-perusahaan',
				component: () => import('@/views/magang/DaftarPerusahaan.vue'),
				meta: {
					auth: true
				}
			}
		]
	}
]

const router = new VueRouter({
	mode: 'history',
	base: process.env.BASE_URL,
	routes
})

router.beforeEach((to, from, next) => {
	if (to.matched.some(record => record.meta.auth)) {
		if (!localStorage.getItem('token')) {
			next('/');
		} else {
			next();
		}
	} else {
	  	next();
	}
});

export default router
