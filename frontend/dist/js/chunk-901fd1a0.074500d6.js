(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-901fd1a0"],{"781f":function(a,t,e){},"97cb":function(a,t,e){"use strict";e("781f")},a3dd:function(a,t,e){"use strict";e.r(t);var s=function(){var a=this,t=a.$createElement,e=a._self._c||t;return e("div",[e("h3",{staticClass:"mb-5"},[a._v("Pendaftaran Kamu")]),a.data[0]?a._e():e("h6",{staticClass:"belum-daftar"},[a._v("Kamu Belum Mendaftar Magang 😑")]),a._l(a.data,(function(t){return e("div",{key:t.id,staticClass:"row p-0 pb-2 box mb-4"},[e("header",[t.didaftarkan_oleh?a._e():e("p",[a._v("Kamu Mendaftar magang di, "),e("router-link",{staticClass:"font-weight-bold text-success",attrs:{to:"/pendaftaran-magang/daftar/"+t.magang.id}},[a._v(a._s(t.magang.nama_perusahaan))])],1),t.didaftarkan_oleh?e("p",[a._v("Kamu Didaftarkan oleh "),e("b",[a._v(a._s(t.didaftarkan_oleh))]),a._v(" di, "),e("router-link",{staticClass:"font-weight-bold text-success",attrs:{to:"/pendaftaran-magang/daftar/"+t.magang.id}},[a._v(a._s(t.magang.nama_perusahaan))])],1):a._e()]),e("main",["y"==t.disetujui?e("p",[a._v("Status Dizinkan, "),e("b",{staticClass:"text-success"},[a._v("Disetujui 🥳")])]):a._e(),"n"==t.disetujui?e("p",[a._v("Status Dizinkan, "),e("b",{staticClass:"text-danger"},[a._v("Tidak Di Setujui 😢")])]):a._e(),t.disetujui?a._e():e("p",[a._v("Status Dizinkan, "),e("b",{staticClass:"text-info"},[a._v("Menunggu Persetujuan 😱")])])]),"y"==t.disetujui?e("p",{staticClass:"info m-0 mt-3"},[a._v("Telah disetujui oleh "),e("b",[a._v(a._s(t.penyetuju.name))]),a._v(" pada tanggal "+a._s(t.tanggal_disetujui))]):a._e(),"n"==t.disetujui?e("p",{staticClass:"info m-0 mt-3"},[e("b",[a._v(a._s(t.penyetuju.name))]),a._v(" tidak menyetujui tempat magang anda :(((")]):a._e()])}))],2)},n=[],i=e("bc3a"),u=e.n(i),d={data(){return{token:localStorage.getItem("token"),me:"",data:""}},methods:{getMe(){u.a.get("auth/me?token="+this.token).then(a=>{this.me=a.data}).catch(a=>{console.log(a.response.data),401==a.response.status&&this.$router.push("/login")})},getData(){u.a.get("pendaftaran/1?token="+this.token).then(a=>{this.data=a.data}).catch(a=>{console.log(a.response.data),401==a.response.status&&this.$router.push("/login")})}},created(){this.getData(),this.getMe()}},o=d,r=(e("97cb"),e("2877")),_=Object(r["a"])(o,s,n,!1,null,"2cb38bb4",null);t["default"]=_.exports}}]);