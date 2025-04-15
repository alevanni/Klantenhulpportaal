<script setup lang="ts">
import { useRoute } from 'vue-router';
import { ticketStore } from './../routes';
import { compare } from '../../../services/helpers/sort';
import { userStore } from '../../users/routes';
import { categoryStore } from '../../categories/routes';
import { getLoggedInUser, isAdmin } from '../../../services/auth';
import { commentsByTicketId, commentStore } from '../../comments/routes';
import { notesByTicketId, noteStore } from '../../notes/routes';
import CommentTable from '../../comments/components/Table.vue'
import CategoriesDisplay from '../../categories/components/CategoriesDisplay.vue';
import NoteTable from '../../notes/components/Table.vue';
import NoteForm from '../../notes/components/Form.vue';
import AssignmentForm from '../components/AssignmentForm.vue';
import StatusForm from '../components/StatusForm.vue';
import CommentForm from '../../comments/components/CommentForm.vue';
import { ref } from 'vue';

categoryStore.actions.getAll();
ticketStore.actions.getAll();
userStore.actions.getAll();
commentStore.actions.getAll();
noteStore.actions.getAll();

const ticket = ticketStore.getters.byId(+useRoute().params.id);
const notes = notesByTicketId(+useRoute().params.id);

const newComment = ref({ ticket_id: +useRoute().params.id, created_by: getLoggedInUser().id, body: "" });
const newNote = ref({ ticket_id: +useRoute().params.id, created_by: getLoggedInUser().id, body: "" });
const commentKey = ref(0);
const noteKey = ref(0);
const updateAssignedUser = async (ticket: any) => {
    console.log(ticket);

    await ticketStore.actions.update(ticket.id, ticket)
}

const updateAssignedStatus = async (ticket: any) => {
    console.log(ticket);

    await ticketStore.actions.update(ticket.id, ticket)
}

const addComment = async (comment: any) => {
    try {
        await commentStore.actions.create(comment);

        commentKey.value = commentKey.value + 1;

    }
    catch (e) {
        console.log(e);
    }
}

const addNote = async (note: any) => {
    try {
        await noteStore.actions.create(note);

        noteKey.value = noteKey.value + 1;

    }
    catch (e) {
        console.log(e);
    }
}
</script>


<template>
    <div class="ticket-container"
        v-if="ticket && (getLoggedInUser().id === ticket.created_by || getLoggedInUser().isAdmin)">
        <h1>{{ ticket.title }} </h1>

        <CategoriesDisplay :categories="ticket.categories"></CategoriesDisplay>
        <h3>Opened by: {{ userStore.getters.byId(ticket.created_by).value?.firstName + ' ' +
            userStore.getters.byId(ticket.created_by).value?.lastName }} </h3>
        <h4>Asked on {{ new Intl.DateTimeFormat("en-GB").format(new Date(ticket.created_on)) }} - updated on {{ new
            Intl.DateTimeFormat("en-GB").format(new Date(ticket.updated_on)) }}</h4>
        <p>{{ ticket.description }} <RouterLink :to="{ name: 'tickets.edit', params: { id: ticket.id } }"> &#128393;
                Edit
            </RouterLink>
        </p>
        <AssignmentForm v-if="getLoggedInUser().isAdmin" :ticket="ticket" @assign_user="updateAssignedUser">
        </AssignmentForm>
        <div v-else>Assigned to: {{ userStore.getters.byId(ticket.assigned_to).value?.firstName + ' ' +
            userStore.getters.byId(ticket.assigned_to).value?.lastName }} </div>
        <StatusForm v-if="getLoggedInUser().isAdmin" :ticket="ticket" @assign_status="updateAssignedStatus">
        </StatusForm>
        <div v-else>Status: <span
                :class="[(ticket.status === 0) ? 'red' : ((ticket.status === 1) ? 'yellow' : 'green')]">{{
                    (ticket.status
                        === 0) ? 'pending' : ((ticket.status === 1) ? 'in progress' : 'closed') }} </span></div>

        <NoteTable v-if="getLoggedInUser().isAdmin"
            :notes="notes.sort((a, b) => compare(new Date(a.created_on), new Date(b.created_on)))">
        </NoteTable>
        <NoteForm v-if="getLoggedInUser().isAdmin" :note="newNote" :key="noteKey" @submit-note="addNote"></NoteForm>
        <CommentTable :comments="commentsByTicketId(ticket.id)"></CommentTable>
        <CommentForm :comment="newComment" :key="commentKey" @submit-comment="addComment"></CommentForm>

    </div>



</template>