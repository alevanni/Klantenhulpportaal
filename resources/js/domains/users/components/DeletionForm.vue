<script setup lang="ts">
import { userStore } from '../routes';

const emit = defineEmits(['submit', 'cancel']);
const { form } = defineProps(['form']);
const canc = () => {
    emit('cancel');
}
const submit = () => {
    emit('submit', form);
}
</script>

<template>
    <h1>Do you want to delete the user "{{ userStore.getters.byId(form).value?.firstName + ' ' +
        userStore.getters.byId(form).value?.lastName }}"?</h1>
    <form @submit.prevent="">
        <table>
            <tbody>
                <tr>
                    <td><button @click="canc">No, I changed my mind</button></td>
                    <td><button @click="submit">Yes, delete it</button></td>
                </tr>
            </tbody>

        </table>


    </form>
</template>