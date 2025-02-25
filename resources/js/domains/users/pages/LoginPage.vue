<script setup lang="ts">
import LoginForm from '../components/LoginForm.vue';
import { isLoggedIn, login, loginRoute } from '../../../services/auth';
import { ref } from 'vue';
import Logout from '../components/Logout.vue';
const newCredentials = ref({ email: "", password: "" })
const enter = async (credentials: any) => {
    //console.log(credentials);
    await login(credentials);

}

</script>

<template>
    <h1>Welcome to the client help portal.</h1>
    <LoginForm v-if="!isLoggedIn" :credentials="newCredentials" @credentials-submit="enter"></LoginForm>

</template>