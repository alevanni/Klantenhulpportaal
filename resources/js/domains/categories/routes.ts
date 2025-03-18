import { storeModuleFactory } from "../../services/store";
import { Category } from "../types";

export const CATEGORIES_DOMAIN_NAME = "categories";
export const categoryStore = storeModuleFactory<Category>(
    CATEGORIES_DOMAIN_NAME
);
categoryStore.actions.getAll();
const categories = categoryStore.getters.all;

export const getAllCategories = categoryStore.getters.all;
