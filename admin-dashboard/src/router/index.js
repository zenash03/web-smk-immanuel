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
			},
			{
				path: 'daftar-perusahaan/:id',
				component: () => import('@/views/magang/EditPerusahaan.vue'),
				meta: {
					auth: true
				}
			},
			{
				path: 'filter',
				component: () => import('@/views/magang/Filter.vue'),
				meta: {
					auth: true
				}
			}
		]
	},
	{
		path: '/content',
		component: () => import('@/layouts/Dashboard.vue'),
		meta: {
			auth: true
		},
		children: [
			{
				path: 'news',
				component: () => import('@/views/content/news/News.vue'),
				meta: {
					auth: true
				}
			},
			{
				path: 'news/add',
				component: () => import('@/views/content/news/Add.vue'),
				meta: {
					auth: true
				}
			},
			{
				path: 'news/edit/:id',
				component: () => import('@/views/content/news/Edit.vue'),
				meta: {
					auth: true
				}
			},
			{
				path: 'achievements',
				component: () => import('@/views/content/achievements/Achievements.vue'),
				meta: {
					auth: true
				}
			},
			{
				path: 'achievements/add',
				component: () => import('@/views/content/achievements/Add.vue'),
				meta: {
					auth: true
				}
			},
			{
				path: 'achievements/edit/:id',
				component: () => import('@/views/content/achievements/Edit.vue'),
				meta: {
					auth: true
				}
			},
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
