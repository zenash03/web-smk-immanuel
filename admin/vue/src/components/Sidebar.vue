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
                    <router-link to="/magang/pendaftar" class="aside-link"><i class="fas fa-user-check"></i> Pendaftar Magang</router-link>
                    <router-link to="/magang/daftarkan-perusahaan" class="aside-link"><i class="fas fa-folder-plus"></i> Ajukan Perusahaan Baru</router-link>
                    <router-link to="/magang/daftar-perusahaan" class="aside-link"><i class="fas fa-list-ul"></i> List Perusahaan</router-link>
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
        }
    },
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

.title {
    color: black;
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

.aside-link {
    min-width: 100% !important;
    padding: 1em 2em;
    transition: .4s;
    cursor: pointer;
    color: black;
}

.aside-link:hover {
    text-decoration: none;
}

.aside main ul a {
    transition: .4s;
}

.aside main ul a i {
    text-align: center;
    width: 16px;
    color: lightgray;
    margin-right: 1rem;
}

.aside main ul a:hover, .router-link-active {
    background-color: #f5f7fd;
    color: var(--primary-blue-hover);
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