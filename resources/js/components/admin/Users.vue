 <template>
        <div>
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <td></td>
                        <td>Utilisateur ID</td>
                        <td>Nom</td>
                        <td>Numéro Tel</td>
                        <td>Email</td>
                        <td>Rejoint à</td>
                        <td>Totale des réservations</td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user,index) in users" :key="index">
                        <td>{{index+1}}</td>
                        <td>{{user.id}}</td>
                        <td>{{user.name}}</td>
                        <td>{{user.phone}}</td>
                        <td>{{user.email}}</td>
                        <td>{{user.created_at}}</td>
                        <td>{{user.reservations.length}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </template>

    <script>
    export default {
        data() {
            return {
                users : []
            }
        },
        beforeMount() {
            axios.get('/api/users/').then(response => this.users = response.data)
        }
    }
    </script>