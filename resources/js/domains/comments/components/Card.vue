<script setup lang='ts'>
const { comment } = defineProps(['comment']);
import { ref } from 'vue';
import { commentStore } from '../routes';
import CommentForm from './CommentForm.vue';
import { userStore } from '../../users/routes';
import { getLoggedInUser } from '../../../services/auth';
const edit = ref(0);

const editComment = () => {
    edit.value = edit.value + 1;

}

const closeForm = () => {
    edit.value = edit.value + 1;

}
const updateComment = async (comment: any) => {
    try {
        await commentStore.actions.update(comment.id, comment);
        edit.value = edit.value + 1;
    }
    catch (e) {
        console.log(e);
    }

}
</script>

<template>
    <tr>
        <td v-if="(edit % 2 === 0)"><span class="comment-author">{{
            userStore.getters.byId(comment.created_by).value?.firstName +
            ' ' +
            userStore.getters.byId(comment.created_by).value?.lastName + " on " + new
                Intl.DateTimeFormat("en-GB").format(new Date(comment.created_on)) }}:</span> <br>{{
                    comment.body }} <button v-if="comment.created_by === getLoggedInUser().id" class="edit-link"
                @click="editComment">Edit &#128393;</button></td>
        <td v-else>
            <CommentForm :comment="comment" @submit-comment="updateComment" @close="closeForm"></CommentForm>
        </td>
    </tr>
</template>