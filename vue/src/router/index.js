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
		path: '/read/:type/:id',
		component: () => import('@/views/Single.vue')
	},

	{
		path: '/pendaftaran-magang',
		component: () => import('@/views/pendaftaran-magang/Home.vue')
	},
	{
		path: '/pendaftaran-magang/info',
		component: () => import('@/views/pendaftaran-magang/Info.vue')
	},
	{
		path: '/pendaftaran-magang/daftarkan-perusahaan',
		component: () => import('@/views/pendaftaran-magang/DaftarkanPerusahaan.vue')
	},
	{
		path: '/pendaftaran-magang/dafar-perusahaan',
		component: () => import('@/views/pendaftaran-magang/DaftarPerusahaan.vue')
	},
	{
		path: '/pendaftaran-magang/dafar/:id',
		component: () => import('@/views/pendaftaran-magang/Daftar.vue')
	},

	{
		path: '/admin',
		component: () => import('@/views/admin/Admin.vue')
	},
	{
		path: '/news',
		component: () => import('@/views/admin/News.vue')
	},
	{
		path: '/add-news',
		component: () => import('@/views/admin/AddNews.vue')
	},
	{
		path: '/edit-news/:id',
		component: () => import('@/views/admin/EditNews.vue')
	},
	{
		path: '/prestasi',
		component: () => import('@/views/admin/Prestasi.vue')
	},
	{
		path: '/add-prestasi',
		component: () => import('@/views/admin/AddPrestasi.vue')
	},
	{
		path: '/edit-prestasi/:id',
		component: () => import('@/views/admin/EditPrestasi.vue')
	},
	{
		path: '/banner',
		component: () => import('@/views/admin/Banner.vue')
	},
	{
		path: '/add-banner',
		component: () => import('@/views/admin/AddBanner.vue')
	},
	{
		path: '/edit-banner/:id',
		component: () => import('@/views/admin/EditBanner.vue')
	},
	{
		path: '/data-magang',
		component: () => import('@/views/admin/Magang.vue')
	}
]

const router = new VueRouter({
	mode: 'history',
	base: process.env.BASE_URL,
	routes
})

export default router
