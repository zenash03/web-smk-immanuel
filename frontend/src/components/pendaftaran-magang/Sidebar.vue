<template>
    <div class="aside-parent">
        <div class="aside" ref="aside">
            <header>
                <div class="container d-flex align-items-center">
                    <img src="@/assets/images/logo.png">

                    <div class="detail">
                        <h5 class="title">SMK Immanuel</h5>
                        <p>Smart, Wise, Accountable</p>
                    </div>
                </div>
            </header>

            <main>
                <ul>
                    <li class="mb-1">
                        <a @click="toggleSubmenu" class="aside-link has-sub"><i class="fas fa-briefcase"></i> Magang</a>

                        <ul class="submenu" ref="magang">
                            <router-link to="/dashboard/magang/info" class="aside-link"><i class="fas fa-info"></i> Info Magang</router-link>
                            <router-link to="/dashboard/magang/daftarkan-perusahaan" class="aside-link"><i class="fas fa-folder-plus"></i> Ajukan Perusahaan Baru</router-link>
                            <router-link to="/dashboard/magang/daftar-perusahaan" class="aside-link"><i class="fas fa-list-ul"></i> List Perusahaan</router-link>
                            <router-link to="/dashboard/magang/edit-perusahaan" class="aside-link"><i class="fas fa-wrench"></i> Edit Data Perusahaan</router-link>
                        </ul>
                    </li>

                    <li class="mb-1">
                        <router-link to="/dashboard/kartu-pelajar" class="aside-link"><i class="fas fa-id-card"></i> Kartu Pelajar</router-link>
                    </li>
                </ul>

                <button type="button" class="button-menu" @click="toggleMenu"><span>></span></button>
            </main>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            
        }
    },
    methods: {
        toggleMenu() {
            this.$refs.aside.classList.toggle('show');
        },
        toggleSubmenu() {
            this.$refs.magang.classList.toggle('open');
        }
    }
}
</script>

<style scoped>

header {
    padding: 0 1rem;
    border-bottom: 1px solid rgba(0, 0, 0, .1);
}

header img {
    width: 60px;
    height: 80px;
}

header .detail {
    margin-left: 1rem;    
}

.detail h5 {
    font-weight: 500;
    margin-bottom: 5px;  
}

.detail p {
    margin: 0;
    font-size: 12px;
}

.aside-parent {
    z-index: 1000;
}

.aside {
    min-height: 100vh;
    height: 100%;
    min-width: 300px;
    background-color: #ffffff;
    box-shadow: 0px 0px 28px 0px rgb(82 63 105 / 8%);
    z-index: 10000;
    transition: .4s;
}

.aside header .container {
    padding: 1rem .5rem;
    height: 100px;
}

.aside main {
    height: fit-content;
    padding: 2rem 0;
}

.aside main ul {
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
}

.aside main ul li {
    width: 100%;
}

.aside main ul a i {
    text-align: center;
    width: 16px;
    color: lightgray;
    margin-right: 1rem;
}

.aside main ul a:hover, .router-link-active {
    background-color: #f5f7fd;
    color: var(--primary-blue-hover) !important;
}

.aside-link {
    display: block;
    min-width: 100% !important;
    font-size: 14px;
    padding: 1em 2em;
    transition: .4s;
    cursor: pointer;
    color: black;
}

.aside-link:hover {
    text-decoration: none;
}

img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.button-menu {
    display: none;
    border: none;
    background-color: #b4d7ff;
    padding: .5em 1em;
    border-radius: 0 5px 5px 0;
    font-size: 1rem;
    transition: .4s;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: -40.5px;
}

.mobile {
    display: none;
}

.desktop {
    display: block;
}

.has-sub {
    position: relative;
}

.has-sub::after {
    color: #ccc;
    content: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><path style="fill:none;stroke:gray;stroke-width:1" d="m6 9 6 6 6-6"/></svg>');
    display: block;
    position: absolute;
    right: 30px;
    top: 55%;
    transform: translateY(-50%);
}

.submenu {
    max-height: 0;
    overflow: hidden;
    padding-left: 5% !important;
    transition: .5s;
}

.submenu.open {
    max-height: 500px;
}

@media screen and (max-width: 991px) {
    .detail h5 {
        font-size: 1rem;
    }

    .detail p {
        font-size: .7rem;
    }
}

@media screen and (max-width: 768px) {
    .desktop {
        display: none;
    }

    .mobile {
        display: block;
    }

    .aside {
        position: fixed;
        left: -300px;
    }

    .aside.show {
        left: 0;
    }

    .aside.show .button-menu span {
        display: block;
        transform: rotate(180deg);
    }

    .aside ul a {
        font-size: .9rem;
    }

    .button-menu {
        display: block;
    }
}

@media screen and (max-width: 375px) {
    .aside {
        min-width: 100px;
        width: 270px;
        left: -270px;
    }

    .aside ul a {
        font-size: .8rem;
    }

    header {
        padding: 0 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, .1);
    }

    header img {
        width: 40px;
        height: 60px;
    }

    .detail h5 {
        font-weight: 500;
        margin-bottom: 5px;  
        font-size: 1rem;
    }

    .detail p {
        margin: 0;
        font-size: 12px;
    }
}

</style>