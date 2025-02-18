<script setup lang="ts">




</script>

<template>
    <nav class="app-vue-element app-nav">
        <RouterLink to="/login">Login</RouterLink>
        <RouterLink to="/tickets">Overview of tickets</RouterLink>
        <RouterLink to="/tickets/create">Create a new ticket</RouterLink>

    </nav>
    <RouterView />


</template>