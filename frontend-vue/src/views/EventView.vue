<template>
    <div class="bg-light-75">
        <div class="w-full min-h-screen text-dark-100 flex">
            <aside class="sidebar border-r border-dark-25">
                <a href="" class="h-24 px-4 flex items-center justify-between border-b border-dark-25">
                    <img src="../assets/img/logo.png" alt="" class="w-14" />
                    <div>
                        <p class="text-h7 font-h1">SMK Immanuel</p>
                        <p class="text-caption">Smart, Wise, Accountable</p>
                    </div>
                </a>

                <nav class="sidebar-nav text-dark-100 text-body">
                    <ul class="menu">
                        <li>
                            <a role="button" class="dropdown" @click="toggleSubmenu($event)">
                                <span class="icon"><font-awesome-icon icon="fa-solid fa-briefcase" /></span>
                                <span class="text">Magang</span>
                                <span class="arrow"><font-awesome-icon icon="fa-solid fa-angle-down" /></span>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href=""
                                        ><span class="icon"><font-awesome-icon icon="fa-solid fa-info" /></span>
                                        <span class="text">Info Magang</span>
                                    </a>
                                </li>
                                <li>
                                    <a href=""
                                        ><span class="icon"><font-awesome-icon icon="fa-solid fa-folder-plus" /></span>
                                        <span class="text">Ajukan Perusahaan Baru</span>
                                    </a>
                                </li>
                                <li>
                                    <a href=""
                                        ><span class="icon"><font-awesome-icon icon="fa-solid fa-list-ul" /></span>
                                        <span class="text">List Perusahaan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href=""
                                        ><span class="icon"><font-awesome-icon icon="fa-solid fa-wrench" /></span>
                                        <span class="text">Edit Data Perusahaan</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="">
                                <span class="icon"><font-awesome-icon icon="fa-solid fa-id-card" /></span>
                                <span class="text">Kartu Pelajar</span>
                            </a>
                        </li>
                        <li>
                            <a role="button" class="dropdown" @click="toggleSubmenu($event)">
                                <span class="icon"><font-awesome-icon icon="fa-solid fa-calendar" /></span>
                                <span class="text">Event</span>
                                <span class="arrow"><font-awesome-icon icon="fa-solid fa-angle-down" /></span>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href=""
                                        ><span class="icon"><font-awesome-icon icon="fa-solid fa-calendar-days" /></span>
                                        <span class="text">List Event</span>
                                    </a>
                                </li>
                                <li>
                                    <a href=""
                                        ><span class="icon"><font-awesome-icon icon="fa-solid fa-calendar-plus" /></span>
                                        <span class="text">Buat Event</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </aside>

            <main class="flex-1 flex flex-col">
                <div class="h-24 px-16 flex items-center justify-end text-dark-50 bg-white">
                    <p class="text-h7 font-h7">Hai, <span class="font-bold">Jeki Gates</span></p>
                </div>

                <div class="px-16 py-16">
                    <div class="px-16 py-16 text-dark-50 bg-white rounded-lg">
                        <p class="text-h7 font-h7">Welcome, <span class="font-bold">Jeki Gates</span></p>
                    </div>
                </div>

                <div class="h-24 px-16 flex items-center justify-end text-dark-50 bg-white mt-auto">
                    <p class="font-body"><span class="font-bold">2021-2022</span> SMK IMMANUEL | Made with by IT CLUB</p>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
export default {
    name: "EventView",
    methods: {
        toggleSubmenu(e) {
            e.target.closest("li").querySelector(".submenu").classList.toggle("show");
        },
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
