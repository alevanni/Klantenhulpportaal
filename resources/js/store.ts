import axios from "axios";
import { ref } from "vue";

const user = ref({});
export const getLoggedUser = () => user.value;
export const login = async (credentials: any) => {
    axios.get("/sanctum/csrf-cookie").then((response) => {
        // Login...
    });
    const { data } = await axios.post("/api/login", credentials);
    if (!data) return;
    user.value = data;
    console.log(data);
};
