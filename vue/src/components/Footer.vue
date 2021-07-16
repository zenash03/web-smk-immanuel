<template>
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,32L34.3,69.3C68.6,107,137,181,206,202.7C274.3,224,343,192,411,149.3C480,107,549,53,617,42.7C685.7,32,754,64,823,117.3C891.4,171,960,245,1029,234.7C1097.1,224,1166,128,1234,90.7C1302.9,53,1371,75,1406,85.3L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col">
                        <h4>Visi</h4>
                        <ul>
                            <li>
                                Sekolah Kristen berkualitas dalam mendidik anak bangsa dengan nilai-nilai Kristiani. <br> <br>

                                A Christian school that provides a quality education for the nation with Christian values. <br> <br>

                                具備高素質的基督教學校, 以基督信仰的價值培育國家子弟。
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Misi</h4>
                        <ul>
                            <li>
                                Mendidik siswa menjadi manusia yang berkualitas secara akademik, fisik, mental, dan spiritual, serta memiliki kemampuan dan kegemaran belajar seumur hidup sehingga dapat memberi dampak bagi lingkungan sekitar dengan nilai-nilai kristiani. <br> <br>

                                To educate students to excel academically, physically, mentally, and spiritually, and to cultivate lifelong love of learning in order to bring about impact to the surroundings with Christian values. <br> <br>

                                栽培子弟成爲品學兼優，身心靈安康，以及終生好學上進，實踐基督信仰的價值啓迪身邊的人。<br> <br>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>SMK Immanuel Pontianak</h4>
                        <ul>
                            <li>
                                Jl. Letnan Jendral Sutoyo, Parit Tokaya, Kec. Pontianak Sel., Kota Pontianak, Kalimantan Barat 78113
                                <br>
                                +62 8952-4435-865
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <div class="footer-logo">
                            <img src="/images/logo.png" alt="Logo">
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<style scoped>
.footer-col h4 {
    color: white !important;
}

ul {
    padding: 0;
	list-style: none;
}

.footer {
	background-color: #0099ff;
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
@media(max-width: 767px) {
    .footer-col {
        width: 50%;
        margin-bottom: 30px;
    }

    .footer svg {
        transform: translateY(-300px);
    }
}

@media(max-width: 574px) {
    .footer-col {
        width: 100%;
    }

    .footer svg {
        transform: translateY(110px) !important;
    }
}
</style>