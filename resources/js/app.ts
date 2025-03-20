import { createApp } from "vue";
import App from "./App.vue";
import { ticketRoutes } from "./domains/tickets/routes";
import { userRoutes } from "./domains/users/routes";
import { categoryRoutes } from "./domains/categories/routes";
import { addRoutes } from "./services/router";
import { useRouterInApp } from "./services/router/index";
import { checkIfLoggedIn, setAuthRoutes } from "./services/auth";

import LoginPage from "./domains/auth/pages/LoginPage.vue";
import ResetPassword from "./domains/auth/pages/ResetPassword.vue";
import ForgotPassword from "./domains/auth/pages/ForgotPassword.vue";
import Register from "./domains/auth/pages/Register.vue";

setAuthRoutes(LoginPage, ForgotPassword, ResetPassword, Register);
addRoutes([...ticketRoutes, ...userRoutes, ...categoryRoutes]);

try {
    await checkIfLoggedIn();
} catch (_) {
    // so we dont get stuck in an endless loop of refreshing and checking if logged in
} finally {
    const app = createApp(App);
    useRouterInApp(app);
    app.mount("#app");
}
