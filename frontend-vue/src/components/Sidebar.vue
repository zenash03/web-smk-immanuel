<template>
    <aside class="sidebar border-r border-dark-25">
        <router-link to="" class="h-24 px-4 flex items-center justify-between border-b border-dark-25">
            <img src="../assets/img/logo.png" alt="" class="w-14" />
            <div>
                <p class="text-h7 font-h1">SMK Immanuel</p>
                <p class="text-caption">Smart, Wise, Accountable</p>
            </div>
        </router-link>

        <nav class="sidebar-nav text-dark-100 text-body">
            <ul class="menu">
                <li>
                    <a role="button" class="dropdown">
                        <span class="icon"><font-awesome-icon icon="fa-solid fa-briefcase" /></span>
                        <span class="text">Magang</span>
                        <span class="arrow"><font-awesome-icon icon="fa-solid fa-angle-down" /></span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <router-link to=""
                                ><span class="icon"><font-awesome-icon icon="fa-solid fa-info" /></span>
                                <span class="text">Info Magang</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link to=""
                                ><span class="icon"><font-awesome-icon icon="fa-solid fa-folder-plus" /></span>
                                <span class="text">Ajukan Perusahaan Baru</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link to=""
                                ><span class="icon"><font-awesome-icon icon="fa-solid fa-list-ul" /></span>
                                <span class="text">List Perusahaan</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link to=""
                                ><span class="icon"><font-awesome-icon icon="fa-solid fa-wrench" /></span>
                                <span class="text">Edit Data Perusahaan</span>
                            </router-link>
                        </li>
                    </ul>
                </li>
                <li>
                    <router-link to="">
                        <span class="icon"><font-awesome-icon icon="fa-solid fa-id-card" /></span>
                        <span class="text">Kartu Pelajar</span>
                    </router-link>
                </li>
                <li>
                    <a role="button" class="dropdown">
                        <span class="icon"><font-awesome-icon icon="fa-solid fa-calendar" /></span>
                        <span class="text">Event</span>
                        <span class="arrow"><font-awesome-icon icon="fa-solid fa-angle-down" /></span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <router-link to=""
                                ><span class="icon"><font-awesome-icon icon="fa-solid fa-calendar-days" /></span>
                                <span class="text">List Event</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link to=""
                                ><span class="icon"><font-awesome-icon icon="fa-solid fa-calendar-plus" /></span>
                                <span class="text">Buat Event</span>
                            </router-link>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </aside>
</template>

<script>
export default {
    name: "Sidebar",
    methods: {
        toggleLink(e) {
            e.preventDefault();
            e.target.closest("a").classList.toggle("text-primary-light-blue");
        },
        toggleSubmenu(e) {
            e.target.closest("li").querySelector(".submenu").classList.toggle("show");
        },
    },
    mounted() {
        var navBtns = document.querySelectorAll(".sidebar li a");

        navBtns.forEach(function (navBtn) {
            if (navBtn.classList.contains("dropdown")) {
                navBtn.addEventListener("click", function (e) {
                    e.target.closest("li").querySelector(".submenu").classList.toggle("show");
                });
            } else {
                navBtn.addEventListener("click", function (e) {
                    var navActiveBtn = document.querySelector(".sidebar .menu .text-primary-light-blue");

                    if (navActiveBtn != null) {
                        navActiveBtn.closest("li").classList.remove("bg-light-100");
                        navActiveBtn.classList.remove("text-primary-light-blue");
                    }

                    e.target.closest("li").classList.toggle("bg-light-100");
                    e.target.closest("a").classList.toggle("text-primary-light-blue");
                });
            }
        });
    },
};
</script>

<style scoped>
.sidebar {
    width: 18rem;
    background-color: white;
}

.sidebar sidebar-nav {
    overflow-y: auto;
}

.sidebar .sidebar-nav li {
    margin-top: 0.25rem;
}

.sidebar .sidebar-nav a {
    padding: 0.75rem 0;
    display: flex;
    align-items: center;
    transition: 0.3s ease;
}

.sidebar .sidebar-nav a .icon {
    width: 3.5rem;
    text-align: center;
}

.sidebar .sidebar-nav a .arrow {
    margin-right: 1rem;
    margin-left: auto;
}

.sidebar .sidebar-nav .submenu {
    overflow-y: hidden;
    max-height: 0;
    transition: 0.3s ease;
}

.sidebar .sidebar-nav .submenu li a {
    padding-left: 1rem;
}

.sidebar .sidebar-nav .submenu.show {
    max-height: 100%;
}
</style>
