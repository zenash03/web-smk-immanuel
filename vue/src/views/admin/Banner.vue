<template>
    <div id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                    <div class="sidebar-brand-icon">
                        <img src="images/logo.png" style="width: 2.5rem;">
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
                                        src="images/undraw_profile.svg">
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
                            <h1 class="h3 mb-0 text-gray-800">Banner</h1>
                        </div>

                        <router-link to="add-banner">Add Banner</router-link>

                        <ul class="list list-inline">
                            <li class="d-flex justify-content-between align-items-center" v-for="n in banner" :key="n.id">
                                <div class="d-flex flex-row align-items-center"><i class="fa fa-check-circle checkicon"></i>
                                    <div class="ml-2">
                                        <h6 class="mb-0">{{ n.title }}</h6>
                                        <div class="d-flex flex-row mt-1 text-black-50 date-time">
                                            <div><i class="fa fa-calendar-o"></i><span>{{ n.content }}</span></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="button d-flex align-items-center">
                                    <label class="switch m-0 mr-1">
                                        <input type="checkbox" :checked="n.active == 'y'" :id="`toggle-${n.id}`" @change="toggle(n.id)">
                                        <span class="slider round"></span>
                                    </label>

                                    <button type="button" class="btn btn-danger" @click="del(n.id)">Delete</button>
                                    <router-link :to="`edit-banner/${n.id}`" class="btn btn-warning ml-1">Edit</router-link>
                                </div>
                            </li>
                        </ul>
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
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            token: 'a261a422927d7b454547428b609ab9f421e1af8230dadacd47d5b6165860bdfa',
            banner: ''
        }
    },
    methods: {
        getBanner() {
			axios.get(`banners?token=${this.token}`)
				.then(res => {
					this.banner = res.data;
				})
				.catch(err => {
					console.log(err.response.data);
				})
		},
        del(id) {
            axios.delete(`banner/${id}?token=${this.token}`)
                .then(res => {
                    console.log(res.data);
                    this.getBanner();
                })
                .catch(err => {
                    console.log(err.response.data);
                });
        },
        toggle(id) {
            const element = document.querySelector(`#toggle-${id}`);
            let state = (element.checked) ? 'y' : 'n';

            axios.put(`toggle/${id}?token=${this.token}`, {state: state})
                .then(res => {
                    console.log(res.data);
                })
                .catch(err => {
                    console.log(err.response.data);
                })
        }
    },
    created() {
        this.getBanner();
    },
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


.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>