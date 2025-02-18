<script setup lang="ts">

import { checkIfLoggedIn, getLoggedInUser, isLoggedIn } from '../../../services/auth/index';
import { goToLoginPage } from '../../../services/auth/index';
import { goToOverviewPage } from '../../../services/router/index';
isLoggedIn;
const updateInfo = async () => {
    await checkIfLoggedIn();

    if (!isLoggedIn.value) {
        goToLoginPage();

    }

}


</script>

<template>
    <button @click="updateInfo">Get the logged user</button>
    <p v-if="isLoggedIn">{{ getLoggedInUser() }}</p>
</template>