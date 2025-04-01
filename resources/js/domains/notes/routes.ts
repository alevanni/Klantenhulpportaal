import { computed } from "vue";
import { storeModuleFactory } from "../../services/store";

import { Note } from "../types";

export const NOTES_DOMAIN_NAME = "notes";
export const noteStore = storeModuleFactory<Note>(NOTES_DOMAIN_NAME);

const notes = noteStore.getters.all;

export const getAllNotes = noteStore.getters.all;

export const notesByTicketId = (id: number) =>
    computed(() => getAllNotes.value.filter((note) => note.ticket_id == id));
