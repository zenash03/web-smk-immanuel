<template>
    <div>
        <nav>
            <header class="d-flex w-100 pt-3 pb-3">
                <div class="container d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-start">
                        <div class="logo">
                            <img src="@/assets/images/logo.png" alt="">
                        </div>

                        <div class="identity">
                            <h4 class="title">SMK Immanuel Pontianak</h4>
                            <p class="address">Jl. Letnan Jendral Sutoyo · (0561) 737921</p>
                        </div>
                    </div>

                    <div class="navbar">
                        <ul class="nav-links">
                            <li><router-link to="/" class="bold">Home</router-link></li>
                            <li><a href="/#news">Berita</a></li>
                            <li><a href="/#jurusan">Jurusan</a></li>
                            <li><a href="/#prestasi">Prestasi</a></li>
                            <li><a href="/#ekskul">Ekskul</a></li>
                            <li><router-link to="/login" class="align-self-end">Login</router-link></li>
                        </ul>
                    </div>

                    <button class="menu" @click="openMenu()">
                        <svg width="100" height="100" viewBox="0 0 100 100">
                            <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                            <path class="line line2" d="M 20,50 H 80" />
                            <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                        </svg>
                    </button>
                </div>

            </header>
            <div class="navbar navbar-mobile">
                <ul class="nav-links">
                    <li><router-link to="/" class="bold">Home</router-link></li>
                    <li><a href="/#news">Berita</a></li>
                    <li><a href="/#jurusan">Jurusan</a></li>
                    <li><a href="/#prestasi">Prestasi</a></li>
                    <li><a href="/#ekskul">Ekskul</a></li>
                    <li><router-link to="/login" class="align-self-end">Login</router-link></li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            
        }
    },
    methods: {
        openMenu() {
            const button = document.querySelector('button.menu');
            const navbar = document.querySelector('.navbar-mobile');

            button.classList.toggle('opened');
            navbar.classList.toggle('opened');
        }
    },
}
</script>

<style scoped>

nav .logo {
    width: 80px;
    height: 100px;
    transform: scale(0);
    animation: zoom-in .5s 1s forwards;
}

nav .logo img {
    object-fit: contain;
}

nav .identity {
    display: flex;
    justify-content: center;
    flex-direction: column;
    width: 100%;
    margin-left: 1.5rem;
    opacity: 0;
    transform: translateY(-200%);
    animation: pop-up .5s 1s forwards;
}

.identity p {
    margin: 0;
}

nav header {
    border-bottom: 1px solid rgba(0,0,0,.1);
}

nav.nav {
    display: flex;
    justify-content: space-between;
}

.navbar {
    display: flex;
    flex-direction: column;
    padding: 20px 0;
    align-items: center;
    transform: translateX(-200%);
    animation: text .7s 1s forwards;
    color: white;
}

.nav-links {
    display: flex;
    align-items: center;
    list-style: none;
    color: black;
    font-weight: 500;
    font-size: 1.1rem;
    padding: 0;
    margin: 0;
}

.bold {
    font-size: 1.25rem;
}

.nav-links li {
    margin-right: 25px;
}

.nav-links li a {
    text-decoration: none;
    color: black;
    position: relative;
}

.nav-links li a::before{
    content: '';
    position: absolute;
    bottom: 0;
    right: 0;
    width: 0;
    height: 2px;
    background-color: var(--primary-blue);
    transition: width 0.6s cubic-bezier(0.25, 1, 0.5, 1);
}

@media (hover: hover) and (pointer: fine) {
    .nav-links li a:hover::before{
        left: 0;
        right: auto;
        width: 100%;
    }
}

.nav-links li:last-child {
    margin-right: 0;
}

.nav-links li button {
    border: none;
    padding: 5px 10px;
    background-color: white;
    font-size: 15px;
    transition: .1s;
}

.nav-links li button:hover {
    transform: translateY(-2px);
}

.navbar-mobile {
    display: none;
}

/* Responsive */
@media only screen and (max-width: 768px) {
    header.pt-3.pb-3 {
        padding: .7rem 0 !important;
    }

    .identity {
        margin-left: .8rem !important;
        justify-content: center;
    }

    .identity > * {
        margin: 0;
    }

    nav .logo {
        height: 70px;
        width: 50px;
    }
    
    h4.title {
        margin-bottom: .5rem;
        font-size: 1rem;
    }
    
    p.address {
        font-size: .6rem;
    }

    .navbar {
        display: none;
    }

    .navbar-mobile {
        position: fixed;
        z-index: 1000;
        top: 0;
        left: -250px;
        display: flex;
        width: 250px;
        height: 100vh;
        overflow: hidden;
        flex-direction: column;
        justify-content: center;
        transition: .5s;
        background-color: var(--primary-blue);
    }

    .navbar-mobile .nav-links {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .navbar-mobile .nav-links li {
        margin: 10px 0;
    }

    .navbar-mobile.opened {
        left: 0;
    }

    .menu {
        display: flex !important;
    }
}

@media only screen and (max-width: 375px) {
    header.pt-3.pb-3 {
        padding: .6rem 0 !important;
    }

    h4.title {
        margin-bottom: .4rem;
        font-size: .8rem;
    }
    
    p.address {
        font-size: .5rem;
    }

    nav .logo {
        height: 60px;
        width: 40px;
    }

    .identity {
        margin-left: .7rem !important;
        justify-content: center;
    }

    .menu {
        display: flex !important;
    }
}


.menu {
    background-color: transparent;
    border: none;
    cursor: pointer;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 0;
    height: 30px;
    width: 30px;
}

.line {
    fill: none;
    stroke: black;
    stroke-width: 6;
    transition: stroke-dasharray 600ms cubic-bezier(0.4, 0, 0.2, 1),
    stroke-dashoffset 600ms cubic-bezier(0.4, 0, 0.2, 1);
}

.line1 {
    stroke-dasharray: 60 207;
    stroke-width: 6;
}

.line2 {
    stroke-dasharray: 60 60;
    stroke-width: 6;
}

.line3 {
    stroke-dasharray: 60 207;
    stroke-width: 6;
}

.opened .line1 {
    stroke-dasharray: 90 207;
    stroke-dashoffset: -134;
    stroke-width: 6;
}

.opened .line2 {
    stroke-dasharray: 1 60;
    stroke-dashoffset: -30;
    stroke-width: 6;
}

.opened .line3 {
    stroke-dasharray: 90 207;
    stroke-dashoffset: -134;
    stroke-width: 6;
}

</style>