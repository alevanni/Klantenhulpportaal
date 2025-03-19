<script setup lang="ts">
import { useRoute } from 'vue-router';
import { ticketStore } from './../routes';
import { userStore } from '../../users/routes';
import { getLoggedInUser, isAdmin } from '../../../services/auth';
import { commentsByTicketId, commentStore } from '../../comments/routes';
import Table from '../../comments/components/Table.vue'
import CategoriesDisplay from '../../categories/components/CategoriesDisplay.vue';
ticketStore.actions.getAll();
userStore.actions.getAll();
commentStore.actions.getAll();
const ticket = ticketStore.getters.byId(+useRoute().params.id);


</script>

<template>
    <div class="ticket-container" v-if="ticket &&( getLoggedInUser().id === ticket.created_by || getLoggedInUser().isAdmin)">
        <h1>{{ ticket.title }}  </h1> 
        <CategoriesDisplay :categories="ticket.categories"></CategoriesDisplay>
            <h3>Opened by: {{ userStore.getters.byId(ticket.created_by).value?.firstName + ' ' +
            userStore.getters.byId(ticket.created_by).value?.lastName }}  </h3>
            <h4>Asked on {{ new Intl.DateTimeFormat("en-GB").format(new Date(ticket.created_on)) }} - updated on {{ new Intl.DateTimeFormat("en-GB").format(new Date(ticket.updated_on)) }}</h4>
        <p>{{ ticket.description }}</p>
        <p>Status: <span :class="[(ticket.status) ? 'open' : 'closed']">{{ ticket.status ? 'Open' : 'Closed' }}</span> - Assigned to: {{ userStore.getters.byId(ticket.assigned_to).value?.firstName + ' ' +
            userStore.getters.byId(ticket.assigned_to).value?.lastName }}</p>
       <Table :comments="commentsByTicketId(ticket.id)"></Table>
    </div>
    


</template>