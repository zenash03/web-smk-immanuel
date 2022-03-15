import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
  {
    path: "/dashboard",
    component: function () {
      return import("../components/Dashboard.vue");
    },
    children: [
      {
        path: "",
        component: function () {
          return import("../views/Index.vue");
        },
      },
      {
        path: "event",
        component: function () {
          return import("../views/event/Index.vue");
        },
        children: [
          {
            path: "list",
            component: function () {
              return import("../views/event/List.vue");
            },
          },
          {
            path: "create",
            component: function () {
              return import("../views/event/Create.vue");
            },
          },
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
