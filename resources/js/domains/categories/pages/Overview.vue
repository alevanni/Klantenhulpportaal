<script setup lang="ts">
import { getLoggedInUser, isAdmin } from '../../../services/auth';
import Table from '../components/Table.vue';
import { categoryStore, getAllCategories } from '../routes';
categoryStore.actions.getAll();
</script>

<template>
    <div v-if="isAdmin" class="table-container">
        <h1>Available Tags:
        </h1>
        <h3>
            <RouterLink :to="{ name: 'categories.create' }" class="new">
                Add &#127991;</RouterLink>
        </h3>

        <Table :categories="getAllCategories.sort((a, b) => a.name.localeCompare(b.name))"></Table>

    </div>

</template>