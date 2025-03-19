import { computed } from "vue";
import { storeModuleFactory } from "../../services/store";
import { Category } from "../types";

export const CATEGORIES_DOMAIN_NAME = "categories";
export const categoryStore = storeModuleFactory<Category>(
    CATEGORIES_DOMAIN_NAME
);
categoryStore.actions.getAll();
const categories = categoryStore.getters.all;

export const getAllCategories = categoryStore.getters.all;


// gets all the categories except the ones specified in the array
export const getAllButCategories = (array: { id: number }[]) =>
    computed(() => getAllCategories.value.filter(element => !array.find(item => item.id == element.id)));
