<script setup lang="ts">
import { userStore } from '../../users/routes';
const { ticket } = defineProps(['ticket']);
</script>

<template>

    <tr>
        <td>{{ ticket.id }}</td>
        <td>
            <RouterLink :to="{ name: 'tickets.show', params: { id: ticket.id } }">{{ ticket.title }}</RouterLink>
        </td>
        <td :class="[(ticket.status) ? 'open' : 'closed']">{{ ticket.status ? 'Open' : 'Closed' }}</td>
        <td>{{ userStore.getters.byId(ticket.created_by).value?.name }}</td>
        <td>{{ new Intl.DateTimeFormat("en-GB").format(new Date(ticket.created_on)) }}</td>
        <td>{{ new Intl.DateTimeFormat("en-GB").format(new Date(ticket.updated_on)) }}</td>
        <td>{{ userStore.getters.byId(ticket.assigned_to).value?.name }}</td>
    </tr>
</template>