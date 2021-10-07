import { reactive, computed } from "vue";

export const useShowForm = () => {
    // Local State
    const state = reactive({
        show: false,
    });

    const setShowForm = () => {
        state.show = !state.show;
    };

    const getShowForm = computed(() => state.show);

    return { getShowForm, setShowForm };
};
