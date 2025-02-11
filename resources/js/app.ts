import "./bootstrap";

import { createApp } from "vue";
import App from "./App.vue";
import { ticketRoutes } from "./domains/tickets/routes";
import { addRoutes, router } from "./services/router";

const app = createApp(App);

addRoutes(ticketRoutes);
app.use(router);
app.mount("#app");
