<template>
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="wave"><path fill="#0099ff" fill-opacity="1" d="M0,0L18.5,21.3C36.9,43,74,85,111,117.3C147.7,149,185,171,222,170.7C258.5,171,295,149,332,122.7C369.2,96,406,64,443,69.3C480,75,517,117,554,122.7C590.8,128,628,96,665,101.3C701.5,107,738,149,775,170.7C812.3,192,849,192,886,192C923.1,192,960,192,997,213.3C1033.8,235,1071,277,1108,277.3C1144.6,277,1182,235,1218,218.7C1255.4,203,1292,213,1329,208C1366.2,203,1403,181,1422,170.7L1440,160L1440,0L1421.5,0C1403.1,0,1366,0,1329,0C1292.3,0,1255,0,1218,0C1181.5,0,1145,0,1108,0C1070.8,0,1034,0,997,0C960,0,923,0,886,0C849.2,0,812,0,775,0C738.5,0,702,0,665,0C627.7,0,591,0,554,0C516.9,0,480,0,443,0C406.2,0,369,0,332,0C295.4,0,258,0,222,0C184.6,0,148,0,111,0C73.8,0,37,0,18,0L0,0Z"></path></svg>
        <nav>
            <div class="container d-flex justify-content-between">
                <div class="logo">
                    <img src="images/logo.png" alt="">
                </div>

                <div class="nav-right">
                    <ul class="nav-links">
                        <li><a href="">Berita</a></li>
                        <li><a href="">Aktivitas</a></li>
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
</style>