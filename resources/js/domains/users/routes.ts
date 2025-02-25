import { storeModuleFactory } from "../../services/store";
import { User } from "../types";
import LoginPage from "./pages/LoginPage.vue";
import Home from "./pages/LoginPage.vue";
export const userRoutes = [
    //{ path: "/", name: "Login", component: LoginPage },
    // { path: "/login", name: "Login", component: Login },
];

export const USER_DOMAIN_NAME = "users";
export const userStore = storeModuleFactory<User>(USER_DOMAIN_NAME);

const tickets = userStore.getters.all;

export const getAllUsers = userStore.getters.all;
