  <template>
        <div class="row">
            <div class="col-md-4 activity-box d-flex align-content-center justify-content-center flex-wrap big-text">
                <a href='/admin/reservations'>Reservations ({{reservations.length}})</a>
            </div>
            <hr>
            <div class="col-md-4 activity-box d-flex align-content-center justify-content-center flex-wrap big-text">
                <a href='/admin/activities'>Activities ({{activities.length}})</a>
            </div>
            <div class="col-md-4 activity-box d-flex align-content-center justify-content-center flex-wrap big-text">
                <a href='/admin/users'>Users ({{users.length}})</a>
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
    .activity-box { border: 1px solid #cccccc; padding: 10px 15px; height: 20vh }
    </style>