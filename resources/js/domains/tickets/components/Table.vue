<script setup lang="ts">
import Card from './Card.vue';
const { tickets } = defineProps(['tickets']);

</script>

<template>
    <div class="table">
        <h2>Table</h2>

        <Card v-for="ticket in tickets" :key="ticket.id" :ticket="ticket"></Card>


    </div>

</template>