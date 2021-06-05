 <template>
        <div>
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <td></td>
                        <td>activity</td>
                        <td>Price</td>
                        <td>Description</td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(activity,index) in activities" :key="index" :dblclick="editingItem = activity">
                        <td>{{index+1}}</td>
                        <td v-html="activity.name"></td>
                        <td v-model="activity.price">{{activity.price}}</td>
                        <td v-model="activity.description">{{activity.description}}</td>
                    </tr>
                </tbody>
            </table>
            <modal @close="endEditing" :activity="editingItem" v-show="editingItem != null"></modal>
            <modal @close="addActivity"  :activity="addingActivity" v-show="addingActivity != null"></modal>
            <br>
            <button class="btn btn-primary" @click="newActivity">Add New activity</button>
        </div>
    </template>


    <script>
    import Modal from './ActivityModal'

    export default {
        data() {
            return {
                activities: [],
                editingItem: null,
                addingActivity: null
            }
        },
        components: {Modal},
        beforeMount() {
            axios.get('/api/activities/').then(response => this.activities = response.data)
        },
        methods: {
            newActivity() {
                this.addingActivity = {
                    name: null,
                    price: null,
                    image: null,
                    description: null,
                }
            },
            endEditing(activity) {
                this.editingItem = null

                let index = this.activities.indexOf(activity)
                let name = activity.name
                let price = activity.price
                let description = activity.description

                axios.put(`/api/activities/${activity.id}`, {name, price, description})
                     .then(response => this.activities[index] = activity)
            },
            addActivity(activity) {
                this.addingActivity = null

                let name = activity.name
                let price = activity.price
                let description = activity.description
                let image = activity.image 

                axios.post("/api/activities/", {name, price, description, image})
                     .then(response => this.activities.push(activity))
            }
        }
    }
    </script>