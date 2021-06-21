 <template>
        <div>
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <router-link :to="{name: 'home'}" class="navbar-brand"><img src="/logoTest2.png"></router-link>
                    <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon "></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto"></ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <router-link :to="{ name: 'login' }" class="nav-link" v-if="!isLoggedIn">CONNEXION</router-link>
                            <router-link :to="{ name: 'register' }" class="nav-link" v-if="!isLoggedIn">INSCRIPTION</router-link>
                            <span v-if="isLoggedIn">
                                <router-link :to="{ name: 'userboard' }" class="nav-link" v-if="user_type == 0"> {{name}}</router-link>
                                <router-link :to="{ name: 'admin' }" class="nav-link" v-if="user_type == 1"> {{name}}</router-link>
                            </span>
                            <li class="nav-link" v-if="isLoggedIn" @click="logout"> DÉCONNEXION</li>
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-4">
                <router-view @loggedIn="change"></router-view>
            </main>
        </div>
    </template>
     <script>
    export default {
        data() {
            return {
                name: null,
                user_type: 0,
                isLoggedIn: localStorage.getItem('activityStore.jwt') != null
            }
        },
        mounted() {
            this.setDefaults()
        },
        methods : {
            setDefaults() {
                if (this.isLoggedIn) {
                    let user = JSON.parse(localStorage.getItem('activityStore.user'))
                    this.name = user.name
                    this.user_type = user.is_admin
                }
            },
            change() {
                this.isLoggedIn = localStorage.getItem('activityStore.jwt') != null
                this.setDefaults()
            },
            logout(){
                localStorage.removeItem('activityStore.jwt')
                localStorage.removeItem('activityStore.user')
                this.change()
                this.$router.push('/')
            }
        }
    }
    </script>
    <style scoped>
    .navbar{
        background: black;
        padding: 0 !important;
    }
    .navbar-light .navbar-nav .nav-link{
        color: white;
    }
    .navbar-brand{
        color: white;
        padding-bottom: 0px !important;
        padding-top: 0px !important;
    }
    .py-4{
        padding-bottom: 0 !important ;
        padding-top: 0px !important;
    }


    </style>