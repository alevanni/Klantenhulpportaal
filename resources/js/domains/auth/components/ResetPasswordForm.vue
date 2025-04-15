<script setup lang="ts">
import { ref } from 'vue';


const { token, user, newPassword } = defineProps(["token", "user", "newPassword"]);
const emit = defineEmits(['updatePassword']);
const passwordCopy = ref({ ...newPassword });
function submitNewPassword() {

    emit('updatePassword', token, user.email, passwordCopy.value.password, passwordCopy.value.password_confirmation);
}
</script>
<template>
    <form @submit.prevent="submitNewPassword">
        <table>
            <tbody>
                <tr>
                    <td><label for="new-password">New Password:</label></td>
                    <td><input v-model="passwordCopy.password"></td>
                </tr>
                <tr>
                    <td><label for="confirm-password">Confirm Password:</label></td>
                    <td><input v-model="passwordCopy.password_confirmation"></td>
                </tr>
                <tr>
                    <td> <input type="hidden" id="token" name="token" v-bind:value="{ token }" /> </td>
                </tr>
                <tr>
                    <td><input id="submit" type="submit"></td>
                </tr>
            </tbody>
        </table>
    </form>

</template>