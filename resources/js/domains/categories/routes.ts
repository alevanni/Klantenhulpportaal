import { computed } from "vue";
import { storeModuleFactory } from "../../services/store";
import { Category } from "../types";
import {
    createCreateRoute,
    createEditRoute,
    createOverviewRoute,
} from "../../services/router/factory";
import Overview from "./pages/Overview.vue";
import Create from "./pages/Create.vue";
import Edit from "./pages/Edit.vue";
export const CATEGORIES_DOMAIN_NAME = "categories";
export const categoryStore = storeModuleFactory<Category>(
    CATEGORIES_DOMAIN_NAME
);
export const categoryRoutes = [
    createOverviewRoute(CATEGORIES_DOMAIN_NAME, Overview),
    createCreateRoute(CATEGORIES_DOMAIN_NAME, Create),
    //createShowRoute(TICKETS_DOMAIN_NAME, Show),
    createEditRoute(CATEGORIES_DOMAIN_NAME, Edit),
];

//categoryStore.actions.getAll();
const categories = categoryStore.getters.all;

export const getAllCategories = categoryStore.getters.all;

// gets all the categories except the ones specified in the array
export const getAllButCategories = (array: { id: number }[]) =>
    computed(() =>
        getAllCategories.value.filter(
            (element) => !array.find((item) => item.id == element.id)
        )
    );
