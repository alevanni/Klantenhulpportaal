import { storeModuleFactory } from "../../storeModuleFactory";

import { Ticket } from "../types";

// DO THE CONTROLLERS FIRST!!

export const ticketStore = storeModuleFactory<Ticket>("tickets");
