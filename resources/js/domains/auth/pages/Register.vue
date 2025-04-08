<script setup lang="ts">
import { ref } from 'vue';
import { userStore } from '../../users/routes';
import { goToLoginPage } from '../../../services/auth';
const newUser = ref({ first_name: '', last_name: '', email: '', password: '', telephone: '' });

const register = async (user: any) => {
    try {
        await userStore.actions.create(user);
        goToLoginPage();
    }
    catch (e) {
        console.log(e);
    }


}
</script>

<template>
    <h1>Register</h1>
    <form @submit.prevent="register(newUser)">
        <table class="register-table">
            <tbody>
                <tr>
                    <td><label for="first-name">First Name*</label></td>
                    <td><input id="first-name" v-model="newUser.first_name"></td>
                </tr>
                <tr>
                    <td><label for="last-name">Last Name*</label></td>
                    <td><input id="last-name" v-model="newUser.last_name" /></td>
                </tr>
                <tr>
                    <td><label for="email">Email*</label></td>
                    <td><input id="email" v-model="newUser.email" /></td>
                </tr>
                <tr>
                    <td><label for="password">Password*</label></td>
                    <td><input id="password" v-model="newUser.password" /></td>
                </tr>
                <tr>
                    <td><label for="telephone-number">Telephone number*</label></td>
                    <td><input id="telephone-number" v-model="newUser.telephone" /></td>
                </tr>
                <tr>
                    <td colspan="2"> <input type="submit" value="Register"></td>
                </tr>
            </tbody>
        </table>
    </form>
    <h6>The fields marked with * are mandatory</h6>
    {{ newUser }}
</template>