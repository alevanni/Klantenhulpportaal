<script setup lang="ts">
import Badge from './Badge.vue';

const { categories } = defineProps(['categories']);
</script>

<template>
    <Badge v-for="category in categories" :key="category.ïd" :id="category.id"></Badge>
</template>