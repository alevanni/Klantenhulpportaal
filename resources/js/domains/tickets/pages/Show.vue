<script setup lang="ts">
import { useRoute } from 'vue-router';
import { ticketStore } from './../routes';
import { userStore } from '../../users/routes';
ticketStore.actions.getAll();
userStore.actions.getAll();
const ticket = ticketStore.getters.byId(+useRoute().params.id);


</script>

<template>
    <div v-if="ticket"><h1>{{ ticket.title }} - {{userStore.getters.byId(ticket.created_by).value?.name}}</h1>
        <p>{{ ticket.description }}</p></div>

    
</template>