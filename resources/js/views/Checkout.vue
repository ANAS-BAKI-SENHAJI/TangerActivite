<template>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <table>
                        <tr>
                            <td rowspan="3" width="50%">
                                <img class="image" :src="activity.image" :alt="activity.name">
                            </td>
                            <td width="25%">
                                <h2 class="title pl-2" v-html="activity.name"></h2>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%">                        
                                <div v-if="isLoggedIn">

                                    <div class="row pl-2">
                                        <label class="col-md-4 float-left sizing">Date de Réservation: </label>
                                        <input type="date" name="reservation_date" class="col-md-4 pl-2" v-model="reservation_date" >
                                    </div>
                                    <br>
                                    <br>
                                    <div class="row pl-2">
                                            <label for="reservation_time" class="col-md-4 float-left pr-2 sizing">Heure de Réservation:</label>
                                            <div class="col-md-4">
                                                <input id="reservation_time" type="time" class="form-control pl-2" v-model="reservation_time" required>
                                            </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%">
                                <p class="small-text  pl-2">Prix: {{activity.price}}MAD</p>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <hr>
                    <div v-if="isLoggedIn">
                        <button class="col-md-4 btn btn-sm btn-success float-right continu" v-if="isLoggedIn" @click="placeReservation">Continuer</button>
                    </div>
                    <!-- <div class="reservation-box">
                        <img :src="activity.image" :alt="activity.name">
                        <h2 class="title" v-html="activity.name"></h2>
                        <p class="small-text text-muted float-left">$ {{activity.price}}</p>
                        <br>
                        <hr>
                    </div> -->
                    <br>

                    
                    <div>
                        <div v-if="!isLoggedIn">
                            <h2>Vous devez vous connecter pour continuer</h2>
                            <button class="col-md-4 btn btn-primary float-left" @click="login">Connexion</button>
                            <button class="col-md-4 btn btn-danger float-right" @click="register">Inscription</button>
                        </div>
                        <!-- <div v-if="isLoggedIn">

                            <label class="row">
                                <span class="col-md-2 float-left">Reservation Date: </span>
                                <input type="date" name="reservation_date" class="col-md-2 float-left" v-model="reservation_date" >
                            </label>
                        
                            <div class="row">
                                    <label for="reservation_time" class="col-md-3 col-form-label">Reservation Time:</label>
                                    <div class="col-md-9">
                                        <input id="reservation_time" type="time" class="form-control" v-model="reservation_time" required>
                                    </div>
                            </div>
                            
                            <br>
                            <button class="col-md-4 btn btn-sm btn-success float-right" v-if="isLoggedIn" @click="placeReservation">Continue</button>
                        </div> -->
                        
                    </div>
                </div>
            </div>
        </div>
    </template>

    <style scoped>
    .small-text { 
        font-size: 18px; 
    }
    .title { 
        font-size: 36px; 
    }
    .image{ 
        width:100%;
        border-radius: 3px;
    }
    .sizing{
        font-size: 16px;
    }
    .continu{
        background-color: #2193b0;
        border: none;
        font-weight: bold;
    }
    </style>

     <script>
    export default { 
        props : ['pid'],
        data(){
            return {
                reservation_time : "",
                reservation_date : "",
                
                 
                isLoggedIn : null,
                activity : []
            }
        },
        mounted() {
            this.isLoggedIn = localStorage.getItem('activityStore.jwt') != null
        },
        beforeMount() {
            axios.get(`/api/activities/${this.pid}`).then(response => this.activity = response.data)

            if (localStorage.getItem('activityStore.jwt') != null) {
                this.user = JSON.parse(localStorage.getItem('activityStore.user'))
                axios.defaults.headers.common['Content-Type'] = 'application/json'
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('activityStore.jwt')
            }
        },
        methods : {
            login() {
                this.$router.push({name: 'login', params: {nextUrl: this.$route.fullPath}})
            },
            register() {
                this.$router.push({name: 'register', params: {nextUrl: this.$route.fullPath}})
            },
            placeReservation(e) {
                e.preventDefault()

                let reservation_time = this.reservation_time
                let activity_id = this.activity.id
                let reservation_date = this.reservation_date

                axios.post('/api/reservations/', {activity_id, reservation_date, reservation_time})
                     .then(response => this.$router.push('/confirmation'))
            }
            
        }
    }
    </script>