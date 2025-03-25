<script setup lang="ts">
import { categoryStore } from '../routes';

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
    <h1>Do you want to cancel {{ categoryStore.getters.byId(form).value.name }}?</h1>
    <form>
        <button @click="canc">Cancel</button>
        <button @click="submit">Submit</button>
    </form>
</template>