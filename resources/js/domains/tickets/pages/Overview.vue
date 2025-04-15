<script setup lang="ts">
import { getLoggedInUser } from '../../../services/auth';
import { ticketStore, getAllTickets, myTickets } from './../routes';
import Table from './../components/Table.vue';
import { userStore } from '../../users/routes';
import { compare } from '../../../services/helpers/sort';
import { categoryStore } from '../../categories/routes';
ticketStore.actions.getAll();
userStore.actions.getAll();
categoryStore.actions.getAll();

const myOwnTickets = myTickets(getLoggedInUser().id);

</script>

<template>
    <div class="table-container">
        <h1>Overview of tickets</h1>
        <div v-if="getAllTickets">
            <Table class="overview" v-if="getLoggedInUser().isAdmin"
                :tickets="getAllTickets.sort((a, b) => compare(new Date(a.updated_on), new Date(b.updated_on)))">
            </Table>
            <Table class="overview" v-else
                :tickets="myOwnTickets.sort((a, b) => compare(new Date(a.updated_on), new Date(b.updated_on)))">
            </Table>
        </div>


    </div>

</template>