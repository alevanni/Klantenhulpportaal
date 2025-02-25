<script setup lang="ts">
import Logout from './domains/users/components/Logout.vue';
import { isLoggedIn } from './services/auth';



</script>

<template>
    <nav v-if="isLoggedIn" class="app-vue-element app-nav">


        <ul>
            <li>
                <RouterLink :to="{ name: 'tickets.overview' }">Overview of tickets</RouterLink>
            </li>
            <li>
                <RouterLink :to="{ name: 'tickets.create' }">New Ticket</RouterLink>
            </li>
            <li>
                <Logout></Logout>
            </li>
        </ul>

    </nav>

    <RouterView />


</template>