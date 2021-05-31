 <template>
        <div>
            <div class="container-fluid hero-section d-flex align-content-center justify-content-center flex-wrap ml-auto">
                <h2 class="title">Admin Dashboard</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <ul style="list-style-type:none">
                            <li class="active"><button class="btn" @click="setComponent('main')">Dashboard</button></li>
                            <li><button class="btn" @click="setComponent('reservations')">Reservations</button></li> -->
                            <li><button class="btn" @click="setComponent('activities')">Activities</button></li>
                            <li><button class="btn" @click="setComponent('users')">Users</button></li>
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
            this.user = JSON.parse(localStorage.getItem('bigStore.  d fuser'))
            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('bigStore.jwt')
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
    .hero-section { height: 20vh; background: #ababab; align-items: center; margin-bottom: 20px; margin-top: -20px; }
    .title { font-size: 60px; color: #ffffff; }
    </style>