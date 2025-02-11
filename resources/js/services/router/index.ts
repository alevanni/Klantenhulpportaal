// ROUTER FACADE

import { Component } from "vue";
import { createWebHistory, createRouter, RouteRecordRaw } from "vue-router";

export const createRoute = (
    name: string,
    path: string,
    component: Component
) => {
    return {
        name,
        path,
        component,
    };
};

export const addRoutes = (routes: RouteRecordRaw[]) => {
    for (const route of routes) {
        router.addRoute(route);
    }
};

export const goToRoute = (name: string, id?: number) => {
    const route: { name: string; params?: { id: number } } = { name };

    // Add the 'id' to the 'params' if it is present

    if (id) {
        route.params = { id };
    }

    // Navigate to the specified route
    router.push(route);
};

export const router = createRouter({
    history: createWebHistory(),
    routes: [],
});
