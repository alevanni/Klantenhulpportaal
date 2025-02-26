import { createApp } from "vue";
import App from "./App.vue";
import { ticketRoutes } from "./domains/tickets/routes";
import { userRoutes } from "./domains/users/routes";
import { addRoutes } from "./services/router";
import { useRouterInApp } from "./services/router/index";
import { checkIfLoggedIn, setAuthRoutes } from "./services/auth";

import LoginPage from "./domains/users/pages/LoginPage.vue";
import ResetPassword from "./domains/users/pages/ResetPassword.vue";
import ForgotPassword from "./domains/users/pages/ForgotPassword.vue";
import Register from "./domains/users/pages/Register.vue";

const app = createApp(App);

addRoutes(ticketRoutes);
addRoutes(userRoutes);
setAuthRoutes(LoginPage, ForgotPassword, ResetPassword, Register);

try {
    await checkIfLoggedIn();
} catch (_) {
    // so we dont get stuck in an endless loop of refreshing and checking if logged in
} finally {
    useRouterInApp(app);
    app.mount("#app");
}
