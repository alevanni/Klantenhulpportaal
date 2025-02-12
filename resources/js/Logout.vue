<script setup lang="ts">
import { ref } from 'vue';
//import { getLoggedUser, getUser, logout } from './store';
import { logout } from './services/auth/index';

</script>

<template>
    <button @click="logout">Logout</button>
    
</template>