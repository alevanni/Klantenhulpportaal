<script setup lang="ts">
import { isAdmin } from '../../../services/auth';
import Table from './../components/Table.vue';
import { userStore, getAllUsers } from '../../users/routes';

userStore.actions.getAll();

</script>

<template>
    <div v-if="isAdmin">
        <h1>Overview of the Users</h1>
        <Table v-if="getAllUsers" :users="getAllUsers"></Table>
    </div>

</template>