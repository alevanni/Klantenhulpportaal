<script setup lang="ts">
import CategoriesDisplay from '../../categories/components/CategoriesDisplay.vue';
import { userStore } from '../../users/routes';
const { ticket } = defineProps(['ticket']);

</script>

<template>

    <tr>
        <td>{{ ticket.id }}</td>
        <td>
            <RouterLink :to="{ name: 'tickets.show', params: { id: ticket.id } }">{{ ticket.title }}</RouterLink>
            <CategoriesDisplay :categories="ticket.categories"></CategoriesDisplay>
            <RouterLink class="edit-link" :to="{ name: 'tickets.edit', params: { id: ticket.id } }"> &#128393; Edit
            </RouterLink>
        </td>
        <td :class="[(ticket.status === 0) ? 'red' : ((ticket.status === 1) ? 'yellow' : 'green')]">{{ (ticket.status
            === 0) ? 'pending' : ((ticket.status === 1) ? 'in progress' : 'closed') }}</td>
        <td>{{ userStore.getters.byId(ticket.created_by).value?.firstName + ' ' +
            userStore.getters.byId(ticket.created_by).value?.lastName }}</td>
        <td>{{ new Intl.DateTimeFormat("en-GB").format(new Date(ticket.created_on)) }}</td>
        <td>{{ new Intl.DateTimeFormat("en-GB").format(new Date(ticket.updated_on)) }}</td>
        <td>{{ (userStore.getters.byId(ticket.assigned_to).value?.firstName) ?
            userStore.getters.byId(ticket.assigned_to).value?.firstName + ' ' +
            userStore.getters.byId(ticket.assigned_to).value?.lastName : "Not assigned yet" }}</td>
    </tr>
</template>