<template>
    <div id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                    <div class="sidebar-brand-icon">
                        <img src="/images/logo.png" style="width: 2.5rem;">
                    </div>
                    <div class="sidebar-brand-text mx-3">SMK Immanuel</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Interface
                </div>  

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Master</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <router-link to="/news" class="collapse-item">
                                <i class="fas fa-newspaper"></i> News
                            </router-link>

                            <router-link to="/prestasi" class="collapse-item">
                                <i class="fas fa-medal"></i> Prestasi
                            </router-link>

                            <router-link to="/banner" class="collapse-item">
                                <i class="fas fa-images"></i> Banner
                            </router-link>

                            <router-link to="/data-magang" class="collapse-item">
                                <i class="fas fa-images"></i> Data Magang
                            </router-link>

                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Search for..." aria-label="Search"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                    <img class="img-profile rounded-circle"
                                        src="/images/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <router-link to="/logout" class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </router-link>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid" id="data">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Edit News</h1>
                        </div>

                        <form @submit.prevent="create" id="form" class="p-0">
                            <div class="row">
                                <div class="col-lg-8 mt-2">
                                    <input name="title" class="form-control mb-3 form-control-lg" type="text" placeholder="Title" :value="data.title" required>
                                    
                                    <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Content" :value="data.content" required></textarea>
                                </div>

                                <div class="col-lg-4 mt-2">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">Publish News</h5>
                                            <input name="tag" class="form-control mb-3 form-control-lg" type="text" placeholder="Tag" :value="data.tag" required>

                                            <button type="submit" class="btn btn-primary">Publish</button>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <img :src="data.image_url" :alt="data.title">
                                            <label for="formFile" class="form-label">Update Image</label>
                                            <input name="file" class="form-control" type="file" id="formFile">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            token: 'a261a422927d7b454547428b609ab9f421e1af8230dadacd47d5b6165860bdfa',
            data: ''
        }
    },
    methods: {
        getData() {
            axios.get(`news/${this.$route.params.id}`)
                .then(res => {
                    this.data = res.data;
                })
                .catch(err => {
                    console.log(err.response.data);
                })
        },
        create() {
            const form = document.getElementById('form');
            let formData = new FormData(form);

            formData.append('_method', 'PUT');

            axios.post(`news/${this.$route.params.id}?token=${this.token}`, formData)
                .then(res => {
                    console.log(res.data);
                    this.$router.push('/news');
                })
                .catch(err => {
                    console.log(err.response.data);
                });
        }
    },
    created() {
        this.getData();
    }
}
</script>

<style scoped>
body {
    background: #eee
}

.icons i {
    color: #b5b3b3;
    border: 1px solid #b5b3b3;
    padding: 6px;
    margin-left: 4px;
    border-radius: 5px;
    cursor: pointer
}

.activity-done {
    font-weight: 600
}

.list-group li {
    margin-bottom: 12px
}

.list li {
    list-style: none;
    padding: 10px;
    border: 1px solid #e3dada;
    margin-top: 12px;
    border-radius: 5px;
    background: #fff
}

.checkicon {
    color: green;
    font-size: 19px
}

.date-time {
    font-size: 12px
}

.profile-image img {
    margin-left: 3px
}
</style>