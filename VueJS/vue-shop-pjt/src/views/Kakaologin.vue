<template>
    <div>
        <a id="custom-login-btn" @click="kakaoLogin">
            <img
                src="//k.kakaocdn.net/14/dn/btroDszwNrM/I6efHub1SN5KCJqLm1Ovx1/o.jpg"
                width="222"
                alt="카카오 로그인 버튼" >
        </a>
    </div>
</template>

<script>
export default {
    methods: {
        kakaoLogin() {
            window.Kakao.Auth.login({
                scope: 'profile_nickname, profile_image, account_email', //받고 싶은거 적으면 됨
                success: this.getkakoAccount,

            });
        },
        getKakoAccount() {
            window.kakap.API.request({
                url: 'v2/user/me',
                success: res => {
                    const kakao_account = res.kakao_accout;
                    console.log(kakao_account);

                    alert('로그인 성공!')
                },
                fail: e => {
                    console.log(e);
                }
            })
        }
    }
}
</script>

<style>

</style>