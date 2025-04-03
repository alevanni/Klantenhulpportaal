<script setup lang="ts">
import { ref } from 'vue';

const { user } = defineProps(['user']);
const emit = defineEmits(['cancel', 'submit']);
const userCopy = ref({ ...user });
const cancel = () => {
    emit('cancel');
}

const submitUser = () => {
    emit('submit', userCopy.value);
}

</script>

<template>
    <form class="edit-user-form" @submit.prevent="submitUser">
        <table>
            <tbody>
                <tr class="edit-user-row">
                    <td class="table-id">{{ user.id }}</td>
                    <td class="table-name"><input class="text-input" v-model="userCopy.firstName"></td>
                    <td class="table-name"><input class="text-input" v-model="userCopy.lastName"></td>
                    <td class="table-email"><input class="text-input" v-model="userCopy.email"></td>
                    <td class="table-role"><select v-model="userCopy.isAdmin">
                            <option value="1">
                                Admin
                            </option>
                            <option value="0">
                                Basic
                            </option>
                        </select></td>
                    <td class="table-telephone"><input class="text-input" v-model="userCopy.telephone"></td>
                    <td class="table-button"><input type="submit" class="send" value="&#128190; Save"><button
                            class="send" @click.prevent="cancel">&#10060; Cancel</button></td>
                </tr>
            </tbody>
        </table>
    </form>


</template>