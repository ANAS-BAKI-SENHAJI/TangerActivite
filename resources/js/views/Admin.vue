 <template>
        <div>
            <div class="container-fluid hero-section d-flex align-content-center justify-content-center flex-wrap ml-auto">
                <h2 class="title">Tableau de bord administrateur</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <ul style="list-style-type:none">
                            <li class="active"><button class="col btn btn-cool-blues btn-rounded " @click="setComponent('main')">Tableau de bord</button></li>
                            <li><button class="col btn btn-cool-blues btn-rounded" @click="setComponent('reservations')">Réservations</button></li>
                            <li><button class="col btn btn-cool-blues btn-rounded" @click="setComponent('activities')">Activités</button></li>
                            <li><button class="col btn btn-cool-blues btn-rounded" @click="setComponent('users')">Utilisateurs</button></li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <component :is="activeComponent"></component>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <script>
    import Main from '../components/admin/Main'
    import Users from '../components/admin/Users'
    import Activities from '../components/admin/Activities'
    import Reservations from '../components/admin/Reservations'

    export default {
        data() {
            return {
                user: null,
                activeComponent: null
            }
        },
        components: {
            Main, Users, Activities, Reservations
        },
        beforeMount() {
            this.setComponent(this.$route.params.page)
            this.user = JSON.parse(localStorage.getItem('activityStore.  d fuser'))
            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('activityStore.jwt')
        },
        methods: {
            setComponent(value) {
                switch(value) {
                    case "users":
                        this.activeComponent = Users
                        this.$router.push({name: 'admin-pages', params: {page: 'users'}})
                        break;
                    case "reservations":
                        this.activeComponent = Reservations
                        this.$router.push({name: 'admin-pages', params: {page: 'reservations'}})
                        break;
                    case "activities":
                        this.activeComponent = Activities
                        this.$router.push({name: 'admin-pages', params: {page: 'activities'}})
                        break;
                    default:
                        this.activeComponent = Main
                        this.$router.push({name: 'admin'})
                        break;
                }
            }
        }
    }
    </script>

    <style scoped>
    .hero-section { 
        height: 20vh; 
        background: #2193b0;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        align-items: center; 
        margin-bottom: 20px; 
        margin-top: -20px; 
        }
    .title { 
        font-size: 60px; color: #ffffff;
       
    }
    .btn-cool-blues {
    background: #2193b0;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color: #fff;
    border: 3px solid #eee;
    border-radius: 20px;
    }
    li{
        margin-bottom: 10px;
    }
    </style>