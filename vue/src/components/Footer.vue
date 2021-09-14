<template>
    <div>
        <footer class="footer">
            <div class="container pt-5">
                <div class="row">
                    <div class="footer-col pop-out">
                        <h4>Follow Us</h4>

                        <ul class="social">
                            <li><a href="https://www.instagram.com/smkimmanuelptk/" target="_blank"><i class="fab fa-instagram-square"></i></a></li>
                            <li><a href="https://www.facebook.com/smkimmptk" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                        </ul>
                    </div>

                    <div class="footer-col pop-out">
                        <h4>Main Menu</h4>

                        <ul class="link">
                            <li><router-link to="/" class="bold">Home</router-link></li>
                            <li><router-link to="/news">Berita</router-link></li>
                            <li><router-link to="/prestasi">Prestasi</router-link></li>
                            <li><router-link to="/visi-misi">Visi & Misi</router-link></li>
                        </ul>
                    </div>

                    <div class="footer-col pop-out">
                        <h4>SMK Immanuel Pontianak</h4>

                        <ul>
                            <li>
                                Jl. Letnan Jendral Sutoyo, Parit Tokaya, Kec. Pontianak Sel., Kota Pontianak, Kalimantan Barat 78113
                                <br>
                                +62 8952-4435-865
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col pop-out">
                        <div class="footer-logo">
                            <img src="@/assets/images/logo.png" alt="Logo">
                        </div>
                    </div>
                </div>
            </div>

        </footer>

        <footer class="text">Copyright &copy; {{ year }} SMK Immanuel. All rights reserved | Made with ❤ By Erick Chandra.</footer>
    </div>
</template>

<script>
export default {
    data() {
        return {
            year: new Date().getFullYear()
        }
    },
}
</script>

<style scoped>

footer.text {
    background-color: var(--primary-blue);
    padding: 1rem 0;
    text-align: center;
    color: white;
}

.footer-col h4 {
    color: white !important;
}

ul {
    padding: 0;
	list-style: none;
}

.footer {
	background-color: var(--primary-blue-hover);
    padding: 50px 0;
}

.footer-col {
   width: 25%;
   padding: 0 15px;
}

.footer-col h4 {
	font-size: 18px;
	color: #ffffff;
	text-transform: capitalize;
	margin-bottom: 35px;
	font-weight: 500;
	position: relative;
}

.footer-col h4::before {
	content: '';
	position: absolute;
	left:0;
	bottom: -10px;
	background-color: white;
	height: 2px;
	box-sizing: border-box;
	width: 50px;
}

.footer-col ul li:not(:last-child) {
	margin-bottom: 10px;
}

.footer-col ul li {
	font-size: 16px;
	text-transform: capitalize;
	color:white;
	text-decoration: none;
	font-weight: 300;
	color: white;
	display: block;
	transition: all 0.3s ease;
}

.footer-logo img {
    width: 130px;
    height: 150;
}

.link a {
    color: white;
    font-weight: 500;
}

.social {
    display: flex;
}

.social li a {
    margin-right: .5rem;
    font-size: 2rem;
    color: white;
}

/*responsive*/
@media(max-width: 768px) {
    .footer-col {
        width: 50%;
        margin-bottom: 30px;
    }

    footer.text {
        font-size: .8rem;
    }
}

@media(max-width: 400px) {
    .footer-col {
        width: 100%;
    }

    footer.text {
        font-size: .5rem;
    }
}
</style>