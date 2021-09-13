<template>
    <div>
        <footer class="footer">
            <div class="container pt-5">
                <div class="row">
                    <div class="footer-col pop-out">
                        <h4>Visi</h4>
                        <ul>
                            <li>
                                Sekolah Kristen berkualitas dalam mendidik anak bangsa dengan nilai-nilai Kristiani. <br> <br>

                                A Christian school that provides a quality education for the nation with Christian values. <br> <br>

                                具備高素質的基督教學校, 以基督信仰的價值培育國家子弟。
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col pop-out">
                        <h4>Misi</h4>
                        <ul>
                            <li>
                                Mendidik siswa menjadi manusia yang berkualitas secara akademik, fisik, mental, dan spiritual, serta memiliki kemampuan dan kegemaran belajar seumur hidup sehingga dapat memberi dampak bagi lingkungan sekitar dengan nilai-nilai kristiani. <br> <br>

                                To educate students to excel academically, physically, mentally, and spiritually, and to cultivate lifelong love of learning in order to bring about impact to the surroundings with Christian values. <br> <br>

                                栽培子弟成爲品學兼優，身心靈安康，以及終生好學上進，實踐基督信仰的價值啓迪身邊的人。<br> <br>
                            </li>
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

.footer svg {
    transform: translateY(-290px);
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
    width: 165px;
    height: 190px;
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