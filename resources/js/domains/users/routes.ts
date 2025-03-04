import { createOverviewRoute } from "../../services/router/factory";
import { storeModuleFactory } from "../../services/store";
import { User } from "../types";
import LoginPage from "../auth/pages/LoginPage.vue";
import Home from "../auth/pages/LoginPage.vue";
import Overview from "./pages/Overview.vue";

export const USERS_DOMAIN_NAME = "users";
export const userRoutes = [
    createOverviewRoute(USERS_DOMAIN_NAME, Overview),
    // { path: "/login", name: "Login", component: Login },
];

export const userStore = storeModuleFactory<User>(USERS_DOMAIN_NAME);

const tickets = userStore.getters.all;

export const getAllUsers = userStore.getters.all;
