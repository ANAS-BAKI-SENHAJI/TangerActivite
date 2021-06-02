 <template>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2"  >
                    <img :src="activity.image" :alt="activity.name">
                    <h3 class="title" v-html="activity.name"></h3>
                    <p class="text-muted">{{activity.description}}</p>
                    <h4>
                        <span class="small-text text-muted float-left">$ {{activity.price}}</span>
                    </h4>
                    <br>
                    <hr>
                    <span class="small-text text-muted float-left">Min nombre de personne: {{activity.min_number_of_people}}</span><br>
                    <span class="small-text text-muted float-left">Max nombre de personne: {{activity.max_number_of_people}}</span><br>
                    <span class="small-text text-muted float-left">included_equipment: {{activity.included_equipment}}</span><br>
                    <span class="small-text text-muted float-left">included_transport: {{activity.included_transport}}</span><br>
                    <router-link :to="{ path: '/checkout?pid='+activity.id }" class="col-md-4 btn btn-sm btn-primary float-right">Buy Now</router-link>
                </div>
            </div>
        </div>
    </template>

    <script>
    export default {
        data(){
            return {
                activity : []
            }
        },
        beforeMount(){
            let url = `/api/activities/${this.$route.params.id}`
            axios.get(url).then(response => this.activity = response.data)      
        }
        
    }
    </script>

    <style scoped>
    .small-text { font-size: 18px; }
    .title { font-size: 36px; }
    </style>