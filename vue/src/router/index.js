import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
	{
		path: '/',
		component: () => import('@/views/Home.vue')
	},
	{
		path: '/login',
		component: () => import('@/views/Login.vue')
	},
	{
		path: '/news',
		component: () => import('@/views/Berita.vue')
	},
	{
		path: '/prestasi',
		component: () => import('@/views/Prestasi.vue')
	},
	{
		path: '/visi-misi',
		component: () => import('@/views/VisiMisi.vue')
	},
	{
		path: '/read/:type/:id',
		component: () => import('@/views/Single.vue')
	},


	{
		path: '/pendaftaran-magang',
		component: () => import('@/views/pendaftaran-magang/Home.vue'),
		meta: {
			auth: true
		}
	},
	{
		path: '/pendaftaran-magang/info',
		component: () => import('@/views/pendaftaran-magang/Info.vue'),
		meta: {
			auth: true
		}
	},
	{
		path: '/pendaftaran-magang/daftarkan-perusahaan',
		component: () => import('@/views/pendaftaran-magang/DaftarkanPerusahaan.vue'),
		meta: {
			auth: true
		}
	},
	{
		path: '/pendaftaran-magang/dafar-perusahaan',
		component: () => import('@/views/pendaftaran-magang/DaftarPerusahaan.vue'),
		meta: {
			auth: true
		}
	},
	{
		path: '/pendaftaran-magang/dafar/:id',
		component: () => import('@/views/pendaftaran-magang/Daftar.vue'),
		meta: {
			auth: true
		}
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
			next('/login');
		} else {
			next();
		}
	} else {
	  	next();
	}
});

export default router
