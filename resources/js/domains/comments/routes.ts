import { computed } from "vue";
import { storeModuleFactory } from "../../services/store";

import { Comment } from "../types";

export const COMMENTS_DOMAIN_NAME = "comments";
export const commentStore = storeModuleFactory<Comment>(
    COMMENTS_DOMAIN_NAME
);

const comments = commentStore.getters.all;

export const getAllComments = commentStore.getters.all;

export const commentsByTicketId = (id: number) =>
    computed(() =>
        getAllComments.value.filter((comment) => comment.ticket_id == id)
    );