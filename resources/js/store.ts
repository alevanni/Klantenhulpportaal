import axios from "axios";
import { computed, ref } from "vue";

const user = ref({});
export const getUser = () => computed(() => user.value);

export const getLoggedUser = async () => {
    const { data } = await axios.get("/api/me");
    if (!data) return;
    user.value = data.data;
    console.log(data);
}

export const logout = async () => {
    const { data } = await axios.get("/api/logout");
    if (!data) return;
    user.value = {};
}


export const login = async (credentials: any) => {
    axios.get("/sanctum/csrf-cookie").then((response) => {
        // Login...
    });
    const { data } = await axios.post("/api/login", credentials);
    if (!data) return;
    user.value = data.data;
    console.log(user.value);
};
