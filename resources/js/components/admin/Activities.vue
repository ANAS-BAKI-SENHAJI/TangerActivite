 <template>
        <div>
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <td></td>
                        <td>Activité</td>
                        <td>Prix</td>
                        <td>Description</td>
                        <td>Durée d'activité</td>
                        <td>Nombre min des personnes</td>
                        <td>Nombre max des personnes</td>
                        <td>Equipement inclus</td>
                        <td>Transport inclus</td>
                        <td>Les équipements inclus</td>
                        <td>Image</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(activity,index) in activities" :key="index" @dblclick="editingItem = activity">
                        <td>{{index+1}}</td>
                        <td v-html="activity.name"></td>
                        <td >{{activity.price}}</td>
                        <td >{{activity.description}}</td>
                        <td >{{activity.duration_of_activity}}</td>
                        <td >{{activity.min_number_of_people}}</td>
                        <td >{{activity.max_number_of_people}}</td>
                        <td >{{activity.included_equipment}}</td>
                        <td >{{activity.included_transport}}</td>
                        <td >{{activity.equipments_included}}</td>
                        <td >{{activity.image}}</td>
                        <td>
                            <button class="btn btn-danger btn-xs" @click="removeActivity(activity.id, index)">Supprimer</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <modal @close="endEditing" :activity="editingItem" v-show="editingItem != null"></modal>
            <modal @close="addActivity"  :activity="addingActivity" v-show="addingActivity != null"></modal>
            <br>
            <button class="btn btn-primary" @click="newActivity">Ajouter Activité</button>
        </div>
    </template>
    <style scoped>
    table{
        width: 100%;
    }
    </style>


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
                    description: null,
                    duration_of_activity: null,
                    min_number_of_people: null,
                    max_number_of_people: null,
                    included_equipment: null,
                    included_transport: null,
                    equipments_included: null,
                    image: null
                }
                
            },
            endEditing(activity) {
                this.editingItem = null

                let index = this.activities.indexOf(activity)
                let name = activity.name
                let price = activity.price
                let description = activity.description
                let duration_of_activity = activity.duration_of_activity
                let min_number_of_people = activity.min_number_of_people
                let max_number_of_people = activity.max_number_of_people
                let included_equipment = activity.included_equipment
                let included_transport = activity.included_transport
                let equipments_included = activity.equipments_included

                axios.put(`/api/activities/${activity.id}`, {name, price, description, duration_of_activity, min_number_of_people, max_number_of_people, included_equipment, included_transport, equipments_included})
                     .then(response => this.activities[index] = activity)
            },
            addActivity(activity) {
                this.addingActivity = null

                let name = activity.name
                let price = activity.price
                let description = activity.description
                let duration_of_activity = activity.duration_of_activity
                let min_number_of_people = activity.min_number_of_people
                let max_number_of_people = activity.max_number_of_people
                let included_equipment = activity.included_equipment
                let included_transport = activity.included_transport
                let equipments_included = activity.equipments_included
                let image = activity.image 

                axios.post("/api/activities/", {name, price, description, duration_of_activity, min_number_of_people, max_number_of_people, included_equipment, included_transport, equipments_included, image})
                     .then(response => this.activities.push(activity))
            },


            removeActivity(id, index) {
                axios.delete('/api/activities/'+id)
                .then(resp => {
                    this.activities.splice(index, 1);
                })
                .catch(error => {
                    console.log(error);
                })
            }
               

                
            
        }
    }
    </script>