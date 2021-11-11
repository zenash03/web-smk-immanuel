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
		path: '/dashboard',
		component: () => import('@/layouts/Dashboard.vue'),
		meta: {
			auth: true
		},
		children: [
			{
				path: '/',
				component: () => import('@/views/dashboard/Home.vue'),
				meta: {
					auth: true
				}
			},
			{
				path: 'magang',
				component: () => import('@/layouts/Magang.vue'),
				meta: {
					auth: true
				},
				children: [
					{
						path: 'info',
						component: () => import('@/views/dashboard/Info.vue'),
						meta: {
							auth: true
						}
					},
					{
						path: 'daftarkan-perusahaan',
						component: () => import('@/views/dashboard/DaftarkanPerusahaan.vue'),
						meta: {
							auth: true
						}
					},
					{
						path: 'edit-perusahaan',
						component: () => import('@/views/dashboard/PerusahaanYangDidaftarkan.vue'),
						meta: {
							auth: true
						}
					},
					{
						path: 'edit-perusahaan/:id',
						component: () => import('@/views/dashboard/EditPerusahaan.vue'),
						meta: {
							auth: true
						}
					},
					{
						path: 'daftar-perusahaan',
						component: () => import('@/views/dashboard/DaftarPerusahaan.vue'),
						meta: {
							auth: true
						}
					},
					{
						path: 'daftar/:id',
						component: () => import('@/views/dashboard/Daftar.vue'),
						meta: {
							auth: true
						}
					},
					{
						path: 'download-surat',
						component: () => import('@/views/dashboard/DownloadSurat.vue'),
						meta: {
							auth: true
						}
					}
				]
			},
			{
				path: 'kartu-pelajar',
				component: () => import('@/views/dashboard/KartuPelajar.vue'),
				meta: {
					auth: true
				}
			}
		]
	},
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
