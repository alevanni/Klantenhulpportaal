<script setup lang="ts">
import { ref } from 'vue';

const { category } = defineProps(['category']);
const categoryCopy = ref({ ...category });
const emit = defineEmits(['categorySubmit']);
const submitCategoryForm = () => {
    emit('categorySubmit', categoryCopy.value);
}
</script>

<template>
    <form @submit.prevent="submitCategoryForm">
        <table>
            <tbody>
                <tr>
                    <td><label for="name">Name:</label></td>
                    <td><input id="name" type="text" v-model="categoryCopy.name"></td>
                    <td><input type="submit" value="&#128190; Save"></td>
                </tr>
            </tbody>
        </table>
    </form>

</template>