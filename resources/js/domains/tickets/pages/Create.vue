<script setup lang="ts">
import { ref } from 'vue';
import { ticketStore } from '../routes';
import Form from '../components/Form.vue';
import { getLoggedInUser } from '../../../services/auth';
import { goToOverviewPage } from '../../../services/router';
const newTicket = ref({ title: "", description: "", categories: [], created_by: getLoggedInUser().id })
const addTicket = async (ticket: any) => {
    await ticketStore.actions.create(ticket);
    goToOverviewPage('tickets');
}
</script>

<template>
    <h1>Create a new ticket</h1>
    <Form :ticket="newTicket" @ticket-submit="addTicket"></Form>

</template>