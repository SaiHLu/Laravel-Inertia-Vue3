import { reactive, computed } from "@vue/runtime-core";

// Global State
const state = reactive({
    blogs: null,
});

export const useBlog = () => {
    const setBlogs = (blogs) => {
        state.blogs = blogs;
    };

    const getBlogs = computed(() => state.blogs);

    return { getBlogs, setBlogs };
};
