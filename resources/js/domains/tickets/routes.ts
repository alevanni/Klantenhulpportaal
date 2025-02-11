import TicketsOverview from "./pages/TicketsOverview.vue";
import CreateTicket from "./pages/CreateTicket.vue";
import EditTicket from "./pages/EditTicket.vue";
import ViewTicket from "./pages/ViewTicket.vue";

export const ticketRoutes = [
    { path: "/tickets", name: "tickets", component: TicketsOverview },
    { path: "/tickets/create", name: "createTicket", component: CreateTicket },
    { path: "/tickets/edit/:id", name: "editTicket", component: EditTicket },

    { path: "/tickets/view/:id", name: "viewTicket", component: ViewTicket },
];
