<template>
    <div>
        <div class="alert alert-success" role="alert" v-if="alertSuccess">{{ alertSuccess }}</div>
        <div class="alert alert-danger" role="alert" v-if="alertDanger">{{ alertDanger }}</div>

        <h3 class="mb-5">Filter Data</h3>

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header pt-2 pb-2">
                        <h4 class="title m-0">XI TKJ 1</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            token: localStorage.getItem('token'),
            data: '',
            alertSuccess: '',
            alertDanger: ''
        }
    },
    methods: {
        
    },
    created() {

    },
}
</script>

<style scoped>
 
.card-header {
    background-color: var(--primary-blue);
    color: white;
} 

</style>