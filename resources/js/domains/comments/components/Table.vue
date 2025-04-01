<script setup lang="ts">
import Card from './Card.vue'
const { comments } = defineProps(['comments']);

</script>

<template>
    <h3>Comments</h3>
    <table class="wide-table">
        <tbody>
            <Card v-for="comment in comments.value" :key="comment.id" :comment="comment"></Card>
        </tbody>
    </table>

</template>