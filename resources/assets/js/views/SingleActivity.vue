    <template>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <img :src="activity.image" :alt="activity.name">
                    <h3 class="title" v-html="activity.name"></h3>
                    <p class="text-muted">{{activity.description}}</p>
                    <h4>
                        <span class="small-text text-muted float-left">$ {{activity.price}}</span>
                        <!--<span class="small-text float-right">Available Quantity: {{activity.units}}</span>-->
                    </h4>
                    <br>
                    <hr>
                    <router-link :to="{ path: '/checkout?pid='+activity.id }" class="col-md-4 btn btn-sm btn-primary float-right">Buy Now</router-link>
                </div>
            </div>
        </div>
    </template>

    <script>
    export default {
        data(){
            return {
                product : []
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