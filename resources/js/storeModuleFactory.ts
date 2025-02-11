import { computed, Ref, ref } from "vue";
import {
    deleteRequest,
    getRequest,
    postRequest,
    updateRequest,
} from "./services/http/index";

type State<T extends { id: number }> = Ref<{ [id: number]: Readonly<T> }>;

export const storeModuleFactory = <T extends { id: number }>(
    moduleName: any
) => {
    const state: State<T> = ref({});

    const getters = {
        // Met "all" kunnen we de gegevens als computed value uit de state halen,
        // wat voor reactiviteit tussen componenten en state zorgt.
        all: computed(() => Object.values(state.value)),

        // Met "byId" kunnen we een specifiek item als computed value uit de state halen,
        // wat voor reactiviteit tussen componenten en state zorgt.
        byId: (id: number) => computed(() => state.value[id]),
    };

    const setters = {
        // met setAll() kunnen we data, wat uit de backEnd komt, in de state zetten op basis van id
        setAll: (items: any[]) => {
            items.forEach((item) => {
                state.value[item.id] = item;
            });
        },
        setById: (id: number, item: any) => {
            state.value[id] = item;
        },
        deleteById: (id: number) => {
            delete state.value[id];
        },
    };

    const actions = {
        getAll: async () => {
            // Simuleer een oproep naar een API, mbv de Axios facade
            const { data } = await getRequest(moduleName);
            if (!data) return;
            setters.setAll(data);
        },
        create: async (newData: any) => {
            // Axios api post request
            const { data } = await postRequest(moduleName, newData);
            if (!data) return;
            setters.setAll(data);
        },
        deleteItemById: async (id: number) => {
            // Axios api delete request
            const { data } = await deleteRequest(moduleName + "/" + id, id);
            if (!data) return;
            setters.deleteById(id);
        },
        updateItem: async (updatedData: any) => {
            // axios put request
            const { data } = await updateRequest(
                moduleName + "/" + updatedData.id,
                updatedData
            );
            if (!data) return;
            setters.setById(updatedData.id, updatedData);
        },
    };

    return {
        getters,
        actions,
    };
};
