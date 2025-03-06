<script setup lang="ts">
import { ref } from 'vue';


const { token, user, newPassword } = defineProps(["token", "user", "newPassword"]);

const userCopy = ref({ ...user });
</script>
<template>
    <form>
        <table>

            <tr>
                <td><label for="new-password">New Password:</label></td>
                <td><input v-model="newPassword.password"></td>
            </tr>
            <tr>
                <td><label for="confirm-password">Confirm Password:</label></td>
                <td><input v-model="newPassword.password_confirmation"></td>
            </tr>
            <tr>
                <input type="hidden" id="token" name="token" value="{{token}}" />
            </tr>
            <tr>
                <td><input id="submit" type="submit"></td>
            </tr>
        </table>
    </form>
    {{ token }}
    {{ user }}
</template>