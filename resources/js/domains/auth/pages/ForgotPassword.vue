<script setup lang="ts">
import { ref } from 'vue';
import { sendResetPasswordEmail } from '../../../services/auth';
import EmailForm from '../components/EmailForm.vue';
const email = ref("");

const sendLink = async (email: string) => {
    console.log("hi!")
    const { data } = await sendResetPasswordEmail(email);
    console.log(data)

}
</script>
<template>

    <h1>Did you forget your password?</h1>
    <h2>Tell us your email and we will send you a link to re-set it</h2>
    <EmailForm :email="email" @email-submit="sendLink"></EmailForm>

</template>