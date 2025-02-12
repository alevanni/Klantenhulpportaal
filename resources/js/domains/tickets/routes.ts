import Overview from "./pages/Overview.vue";
import Create from "./pages/Create.vue";
import Edit from "./pages/Edit.vue";
import View from "./pages/Ticket.vue";

export const ticketRoutes = [
    { path: "/tickets", name: "tickets", component: Overview },
    { path: "/tickets/create", name: "createTicket", component: Create },
    { path: "/tickets/edit/:id", name: "editTicket", component: Edit },
    { path: "/tickets/view/:id", name: "viewTicket", component: View },
];
