<template>
    <div>
        <router-link to="/content/achievements/add" class="btn btn-primary mb-3">Add New</router-link>
        
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(d, i) in achievements" :key="d.id">
                        <th scope="row">{{ i + 1 }}</th>
                        <td>{{ d.title }}</td>
                        <td>{{ d.author }}</td>
                        <td>{{ d.date }}</td>
                        <td>
                            <button @click="$router.push(`/content/achievements/edit/${d.id}`)" type="button" class="form-control btn-primary mb-1">Edit</button>
                            <button @click="deleteData(d.id)" type="button" class="form-control btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            token: localStorage.getItem('token'),
            achievements: ''
        }
    },
    methods: {
        getAchievements() {
            axios.get(`achievements`)
                .then(res => {
                    this.achievements = res.data;
                })
                .catch(err => {
                    console.log(err.response.data);
                }); 
        },
        deleteData(id) {
            axios.delete(`admin/achievements/${id}?token=${this.token}`)
                .then(res => {
                    this.getAchievements();
                })
                .catch(err => {
                    console.log(err.response.data);
                });
        }
    },
    created() {
        this.getAchievements();
    }
}
</script>