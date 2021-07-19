import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
	{
		path: '/',
		name: 'Home',
		component: Home
	},
	{
		path: '/read/:type/:id',
		component: () => import('@/views/Single.vue')
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
	}
]

const router = new VueRouter({
	mode: 'history',
	base: process.env.BASE_URL,
	routes
})

export default router
