<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">Soldout</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <router-link class="nav-link" to="/">Home</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link active" to="/">Procut List</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/detail">Procut Detail</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/sales">Procut Registration</router-link>
                </li>
                <li v-if="user.email === undefined">
                    <button class="btn btn-danger" type="button" @click="kakaoLogin">LogIn</button>
                </li>
                <li v-else>
                    <button class="btn btn-danger" type="button" @click="kakaoLogout">LogOut</button>
                </li>
            </ul>
            <from class="d-flex">
                <input type="search" class="form-control me-2" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success text-white" type="submit" style="border-color:white;">Search</button>
            </from>
        </div>
    </div>

  </nav>
</template>

<script>
export default {
    name: 'header',
    computed: {
        user() {
            return this.$store.state.user;
        }
    },
    methods: {
        kakaoLogin() {
            window.Kakao.Auth.login({
                scope: 'profile_nickname, profile_image, account_email', //받고 싶은거 적으면 됨
                success: this.getProfile,
                fail: e => {
                    console.log(e);
                }
            });
        },
        
        async getProfile(authObj) {
            console.log(authObj);
            window.Kakao.API.request({
                url: '/v2/user/me',
                success: async res => {
                    const acc = res.kakao_account;
                    const params = {
                        social_type: 1,
                        email: acc.email,
                        nickname: acc.profile.nickname,
                        profile_img: acc.profile.profile_image_url,
                        thumb_img: acc.profile.thumbnail_image_url
                    }
                    console.log(params);
                    await this.login(params);
                },
                fail: e => {
                    console.log(e);
                }
            });
        },
        
        async login(params) {
            const data = await this.$post('/user/signup', params);
            console.log(data.result);
            params.iuser = data.result;
            this.$store.commit('user', params);
        },
        kakaoLogout() {
            window.Kakao.Auth.logout(async res => {
                //카카오 로그아웃 처리
                console.log(res);
                this.$store.commit('user', {});
                this.$router.push({path: '/'}); //라우터 주소 이동 (굳이 안 해도 되는 선택사항)
                await this.$post('/user/logout');
            })
        },
    }
}
</script>

<style>

</style>