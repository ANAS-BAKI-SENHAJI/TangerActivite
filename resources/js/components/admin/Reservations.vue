<template>
        <div>
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <td></td>
                        <td>Utilisateur ID</td>
                        <td>Activité</td>
                        <td>Date de Réservation</td>
                        <td>Prix</td>
                        <td>Heure de réservation</td>
                        <td>C'est terminée?</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(reservation,index) in reservations" :key="index">
                        <td>{{index+1}}</td>
                        <td>{{reservation.user_id}}</td>
                        <td>{{reservation.activity.name}} </td>
                        <td>{{reservation.reservation_date}}</td>
                        <td>{{reservation.activity.price}}</td>
                        <td>{{reservation.reservation_time}}</td>
                        <td>{{reservation.is_delivered == 1? "Yes" : "No"}}</td>
                        <td v-if="reservation.is_delivered == 0"><button class="btn btn-success" @click="deliver(index)">Terminée</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </template>

    <script>
    export default {
        data() {
            return {
                reservations : []

            }
        },
        beforeMount(){
            axios.get('/api/reservations/').then(response => this.reservations = response.data)
        },
        methods: {
            deliver(index) {
                let reservation = this.reservations[index]
                axios.patch(`/api/reservations/${reservation.id}/deliver`).then(response => {
                    this.reservations[index].is_delivered = 1
                    this.$forceUpdate()
                })
            }
        }
    }
    </script>