<template>
    <header class="header">
        <div class="container-fluid">
            <p class="profile" @click="showButton = !showButton">Hi, <span>{{ me.name }}</span></p>
        </div>

        <transition name="fade">
            <button v-if="showButton" @click="logout" type="button" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </transition>
    </header>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            token: localStorage.getItem('token'),
            me: '',
            showButton: false
        }
    },
    methods: {
        getMe() {
            axios.get(`auth/me?token=${this.token}`)
                .then(res => {
                    this.me = res.data;
                })
                .catch(err => {
                    console.log(err.response.data);
                }); 
        },
        logout() {
            axios.post(`auth/logout?token=${this.token}`)
                .then(res => {
                    localStorage.removeItem('token');

                    this.$router.push('/');
                })
                .catch(err => {
                    console.log(err.response.data);
                });
        }
    },
    created() {
        this.getMe();
    },
}
</script>

<style scoped>

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

.btn-logout {
    position: absolute;
    right: 20px;
    top: 70px;
    padding: .5em 1em;
    background-color: white;
    border: none;
    border-radius: 5px;
    box-shadow: 0 0 20px rgba(0, 0, 0, .1);
    color: inherit;
}

.fade-enter-active, .fade-leave-active {
    transition: .1s ease-in-out;
}

.fade-enter, .fade-leave-to {
    transform: scale(0);
}

</style>