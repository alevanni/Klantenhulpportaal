import { storeModuleFactory } from "./../../services/store/index";

import { Ticket } from "../types";

// DO THE CONTROLLERS FIRST!!

export const ticketStore = storeModuleFactory<Ticket>("tickets");

ticketStore.actions.getAll();

const tickets = ticketStore.getters.all;

export const getAllTickets = ticketStore.getters.all;
