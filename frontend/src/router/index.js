import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: 'event.index',
    component: () => import("../views/Index.vue"),
  },
  {
    path: "/dashboard",
    component: () => import("../components/Dashboard.vue"),
    children: [
      {
        path: "",
        name: 'event.dashboard',
        component: () => import("../views/Dashboard.vue")
      },
      {
        path: "event",
        name: 'event.dashboardIndex',
        component: () => import("../views/event/Index.vue"),
        children: [
          {
            path: "list",
            name: 'event.list',
            component: () => import("../views/event/List.vue")
          },
          {
            path: "create",
            name: 'event.create',
            component: () => import("../views/event/Create.vue")
          },
          {
            path : 'detail/:id',
            name: 'event.detail',
            component: () => import("../views/event/Detail.vue")
          }
        ],
      },
    ],
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
