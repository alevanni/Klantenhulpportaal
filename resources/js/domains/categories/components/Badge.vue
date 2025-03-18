<script setup lang="ts">
import { categoryStore } from '../routes';
const { id } = defineProps(['id']);

</script>

<template>
    <span class="category-badge">#{{ categoryStore.getters.byId(id).value?.name }}</span>
</template>