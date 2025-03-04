<script setup lang="ts">
import Logout from './domains/auth/components/Logout.vue';
import { isLoggedIn, isAdmin, getLoggedInUser } from './services/auth';



</script>

<template>
    <nav v-if="isLoggedIn" class="app-vue-element app-nav">


        <ul>
            <li>
                Hi {{ getLoggedInUser().name }}
            </li>
            <li>
                <RouterLink :to="{ name: 'tickets.overview' }">Overview of tickets</RouterLink>
            </li>
            <li>
                <RouterLink :to="{ name: 'tickets.create' }">New Ticket</RouterLink>
            </li>
            <li>
                <RouterLink v-if="isAdmin" :to="{ name: 'users.overview' }">Users</RouterLink>
            </li>
            <li>
                <Logout></Logout>
            </li>

        </ul>

    </nav>

    <RouterView />


</template>