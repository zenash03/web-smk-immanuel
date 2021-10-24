<template>
	<div id="app">
		<router-view/>
	</div>
</template>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

:root {
    --background: #fcfcfc;
    --primary-blue: #62b8f4;
    --primary-blue-hover: #00a0e3;
    --primary-yellow: #ffc953;
    --primary-green: #75dfbd;
    --primary-red: #ff6961;
}

body {
    width: 100vw;
    font-family: 'Poppins', sans-serif;
    background-color: var(--background);
    overflow-x: hidden !important;
    overflow-y: scroll;
}

img {
    width: 100%;
    height: 100%;
    object-fit: fill;
}

pre {
    font-family: 'Poppins', sans-serif;
    white-space: pre-wrap;       /* Since CSS 2.1 */
    white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
    white-space: -pre-wrap;      /* Opera 4-6 */
    white-space: -o-pre-wrap;    /* Opera 7 */
    word-wrap: break-word;       /* Internet Explorer 5.5+ */
}

img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

a {
    transition: .2s;
}

a:hover {
    text-decoration: none;
}

.title {
    color: black;
}

.padding {
    padding: 100px 0;
}

/* Animation Class */

.fade-out {
    opacity: 0;
    transform: translateY(10px);
}

.fade {
    animation: fade .5s forwards;
}

.pop-out {
    transform: translateY(-70px);
    opacity: 0;
}

.pop-up {
    animation: pop-up .5s forwards;
}

.zoom-out {
    opacity: 0;
    transform: scale(1.2);
}

.zoom-in {
    animation: zoom-in .5s forwards;
}

.fly-up {
    opacity: 0;
    transform: translateY(-20px);
}

.fly-down {
    animation: fly-down .5s forwards;
}

/* Animations */
@keyframes underline {
    100% {
        width: 20%;
    }
}

@keyframes text {
    100% {
        transform: translateX(0);
    }
}

@keyframes fade {
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pop-up {
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes zoom-in {
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes fly-down {
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}


/* Bootstrap Reset */

@media only screen and (max-width: 991px) {
    .col-lg-6 {
        width: 50%;
        flex: 0 0 50%;
    }

	.container {
		max-width: 100% !important;
		width: 90% !important;
		margin: auto;
	}
}

@media only screen and (max-width: 767px) {
	.container {
		max-width: 100% !important;
		width: 90% !important;
		margin: auto;
	}
}

</style>