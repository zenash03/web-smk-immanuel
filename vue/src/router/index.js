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


	// {
	// 	path: '/admin',
	// 	component: () => import('@/views/admin/Admin.vue')
	// },
	// {
	// 	path: '/admin/news',
	// 	component: () => import('@/views/admin/News.vue')
	// },
	// {
	// 	path: '/admin/add-news',
	// 	component: () => import('@/views/admin/AddNews.vue')
	// },
	// {
	// 	path: '/admin/edit-news/:id',
	// 	component: () => import('@/views/admin/EditNews.vue')
	// },
	// {
	// 	path: '/admin/prestasi',
	// 	component: () => import('@/views/admin/Prestasi.vue')
	// },
	// {
	// 	path: '/admin/add-prestasi',
	// 	component: () => import('@/views/admin/AddPrestasi.vue')
	// },
	// {
	// 	path: '/admin/edit-prestasi/:id',
	// 	component: () => import('@/views/admin/EditPrestasi.vue')
	// },
	// {
	// 	path: '/admin/banner',
	// 	component: () => import('@/views/admin/Banner.vue')
	// },
	// {
	// 	path: '/admin/add-banner',
	// 	component: () => import('@/views/admin/AddBanner.vue')
	// },
	// {
	// 	path: '/admin/edit-banner/:id',
	// 	component: () => import('@/views/admin/EditBanner.vue')
	// },
	// {
	// 	path: '/admin/data-magang',
	// 	component: () => import('@/views/admin/Magang.vue')
	// }
]

const router = new VueRouter({
	mode: 'history',
	base: process.env.BASE_URL,
	routes
})

export default router
