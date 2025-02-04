<script setup lang="ts">
import { ref } from 'vue';


const emit = defineEmits(['credentialsSubmit']);
const { credentials } = defineProps(['credentials']);
const credentialsCopy = ref({ ...credentials });
const submitLoginForm = () => {
    emit('credentialsSubmit', credentialsCopy.value);
}
</script>

<template>
    <form @submit.prevent="submitLoginForm">
        <table>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input id="email" v-model="credentialsCopy.email"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input id="password" v-model="credentialsCopy.password"></td>
            </tr>
            <tr>
                <td><input id="submit" type="submit"></td>
            </tr>
        </table>
    </form>
    {{ credentialsCopy }}
</template>