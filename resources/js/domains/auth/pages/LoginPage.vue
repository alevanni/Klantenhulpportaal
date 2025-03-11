<script setup lang="ts">
import LoginForm from '../../auth/components/LoginForm.vue';
import { isLoggedIn, login, loginRoute } from '../../../services/auth';
import { ref } from 'vue';
import Logout from '../../auth/components/Logout.vue';
const newCredentials = ref({ email: "", password: "" });
//const error = ref({});
const enter = async (credentials: any) => {
    // if i don't do try catch, it gives me a warn
    try {
        const { data } = await login(credentials);
    }
    catch (error) {
        console.log(error);
    }
}


function e(reason: any): PromiseLike<never> {
    throw new Error('Function not implemented.');
}
</script>

<template>
    <h1>Welcome to the client help portal.</h1>
    <LoginForm v-if="!isLoggedIn" :credentials="newCredentials" @credentials-submit="enter"></LoginForm>
    <RouterLink :to="{ name: 'ForgotPassword' }">Forgot your password?</RouterLink>

</template>