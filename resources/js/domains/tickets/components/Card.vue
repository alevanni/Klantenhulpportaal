<script setup lang="ts">

const { ticket } = defineProps(['ticket']);
</script>

<template>
    <div class="card">
        <h3>{{ ticket.title }} - {{ ticket.created_by }}</h3>
        <p>{{ ticket.description }}</p>
    </div>

</template>