<template>
  <div>
    <Header />
    <router-view />
    <footer />
  </div>
</template>

<script>
  import Header from './components/Header';
  import Footer from './components/Footer';

  export default {
    components: {
      Header,
      Footer
    }
  }

</script>


<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}

table { border: 1px solid rgb(70, 70, 70); border-collapse: collapse; margin: 0 auto;}
td, th { border: 1px solid rgb(70, 70, 70); padding: 10px; }
</style>
