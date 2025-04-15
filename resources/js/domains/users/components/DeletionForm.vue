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
    <form @submit="">
        <table>
            <tbody>
                <tr>
                    <td><button @click.prevent="canc">No, I changed my mind</button></td>
                    <td><button @click.prevent="submit">Yes, delete them</button></td>
                </tr>
            </tbody>

        </table>


    </form>
</template>