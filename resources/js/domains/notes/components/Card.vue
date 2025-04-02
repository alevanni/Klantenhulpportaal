<script setup lang="ts">
import { ref } from 'vue';
import { getLoggedInUser } from '../../../services/auth';
import { userStore } from '../../users/routes';
import { noteStore } from '../routes';
import NoteForm from './Form.vue';
const { note } = defineProps(['note']);
const edit = ref(0);

const editNote = () => {
    edit.value = edit.value + 1;

}

const closeForm = () => {
    edit.value = edit.value + 1;

}

const updateNote = async (note: any) => {
    try {
        await noteStore.actions.update(note.id, note);
        edit.value = edit.value + 1;
    }
    catch (e) {
        console.log(e);
    }

}
const deleteNote = async (id: number) => {
    try {
        await noteStore.actions.delete(id);
    }
    catch(e) {
        console.log(e);
    }
    
}
</script>

<template>
    <tr>
        <td v-if="(edit % 2 === 0)"><span class="comment-author">{{
            userStore.getters.byId(note.created_by).value?.firstName + ' ' +
            userStore.getters.byId(note.created_by).value?.lastName }} on {{ new
                    Intl.DateTimeFormat("en-GB").format(new Date(note.created_on)) }} </span>: {{ note.body
                }}<button v-if="note.created_by === getLoggedInUser().id" class="edit-link" @click="editNote">&#128393; Edit
                </button>
                <button v-if="note.created_by === getLoggedInUser().id" class="edit-link" @click="deleteNote(note.id)"> &#128465;  Delete 
                    </button></td>
        <td v-else>
            <NoteForm :note="note" @submit-note="updateNote" @close="closeForm()"></NoteForm>
        </td>
    </tr>
</template>