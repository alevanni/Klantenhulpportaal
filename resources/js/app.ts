
import { createApp } from "vue";
import App from "./App.vue";
import { ticketRoutes } from "./domains/tickets/routes";
import { userRoutes } from "./domains/users/routes";
import { addRoutes } from "./services/router";
import { useRouterInApp } from "./services/router/index";

const app = createApp(App);

addRoutes(ticketRoutes);
addRoutes(userRoutes);

useRouterInApp(app);
//app.use(router);
app.mount("#app");
