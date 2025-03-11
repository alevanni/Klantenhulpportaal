<script setup lang="ts">
const { user } = defineProps(['user']);
</script>

<template>
    <div class="card">
        <h2>{{ user.firstName + ' ' + user.lastName }}</h2>
        <h3 class="badge" :class="[user.isAdmin ? 'admin' : 'basic']">{{ user.isAdmin ? "Admin" : "Basic User" }}</h3>
    </div>
</template>