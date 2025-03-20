<script setup lang="ts">
const { categories } = defineProps(['categories']);
</script>

<template>

    <table>
        <thead>
            <tr>
                <th>
                    Id
                </th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="category in categories" :key="category.id">
                <td>{{ category.id }}</td>
                <td>{{ category.name }}</td>
            </tr>
        </tbody>
    </table>


</template>