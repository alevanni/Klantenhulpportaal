import { createOverviewRoute } from "../../services/router/factory";
import { storeModuleFactory } from "../../services/store";
import { User } from "../types";

import Overview from "./pages/Overview.vue";

import { computed } from "vue";

export const USERS_DOMAIN_NAME = "users";
export const userRoutes = [createOverviewRoute(USERS_DOMAIN_NAME, Overview)];

export const userStore = storeModuleFactory<User>(USERS_DOMAIN_NAME);

const users = userStore.getters.all;

export const getAllUsers = userStore.getters.all;

export const getAdmins = computed(() =>
    getAllUsers.value.filter((user) => user.isAdmin)
);
