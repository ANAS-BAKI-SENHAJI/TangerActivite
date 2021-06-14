  <template>
        <div class="row">
            <div class="col-md-8 activity-box d-flex align-content-center justify-content-center flex-wrap big-text">
                <a href='/admin/reservations' class="color">Réservations ({{reservations.length}})</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href='/admin/activities' class="color">Activités ({{activities.length}})</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href='/admin/users' class="color">Utilisateurs ({{users.length}})</a>
            </div>

        </div>
    </template>

    <script>
    export default {
        data() {
            return {
                user : null,
                reservations : [],
                activities : [],
                users : []
            }
        },
        mounted() {
            axios.get('/api/users/').then(response => this.users = response.data)
            axios.get('/api/activities/').then(response => this.activities = response.data)
            axios.get('/api/reservations/').then(response => this.reservations = response.data)
        }
    }
    </script>

    <style scoped>
    .big-text { font-size: 28px; }
    .activity-box { 
        padding: 10px 15px; 
        height: 20vh 
    }
    .color{
        color: #2193b0;;
    }
    a{
        display:inline-block;
        text-decoration: none;    
    }
    </style>