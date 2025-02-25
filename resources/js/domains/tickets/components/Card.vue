<script setup lang="ts">

const { ticket } = defineProps(['ticket']);
</script>

<template>
    <div class="card">
        <h3><RouterLink :to="{ name: 'tickets.show',  params: { id: ticket.id } }">{{ ticket.title }}</RouterLink>  - {{ ticket.created_by }}</h3>
        <p>{{ ticket.description }}</p>
    </div>

</template>