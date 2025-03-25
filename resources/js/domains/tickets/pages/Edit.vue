<script setup lang="ts">
import { ref } from 'vue';
import { ticketStore } from '../routes';
import Form from '../components/Form.vue';
import { getLoggedInUser } from '../../../services/auth';
import { goToOverviewPage } from '../../../services/router';
import { useRoute } from 'vue-router';
ticketStore.actions.getAll();
const ticketToEdit = ref(ticketStore.getters.byId(+useRoute().params.id));
const editTicket = async (ticket: any) => {
    try {

        await ticketStore.actions.update(ticket.id, ticket);
        goToOverviewPage('tickets');
    }
    catch (e) {
        console.log(e);
    }

}
</script>

<template>
    <h1>Edit ticket</h1>
    <Form v-if="ticketToEdit && (ticketToEdit.created_by === getLoggedInUser().id || getLoggedInUser().isAdmin)"
        :ticket="ticketToEdit" @ticket-submit="editTicket"></Form>

</template>