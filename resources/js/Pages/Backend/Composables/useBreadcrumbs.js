export const useBreadcrumbs = {
    AdminUser: {
        index: [
            {
                link: route("admin.dashboard"),
                text: "Dashboard",
            },
            {
                link: null,
                text: "Admin Users",
            },
        ],
        create: [
            {
                link: route("admin.dashboard"),
                text: "Dashboard",
            },
            {
                link: route("admin.adminusers.index"),
                text: "Admin Users",
            },
            {
                link: null,
                text: "Create",
            },
        ],
        edit: [
            {
                link: route("admin.dashboard"),
                text: "Dashboard",
            },
            {
                link: route("admin.adminusers.index"),
                text: "Admin Users",
            },
            {
                link: null,
                text: "Edit",
            },
        ],
    },
    Role: {
        index: [
            {
                link: route("admin.dashboard"),
                text: "Dashboard",
            },
            {
                link: null,
                text: "Roles",
            },
        ],
        create: [
            {
                link: route("admin.dashboard"),
                text: "Dashboard",
            },
            {
                link: route("admin.roles.index"),
                text: "Roles",
            },
            {
                link: null,
                text: "Create",
            },
        ],
        edit: [
            {
                link: route("admin.dashboard"),
                text: "Dashboard",
            },
            {
                link: route("admin.roles.index"),
                text: "Roles",
            },
            {
                link: null,
                text: "Edit",
            },
        ],
    },
    User: {
        index: [
            {
                link: route("admin.dashboard"),
                text: "Dashboard",
            },
            {
                link: null,
                text: "Users",
            },
        ],
        create: [
            {
                link: route("admin.dashboard"),
                text: "Dashboard",
            },
            {
                link: route("admin.users.index"),
                text: "Users",
            },
            {
                link: null,
                text: "Create",
            },
        ],
        edit: [
            {
                link: route("admin.dashboard"),
                text: "Dashboard",
            },
            {
                link: route("admin.users.index"),
                text: "Users",
            },
            {
                link: null,
                text: "Edit",
            },
        ],
    },
    Blog: {
        index: [
            {
                link: route("admin.dashboard"),
                text: "Dashboard",
            },
            {
                link: null,
                text: "Blogs",
            },
        ],
        create: [
            {
                link: route("admin.dashboard"),
                text: "Dashboard",
            },
            {
                link: route("admin.blogs.index"),
                text: "Blogs",
            },
            {
                link: null,
                text: "Create",
            },
        ],
        edit: [
            {
                link: route("admin.dashboard"),
                text: "Dashboard",
            },
            {
                link: route("admin.blogs.index"),
                text: "Blogs",
            },
            {
                link: null,
                text: "Edit",
            },
        ],
    },
};
