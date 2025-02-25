<script setup lang="ts">
import { isLoggedIn, checkIfLoggedIn, getLoggedInUser } from '../../../services/auth';
import { ticketStore, getAllTickets } from './../routes';
import Table from './../components/Table.vue';
import { userStore, getAllUsers } from '../../users/routes';
ticketStore.actions.getAll();
userStore.actions.getAll();
</script>

<template>
    <h1>Overview of tickets</h1>
    <Table v-if="getAllTickets" :tickets="getAllTickets"></Table>
</template>