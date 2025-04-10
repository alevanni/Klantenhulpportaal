<script setup lang="ts">
import { useRoute } from 'vue-router';
import ResetPasswordForm from '../../auth/components/ResetPasswordForm.vue';
import { getUserByToken, resetPassword } from '../../../services/auth';
import { Ref, ref } from 'vue';
import { User } from '../../types';
const user: Ref<undefined | User> = ref();
const newPassword = ref({ password: "", password_confirmation: "" });
const token = useRoute().params.token;
const setup = async () => {

    if (typeof token === 'string') {
        user.value = await getUserByToken(token);
    }
}
setup();



const updatePassword = async (token: string, email: string, newPassword: string, password_confirmation: string) => {

    try {
        const { data } = await resetPassword({
            email: email,
            password: newPassword,
            password_confirmation: password_confirmation,
            token: token
        });
    }
    catch (error) {
        console.log(error);
    }
}
</script>
<template>
    <div v-if="user">
        <h1>Hello {{ user.firstName }}! reset your password here</h1>
        <ResetPasswordForm :token="token" :user="user" :newPassword="newPassword" @updatePassword="updatePassword">
        </ResetPasswordForm>
    </div>

</template>