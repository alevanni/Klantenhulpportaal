<script setup lang="ts">
import { isLoggedIn, checkIfLoggedIn, getLoggedInUser } from '../../../services/auth';

import Table from './../components/Table.vue';
import { userStore, getAllUsers } from '../../users/routes';
userStore.actions.getAll();

</script>

<template>
    <h1>Overview of the Users</h1>
    <Table v-if="getAllUsers" :users="getAllUsers"></Table>
</template>