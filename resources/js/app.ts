import { createApp } from "vue";
import App from "./App.vue";
import { ticketRoutes } from "./domains/tickets/routes";
import { userRoutes } from "./domains/users/routes";
import { addRoutes } from "./services/router";
import { useRouterInApp } from "./services/router/index";
import { checkIfLoggedIn, setAuthRoutes } from "./services/auth";

import LoginPage from "./domains/users/pages/LoginPage.vue";

const app = createApp(App);

addRoutes(ticketRoutes);
//addRoutes(userRoutes);
setAuthRoutes(LoginPage, LoginPage, LoginPage, LoginPage);

try {
    await checkIfLoggedIn();
} catch (_) {
    // so we dont get stuck in an endless loop of refreshing and checking if logged in
} finally {
    useRouterInApp(app);
    app.mount("#app");
}
