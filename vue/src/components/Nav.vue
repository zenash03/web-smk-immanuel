<template>
    <div>
        <nav>
            <div class="container d-flex justify-content-between">
                <div class="logo">
                    <img src="images/logo.png" alt="">
                </div>

                <div class="nav-right">
                    <ul class="nav-links">
                        <li><a href="">Prestasi</a></li>
                        <li><a href="">Jurusan</a></li>
                        <li><a href="">Visi</a></li>
                        <li><a href="">Misi</a></li>
                        <li><button type="button">Kritik & Saran</button></li>
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
<style>
nav {
    margin-top: 2rem;
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
    border: 2px solid gray;
    padding: 5px 10px;
    background-color: white;
    font-size: 15px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
    background-color: #ececec;
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
</style>