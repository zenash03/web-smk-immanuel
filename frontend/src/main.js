import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import "./assets/css/tailwind.css";
import VueMeta from "vue-meta";

Vue.use(VueMeta);

/* import the fontawesome core */
import { library } from "@fortawesome/fontawesome-svg-core";

/* import specific icons */
import {
  faCalendar,
  faCalendarDays,
  faCalendarPlus,
  faAngleDown,
  faIdCard,
  faBriefcase,
  faInfo,
  faFolderPlus,
  faListUl,
  faWrench,
} from "@fortawesome/free-solid-svg-icons";

/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

/* add icons to the library */
library.add(faCalendar, faCalendarDays, faCalendarPlus, faAngleDown, faIdCard, faBriefcase, faInfo, faFolderPlus, faListUl, faWrench);

/* add font awesome icon component */
Vue.component("font-awesome-icon", FontAwesomeIcon);

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: function (h) {
    return h(App);
  },
}).$mount("#app");
