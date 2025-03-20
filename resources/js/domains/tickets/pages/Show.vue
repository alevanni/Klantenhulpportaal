<script setup lang="ts">
import { useRoute } from 'vue-router';
import { ticketStore } from './../routes';
import { userStore } from '../../users/routes';
import { getLoggedInUser, isAdmin } from '../../../services/auth';
import { commentsByTicketId, commentStore } from '../../comments/routes';
import Table from '../../comments/components/Table.vue'
import CategoriesDisplay from '../../categories/components/CategoriesDisplay.vue';
import AssignmentForm from '../components/AssignmentForm.vue';
import StatusForm from '../components/StatusForm.vue';
ticketStore.actions.getAll();
userStore.actions.getAll();
commentStore.actions.getAll();
const ticket = ticketStore.getters.byId(+useRoute().params.id);

const updateAssignedUser = async (ticket: any) => {
    console.log(ticket);

    await ticketStore.actions.update(ticket.id, ticket)
}

const updateAssignedStatus = async (ticket: any) => {
    console.log(ticket);

    await ticketStore.actions.update(ticket.id, ticket)
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

        <!---  <p>Status: <span :class="[(ticket.status === 0) ? 'red' : ((ticket.status === 1) ? 'yellow' : 'green')]">{{
            (ticket.status === 0) ? 'pending' : ((ticket.status === 1) ? 'in progress' : 'closed') }}</span> -
            Currently assigned to: {{ userStore.getters.byId(ticket.assigned_to).value?.firstName + ' ' +
                userStore.getters.byId(ticket.assigned_to).value?.lastName }}</p>
                -->
        <AssignmentForm v-if="getLoggedInUser().isAdmin" :ticket="ticket" @assign_user="updateAssignedUser">
        </AssignmentForm>
        <StatusForm v-if="getLoggedInUser().isAdmin" :ticket="ticket" @assign_status="updateAssignedStatus">
        </StatusForm>
        <Table :comments="commentsByTicketId(ticket.id)"></Table>
    </div>



</template>