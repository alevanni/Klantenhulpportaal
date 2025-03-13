import { storeModuleFactory } from "../../services/store";
import { Category } from "../types";

export const CATEGORIES_DOMAIN_NAME = "categories";
export const categoryStore = storeModuleFactory<Category>(
    CATEGORIES_DOMAIN_NAME
);

const tickets = categoryStore.getters.all;

export const getAllTickets = categoryStore.getters.all;
