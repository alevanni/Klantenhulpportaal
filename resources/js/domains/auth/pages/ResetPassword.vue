<script setup lang="ts">
import { useRoute } from 'vue-router';
import ResetPasswordForm from '../../auth/components/ResetPasswordForm.vue';
import { getUserByToken } from '../../../services/auth';
import { Ref, ref } from 'vue';
import { User } from '../../types';
const user = ref({});
const newPassword = ref({ password: "", password_confirmation: "" });
const token = useRoute().params.token;
const setup = async () => {

    if (typeof token === 'string') {
        user.value = await getUserByToken(token);
    }
}
setup();
//
console.log(user.value);
</script>
<template>
    <div v-if="user.firstName !== undefined">
        <h1>Hello {{ user.firstName }}! reset your password here</h1>
        <ResetPasswordForm :token="token" :user="user" :newPassword="newPassword"></ResetPasswordForm>
    </div>

</template>