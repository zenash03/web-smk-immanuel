<template>
	<div id="app">
		<router-view/>
	</div>
</template>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

.app {
	font-family: 'Poppins', sans-serif;
    height: 100%;
    background-color: #eef0f8;
}

main {
    min-height: 100vh;
    width: 100%;
    display: flex;
    flex-direction: column;
}

.profile {
    margin: 0;
    padding: 10px;
    transition: .5s;
    cursor: pointer;
    border-radius: 5px;
}

.profile:hover {
    background-color: #f5f7fd;
}

.profile span {
    font-weight: 700;
}

.header {
    width: 100%;
    height: 70px;
    background-color: white;
}

.header .container-fluid {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    height: 100%;
}

.content {
    flex: 1 0 auto;
}

img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.content .container {
    background-color: white;
    box-shadow: 0px 0px 28px 0px rgb(82 63 105 / 8%);
    border-radius: 10px;
}

@media screen and (max-width: 768px) {
    .content {
        padding: 2rem !important;
    }

    .content .container {
        padding: 2rem !important;
    }
}

@media screen and (max-width: 375px) {
    .content {
        padding: 1rem !important;
    }

    .content .container {
        padding: 2rem 1.5rem !important;
    }

    h4 {
        font-size: 1.25rem !important;
    }

    h3 {
        font-size: 1.4rem !important;
        margin-bottom: 1.5rem !important;
    }
}

</style>
