<template>
    <div>
        <form action="" @submit.prevent="submitNews" method="post" enctype="multipart/form-data" id="form">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5>Create News</h5>

                <button type="submit" class="btn btn-primary" id="publish">Publish</button>
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
            token: localStorage.getItem('token')
        }
    },
    methods: {
        submitNews() {
            const form = document.querySelector('#form');
            const formData = new FormData(form);
            const button = document.querySelector('#publish');
            
            button.disabled = true;
            button.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`;

            axios.post(`admin/news?token=${this.token}`, formData)
                .then(res => {
                    this.$router.push('/content/news');
                })
                .catch(err => {
                    button.disabled = false;
                    button.innerHTML = `Publish`;
                    
                    alert(err.response.data.message);
                }); 
        }
    }
}
</script>