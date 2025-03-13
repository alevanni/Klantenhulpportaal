<script setup lang="ts">

const { name } = defineProps(['name']);
</script>

<template>
    <span class="category-badge">#{{ name }}</span>
</template>