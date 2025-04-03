<script setup lang="ts">
import { ref } from 'vue';

const { comment } = defineProps(['comment']);
const commentCopy = ref({ ...comment });

const emit = defineEmits(['submitComment', 'close']);

const submitForm = (ticket: any) => {
    emit('submitComment', commentCopy.value);

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
                    <th v-if="(!comment.body)" colspan="2">
                        Your reply:
                    </th>
                    <th v-else colspan="2">Edit your comment:</th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td colspan="2"> <textarea class="comment-text" v-model="commentCopy.body"></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" :value="[(comment.body) ? '&#128190; Save ' : '&#128389; Send']"
                            class="send"></td>
                    <td v-if="(comment.body)"><button class="send" @click.prevent="close">&#10060; Cancel</button></td>
                </tr>
            </tbody>
        </table>
    </form>

</template>