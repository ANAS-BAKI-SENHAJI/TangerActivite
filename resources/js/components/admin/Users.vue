 <template>
        <div>
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <td>User ID</td>
                        <td>Name</td>
                        <td>Numero Tel</td>
                        <td>Email</td>
                        <td>joindre</td>
                        <td>Total Reservations</td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user,index) in users" :key="index">
                        <td>{{index+1}}</td>
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