 <template>
        <div>
            <div class="container-fluid hero-section d-flex align-content-center justify-content-center flex-wrap ml-auto">
                <h2 class="title">Vos réservations</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <div class="row">
                            <div class="col-md-4 activity-box mt-3" v-for="(reservation,index) in reservations" :key="index">
                                <img :src="reservation.activity.image" :alt="reservation.activity.name" class="col-md-12 pt-1">
                                <h5><span v-html="reservation.activity.name"></span><br>
                                    <span class="small-text text-muted">{{reservation.activity.price}} MAD</span>
                                </h5>
                                <hr>
                                <span class="small-text text-muted">Reservation Date: {{reservation.reservation_date}}
                                    <span class="float-right">{{reservation.is_delivered == 1? "finished!" : "not finished"}}</span>
                                </span>
                                <br><br>
                                <p><strong>Reservation Time: </strong> <br>{{reservation.reservation_time}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <style scoped>
    .small-text { font-size: 14px; }
    .activity-box { border: 1px solid #cccccc;  }
    .hero-section { 
        background: #2193b0;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */ 
        height: 20vh; 
        align-items: center; 
        margin-bottom: 20px; 
        margin-top: -20px; 
        }
    .title { font-size: 60px; color: #ffffff; }
    .image{ width: 300px;}
    </style>

      <script>
    export default {
        data() {
            return {
                user : null,
                reservations : []
            }
        },
        beforeMount() {
            this.user = JSON.parse(localStorage.getItem('activityStore.user'))

            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('activityStore.jwt')

            axios.get(`api/users/${this.user.id}/reservations`)
                 .then(response => this.reservations = response.data)
        }
    }
    </script>