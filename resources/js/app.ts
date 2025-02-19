
import { createApp } from "vue";
import App from "./App.vue";
import { ticketRoutes } from "./domains/tickets/routes";
import { userRoutes } from "./domains/users/routes";
import { addRoutes } from "./services/router";
import { useRouterInApp } from "./services/router/index";
import { checkIfLoggedIn } from "./services/auth";

const app = createApp(App);

addRoutes(ticketRoutes);
addRoutes(userRoutes);


try {
    await checkIfLoggedIn();
} catch (_) {
    // so we dont get stuck in an endless loop of refreshing and checking if logged in
} finally {

    useRouterInApp(app);
    app.mount('#app');
}
