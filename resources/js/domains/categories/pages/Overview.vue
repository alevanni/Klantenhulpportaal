<script setup lang="ts">
import { getLoggedInUser } from '../../../services/auth';
import Table from '../components/Table.vue';
import { categoryStore, getAllCategories } from '../routes';
categoryStore.actions.getAll();
</script>

<template>
    <div v-if="getLoggedInUser().isAdmin" class="table-container">
        <h1>Available Categories:</h1>
        <Table :categories="getAllCategories.sort((a, b) => a.name.localeCompare(b.name))"></Table>
    </div>

</template>