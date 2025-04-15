<script setup lang="ts">
import { ref } from 'vue';

const emit = defineEmits(['credentialsSubmit']);

const { credentials } = defineProps(['credentials']);

const credentialsCopy = ref({ ...credentials });

</script>

<template>
    <form @submit.prevent="emit('credentialsSubmit', credentialsCopy)">
        <table>
            <tbody>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input id="email" v-model="credentialsCopy.email"></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input id="password" v-model="credentialsCopy.password"></td>
                </tr>
                <tr>
                    <td><button id="submit" type="submit">asdasdsad</button></td>
                </tr>
            </tbody>
        </table>
    </form>

</template>