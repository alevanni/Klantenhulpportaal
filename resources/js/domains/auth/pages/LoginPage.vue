<script setup lang="ts">
import LoginForm from '../../auth/components/LoginForm.vue';
import { isLoggedIn, login, loginRoute } from '../../../services/auth';
import { ref } from 'vue';
import Logout from '../../auth/components/Logout.vue';
const newCredentials = ref({ email: "", password: "" });
const error = ref({});
const enter = async (credentials: any) => {
    //console.log(credentials);
    const { data } = await login(credentials);
    console.log(data)
    if (data.error) {
        error.value = data;
    }
}

</script>

<template>
    <h1>Welcome to the client help portal.</h1>
    <LoginForm v-if="!isLoggedIn" :credentials="newCredentials" @credentials-submit="enter"></LoginForm>
    <RouterLink :to="{ name: 'ForgotPassword' }">Forgot your password?</RouterLink>
    <p>{{ error }} - TO DO</p>
</template>