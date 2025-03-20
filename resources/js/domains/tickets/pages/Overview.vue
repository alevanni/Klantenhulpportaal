<script setup lang="ts">
import { isLoggedIn, checkIfLoggedIn, getLoggedInUser } from '../../../services/auth';
import { ticketStore, getAllTickets, myTickets } from './../routes';
import Table from './../components/Table.vue';
import { userStore, getAllUsers } from '../../users/routes';
import { ref } from 'vue';
import { compare } from '../../../services/helpers/sort';
import { categoryStore } from '../../categories/routes';
ticketStore.actions.getAll();
userStore.actions.getAll();
categoryStore.actions.getAll();
const tickets = getLoggedInUser().isAdmin ? getAllTickets : myTickets(getLoggedInUser().id);


</script>

<template>
    <div class="table-container">
        <h1>Overview of tickets</h1>
        <Table class="overview" v-if="getAllTickets"
            :tickets="tickets.sort((a, b) => compare(new Date(a.updated_on), new Date(b.updated_on)))">
        </Table>
    </div>

</template>