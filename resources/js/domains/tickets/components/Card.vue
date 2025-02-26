<script setup lang="ts">
import { userStore } from '../../users/routes';
const { ticket } = defineProps(['ticket']);
</script>

<template>
    <div class="card">
        <h2 class="badge" :class="[ (ticket.status)? 'open': 'closed']">{{ ticket.status? 'Open' : 'Closed' }}</h2>
        <h3><RouterLink :to="{ name: 'tickets.show',  params: { id: ticket.id } }">{{ ticket.title }}</RouterLink>  - {{ userStore.getters.byId(ticket.created_by).value?.name }}</h3>
        <p>{{ ticket.description }}</p>
        <p>Created on:{{ ticket.created_on }} - </p>
        <p>Last updated on: {{ ticket.last_updated_on }}</p>
    </div>

</template>