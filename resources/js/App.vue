<script setup lang="ts">
import { log } from 'console';
import LoginForm from './LoginForm.vue';
import { login, getLoggedUser } from './store';
import { ref } from 'vue';
import Me from './Me.vue';
import Logout from './Logout.vue';

const newCredentials = ref({ email: "", password: "" })
const enter = async (credentials: any) => {
    //console.log(credentials);
    await login(credentials);

}

</script>

<template>
    <nav class="app-vue-element app-nav">
        <RouterLink to="/tickets">Overview of tickets</RouterLink>
        <RouterLink to="/tickets/create">Create a new ticket</RouterLink>

    </nav>
    <RouterView />
    <h1>Hello World!</h1>
    <LoginForm :credentials="newCredentials" @credentials-submit="enter"></LoginForm>
    <Me></Me>
    <Logout></Logout>
</template>