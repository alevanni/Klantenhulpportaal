<script setup lang="ts">
import { ref } from 'vue';

const { note } = defineProps(['note']);
const noteCopy = ref({ ...note });

const emit = defineEmits(['submitNote', 'close']);

const submitForm = (ticket: any) => {
    emit('submitNote', noteCopy.value);

}
const close = () => {
    emit('close');
}
</script>

<template>

    <form @submit.prevent="submitForm">
        <table class="new-comment">
            <thead>
                <tr>
                    <th v-if="(!note.body)" colspan="2">
                        Write a new note:
                    </th>
                    <th v-else colspan="2">Edit your note:</th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td colspan="2"> <textarea class="comment-text" v-model="noteCopy.body"></textarea></td>
                </tr>
                <tr>
                    <td><input class="send" type="submit" value="&#128190; Save">
                    </td>
                    <td v-if="(note.body)"><button class="send" @click="close">&#10060; Cancel</button></td>
                </tr>
            </tbody>
        </table>
    </form>

</template>