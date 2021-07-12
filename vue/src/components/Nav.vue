<template>
    <div>
        <svg class="main-wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,128L40,149.3C80,171,160,213,240,208C320,203,400,149,480,117.3C560,85,640,75,720,90.7C800,107,880,149,960,165.3C1040,181,1120,171,1200,170.7C1280,171,1360,181,1400,186.7L1440,192L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path></svg>
        <nav>
            <div class="container d-flex justify-content-between">
                <div class="logo">
                    <img src="images/logo.png" alt="">
                </div>

                <div class="nav-right">
                    <ul class="nav-links">
                        <li><a href="#news">Berita</a></li>
                        <li><a href="#jurusan">Jurusan</a></li>
                        <li><a href="#prestasi">Prestasi</a></li>
                        <li><a href="#ekskul">Ekskul</a></li>
                        <li><a href="">Semua Berita</a></li>
                        <li><a href=""></a></li>
                    </ul>

                    <div class="social">
                        <a href="https://www.instagram.com/smkimmanuelptk" target="_blank" class="social-button instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        
                        <a href="https://www.youtube.com/channel/UCnB79MATfk10TqR3VzKtExQ" target="_blank" class="social-button youtube">
                            <i class="fab fa-youtube"></i>
                        </a>

                        <a href="https://api.whatsapp.com/send?phone=6289524435865" target="_blank" class="social-button whatsapp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<style scoped>
svg {
    position: absolute;
    z-index: -100;
    transition: 1s;
}

nav {
    padding-top: 2rem;
}

nav .logo {
    width: 100px;
    height: 120px;
}

nav .logo img {
    object-fit: contain;
}

nav.nav {
    display: flex;
    justify-content: space-between;
}

.nav-right {
    display: flex;
    flex-direction: column;
    padding: 20px 0;
}

.nav-links {
    display: flex;
    align-items: center;
    list-style: none;
    color: black;
    font-weight: bold;
    font-size: 20px;
    padding: 0;
}

.nav-links li {
    margin-right: 25px;
}

.nav-links li a {
    text-decoration: none;
}

.nav-links li:last-child {
    margin-right: 0;
}

.nav-links li button {
    border: none;
    padding: 5px 10px;
    background-color: white;
    font-size: 15px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    transition: .1s;
}

.nav-links li button:hover {
    transform: translateY(-2px);
}

.social {
    width: 150px;
    display: flex;
    justify-content: space-between;
    align-self: flex-end;
}

.social-button {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: white;
    text-decoration: none;
    cursor: pointer;
    transition: .2s ease;
}

.social-button:hover {
    transform: scale(1.5);
}

.social .instagram {
    color: deeppink;
}

.social .youtube {
    color: #f72050;
}

.social .whatsapp {
    color: #00b649;
}

/* Responsive */
@media(max-width: 767px) {
    .logo {
        width: 80px !important;
        height: 80px !important;
    }

    .nav-links li {
        font-size: .8rem;
    }
}

@media(max-width: 574px) {
    .logo {
        display: none;
    }

    .nav-links li {
        padding-top: 0;
        font-size: .9rem;
    }

    .social {
        align-self: flex-start;
    }

    .main-wave {
        height: 40%;
    }
}
</style>