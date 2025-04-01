<script setup lang="ts">
import Card from './Card.vue';
const { notes } = defineProps(['notes']);

</script>

<template>
    <h3>Notes:</h3>
    <table class="wide-table">
        <tbody>
            <Card v-for="note in notes" :key="note.id" :note="note"></Card>
        </tbody>
    </table>

</template>