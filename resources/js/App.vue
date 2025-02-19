<script setup lang="ts">
import { isLoggedIn } from './services/auth';



</script>

<template>
    <nav v-if="isLoggedIn" class="app-vue-element app-nav">
        
        <!---<RouterLink :to="{name: 'tickets.overview'}">Overview of tickets</RouterLink> -->
        

    </nav>
    <RouterView />


</template>