<script setup lang="ts">
import Card from './Card.vue';
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
            <Card v-for="category in categories" :key="category.id" :category="category"></Card>
        </tbody>
    </table>


</template>