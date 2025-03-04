<script setup lang="ts">
import { ref } from 'vue';

const { email } = defineProps(['email']);
const emit = defineEmits(['emailSubmit']);
const emailCopy = ref(email);
const requestResetLink = () => {
    emit('emailSubmit', emailCopy.value);
}

</script>

<template>
    <form @submit.prevent="requestResetLink">
        <table>
            <tr>
                <td><label for="email">Your email</label></td>
                <td><input id="email" v-model="emailCopy"></input></td>
                <td>
                <td><input id="submit" type="submit"></td>
                </td>
            </tr>
        </table>
    </form>
</template>