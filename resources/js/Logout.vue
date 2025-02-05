<script setup lang="ts">
import { ref } from 'vue';
import { getLoggedUser, getUser, logout } from './store';


</script>

<template>
    <button @click="logout">Logout</button>
    
</template>