<template>
    <div>
        <form action="" @submit.prevent="submitNews" method="post" enctype="multipart/form-data" id="form">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5>Edit News</h5>

                <button type="submit" class="btn btn-primary" id="publish">Update</button>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <textarea name="content" class="form-control" cols="30" rows="10" id="content" placeholder="Content"></textarea>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <img :src="data.image" :alt="data.title" class="thumb">

                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" name="file" id="formFile">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="tag" id="tag" placeholder="Tag">
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            token: localStorage.getItem('token'),
            id: this.$route.params.id,
            data: {}
        }
    },
    methods: {
        submitNews() {
            const form = document.querySelector('#form');
            const formData = new FormData(form);
            const button = document.querySelector('#publish');
            
            button.disabled = true;
            button.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`;
          
            formData.append('_method', 'PUT');
            axios.post(`admin/news/${this.id}?token=${this.token}`, formData)
                .then(res => {
                    this.$router.push('/content/news');
                })
                .catch(err => {
                    button.disabled = false;
                    button.innerHTML = `Update`;
                    
                    alert(err.response.data.message);

                }); 
        },
        getData() {
            axios.get(`news/${this.id}?token=${this.token}`)
                .then(res => {
                    this.data = res.data;

                    document.getElementById('title').value = res.data.title;
                    document.getElementById('content').value = res.data.content;
                    document.getElementById('tag').value = res.data.tag;
                })
                .catch(err => {
                    alert(err.response.data.message);
                }); 
        }
    },
    created() {
        this.getData();
    },
}
</script>

<style scoped>

.thumb {
    max-height: 150px;
}

</style>