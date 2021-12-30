<template>
    <div>
        <router-link to="/content/news/add" class="btn btn-primary mb-3">Add New</router-link>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Date</th>
                        <th scope="col">Headline</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(d, i) in news" :key="d.id">
                        <th scope="row">{{ i + 1 }}</th>
                        <td>{{ d.title }}</td>
                        <td>{{ d.author }}</td>
                        <td>{{ d.date }}</td>
                        <td class="text-center">
                            <input type="radio" name="headline" @change="updateHeadline(d.id)" :value="d.id" :checked="d.headline == 'Y'">
                        </td>
                        <td>
                            <button @click="$router.push(`/content/news/edit/${d.id}`)" type="button" class="form-control btn-primary mb-1">Edit</button>
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
            formData: {
                headline: ''
            },
            news: ''
        }
    },
    methods: {
        getNews() {
            axios.get(`news`)
                .then(res => {
                    this.news = res.data;
                })
                .catch(err => {
                    console.log(err.response.data);
                }); 
        },
        deleteData(id) {
            axios.delete(`admin/news/${id}?token=${this.token}`)
                .then(res => {
                    this.getNews();
                })
                .catch(err => {
                    console.log(err.response.data);
                });
        },
        updateHeadline(id) {
            axios.put(`admin/headline/${id}?token=${this.token}`)
                .then(res => {
                    this.getNews();
                })
                .catch(err => {
                    console.log(err.response.data);
                });
        }
    },
    created() {
        this.getNews();
    }
}
</script>