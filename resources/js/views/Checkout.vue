<template>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="reservation-box">
                        <img :src="activity.image" :alt="activity.name">
                        <h2 class="title" v-html="activity.name"></h2>
                        <p class="small-text text-muted float-left">$ {{activity.price}}</p>
                        <p class="small-text text-muted float-right">Available Units: {{activity.units}}</p>
                        <br>
                        <hr>
                        <label class="row"><span class="col-md-2 float-left">Quantity: </span><input type="number" name="units" min="1" :max="activity.units" class="col-md-2 float-left" v-model="quantity" @change="checkUnits"></label>
                    </div>
                    <br>
                    <div>
                        <div v-if="!isLoggedIn">
                            <h2>You need to login to continue</h2>
                            <button class="col-md-4 btn btn-primary float-left" @click="login">Login</button>
                            <button class="col-md-4 btn btn-danger float-right" @click="register">Create an account</button>
                        </div>
                        <div v-if="isLoggedIn">
                            <div class="row">
                                <label for="address" class="col-md-3 col-form-label">Delivery Address</label>
                                <div class="col-md-9">
                                    <input id="address" type="text" class="form-control" v-model="address" required>
                                </div>
                            </div>
                            <br>
                            <button class="col-md-4 btn btn-sm btn-success float-right" v-if="isLoggedIn" @click="placereseRvation">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <style scoped>
    .small-text { font-size: 18px; }
    .reservation-box { border: 1px solid #cccccc; padding: 10px 15px; }
    .title { font-size: 36px; }
    </style>

     <script>
    export default { 
        props : ['pid'],
        data(){
            return {
                address : "",
                quantity : 1,
                isLoggedIn : null,
                activity : []
            }
        },
        mounted() {
            this.isLoggedIn = localStorage.getItem('bigStore.jwt') != null
        },
        beforeMount() {
            axios.get(`/api/activities/${this.pid}`).then(response => this.activity = response.data)

            if (localStorage.getItem('bigStore.jwt') != null) {
                this.user = JSON.parse(localStorage.getItem('bigStore.user'))
                axios.defaults.headers.common['Content-Type'] = 'application/json'
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('bigStore.jwt')
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

                let address = this.address
                let activity_id = this.activity.id
                let quantity = this.quantity

                axios.post('api/reservations/', {address, quantity, activity_id})
                     .then(response => this.$router.push('/confirmation'))
            },
            checkUnits(e){
                if (this.quantity > this.activity.units) {
                    this.quantity = this.activity.units
                }
            }
        }
    }
    </script>