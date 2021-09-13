<template>
    <div class="app">
        <div class="container">
            <div class="alert" v-if="alert">{{ alert }}</div>
                
            <div class="form">
                <form @submit.prevent="login">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">
                        <div class="input-grup">
                            <label for="username">Username</label>	
                            <input v-model="formData.username" type="text" name="username" id="username" class="input" autocomplete="off" required>
                        </div>
            
                        <div class="input-grup mt-4">
                            <label for="password">Password</label>
                            <input v-model="formData.password" type="password" name="password" id="password" class="input" required>
                        </div>
                        
                        <div class="btn mt-5 mb-3 p-0 d-flex justify-content-center">
                            <button type="submit" name="login" id="login" class="login">LOGIN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            formData: {
                username: '',
                password: ''
            },
            alert: ''
        }
    },
    methods: {
        login() {
            axios.post(`auth/admin/login`, this.formData)
                .then(res => {
                    localStorage.setItem('token', res.data);

                    this.$router.push('/home')
                })
                .catch(err => {
                    this.alert = err.response.data.message;
                }); 
        }
    },
}
</script>

<style scoped>

.app {
	height: 100vh;
	background-color: #e3eaef;
    display: flex;
    align-items: center;
    justify-content: center;
}

button {
	outline: none !important;
	border: none !important;
}

.alert {
    width: 350px;
    background-color: white;
    border-left: 2px solid var(--primary-red);
    color: var(--primary-red);
	box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
}

.container {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.form {
	border-radius: 5px;
	margin: auto;
	width: 350px;
	height: 410px;
	background-color: white;
	box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
	border-top: 2px solid #7fd9ff;
}

.form .card-header {
	border-bottom-color: #f9f9f9;
	background-color: white;
	padding: 15px 25px;
}

.card-header h4 {
	margin: 0;
	line-height: 50px;
}

.form .card-body {
	padding: 15px 25px;
}

.form .card-body label {
	display: block;
	font-size: 12px;
}

.input {
	border: none;
    width: 100%;
    height: 50px;
    background: transparent;
    padding: 0 20px 0 23px;
    border: 1px solid rgba(0,0,0,.1);
    outline: none;
}

.login {
	width: 100%;
	padding: 10px 50px;
	border: none;
	background-color: #7fd9ff;
	color: white;
	box-shadow: 0 0px 5px 0px rgba(0, 0, 0, 0.3);
	transition: 0.5s;
}

.login:hover {
	background-color: rgba(129, 45, 212, 0.5);
}

</style>