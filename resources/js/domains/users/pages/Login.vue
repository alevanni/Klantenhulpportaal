<script setup lang="ts">
import { log } from 'console';
import LoginForm from './../components/LoginForm.vue';
//import { login, getLoggedUser } from './store';
import { login } from './../../../services/auth/index';
import { ref } from 'vue';
import Me from './../components/Me.vue';
import Logout from './../components/Logout.vue';
const newCredentials = ref({ email: "", password: "" })
const enter = async (credentials: any) => {
    //console.log(credentials);
    await login(credentials);

}
</script>

<template>
    <h1>Hello World!</h1>
    <LoginForm :credentials="newCredentials" @credentials-submit="enter"></LoginForm>
    <Logout></Logout>

</template>