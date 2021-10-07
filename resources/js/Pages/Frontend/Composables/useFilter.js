import { reactive, computed } from "@vue/runtime-core";

// Global State
const state = reactive({
    filter: "",
});

export const useFilter = () => {
    const setFilter = (filter) => {
        state.filter = filter;
    };

    const getFilter = computed(() => state.filter);

    return { setFilter, getFilter };
};
