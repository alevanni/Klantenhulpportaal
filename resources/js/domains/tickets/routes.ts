import Overview from "./pages/Overview.vue";
import Create from "./pages/Create.vue";
import Edit from "./pages/Edit.vue";
import Show from "./pages/Show.vue";
import {
    createCreateRoute,
    createEditRoute,
    createOverviewRoute,
    createShowRoute,
} from "../../services/router/factory";
import { storeModuleFactory } from "./../../services/store/index";

import { Ticket } from "../types";
import { computed } from "vue";
export const TICKETS_DOMAIN_NAME = "tickets";

export const ticketRoutes = [
    createOverviewRoute(TICKETS_DOMAIN_NAME, Overview),
    createCreateRoute(TICKETS_DOMAIN_NAME, Create),
    createShowRoute(TICKETS_DOMAIN_NAME, Show),
    createEditRoute(TICKETS_DOMAIN_NAME, Edit)
];

export const ticketStore = storeModuleFactory<Ticket>(TICKETS_DOMAIN_NAME);

const tickets = ticketStore.getters.all;

export const getAllTickets = ticketStore.getters.all;

export const myTickets = (id: number) =>
    computed(() =>
        getAllTickets.value.filter((ticket) => ticket.created_by == id)
    );
