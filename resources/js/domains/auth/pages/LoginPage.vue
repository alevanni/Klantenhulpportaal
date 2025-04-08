<script setup lang="ts">
import { login } from '../../../services/auth';
import { ref } from 'vue';
import { LoginCredentials } from '../../../services/auth/types';

const newCredentials = ref<LoginCredentials>({ email: "", password: "", rememberMe: false });

const submitLogin = async () => {
    try {
        await login(newCredentials.value);
    } catch (error) {
        console.log(error);
    }
}
</script>

<template>
    <h1>Welcome to the client help portal.</h1>
    <form>
        <table>
            <tbody>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input id="email" v-model="newCredentials.email"></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input id="password" v-model="newCredentials.password"></td>
                </tr>
                <tr>
                    <td><button @click.prevent="submitLogin">Submit</button></td>
                </tr>
            </tbody>
        </table>
    </form>
    <ul>
        <li>
            <RouterLink :to="{ name: 'ForgotPassword' }">Forgot your password?</RouterLink>
        </li>
        <li>
            <RouterLink :to="{ name: 'Register' }">Register</RouterLink>
        </li>
    </ul>


</template>