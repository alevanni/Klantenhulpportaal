import Login from "./pages/Login.vue";
import Home from "./pages/Home.vue";
export const userRoutes = [
    { path: "/", name: "home", component: Home },
    { path: "/login", name: "Login", component: Login },
];

export const USER_DOMAIN_NAME = "users";
