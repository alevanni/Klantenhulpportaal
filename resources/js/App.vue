<script setup lang="ts">
import { log } from 'console';
import LoginForm from './LoginForm.vue';
import { login, getLoggedUser } from './store';
import { ref } from 'vue';

const newCredentials = ref({ email: "", password: "" })
const enter = async (credentials: any) => {
    console.log(credentials);
    await login(credentials);

}

</script>

<template>
    <h1>Hello World!</h1>
    <LoginForm :credentials="newCredentials" @credentials-submit="enter"></LoginForm>
    {{ getLoggedUser() }}
</template>