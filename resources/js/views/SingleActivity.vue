 <template>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2"  >
                    <table>
                        <tr>
                            <td rowspan="3" width="50%">
                                <img class="image" :src="activity.image" :alt="activity.name">
                            </td>
                            <td width="25%">
                                <h3 class="title sizing" v-html="activity.name"></h3>
                                <p class="sizing ">Durée d'activité: {{activity.duration_of_activity}}</p>
                            </td>  
                        </tr>  
                        <tr>
                            <td width="50%"> 
                                   <p class="font-weight-normal sizing">{{activity.description}}</p>
                            </td>
                        </tr>     
                        <tr> 
                             <td width="25%">
                                <h4>
                                    <span class="small-text  sizing">Prix: {{activity.price}} MAD</span>
                                </h4>
                             </td>   
                        </tr>        
                            
                        
                    </table>    
                    <br>
                    <hr>
                    <table class="info">
                        <tr>
                            <td><img src="/stick-man.png" class="sIcon"><span class="small-text text-muted float-left">&nbsp;&nbsp;Nombre minimale de personnes: {{activity.min_number_of_people}}</span></td>
                            <td><img src="/users.png" class="sIcon"><span class="small-text text-muted float-left">&nbsp;&nbsp;Nombre maximale de personnes: {{activity.max_number_of_people}}</span></td>
                        </tr>
                        <tr>
                            <td><img src="/backpack.png" class="sIcon"><span class="small-text text-muted float-left">&nbsp;&nbsp;inclure équipement? : {{activity.included_equipment}}</span></td>
                            <td><img src="/tr.png" class="sIcon"><span class="small-text text-muted float-left">&nbsp;&nbsp;inclure transport? : {{activity.included_transport}}</span></td>
                        </tr>
                    </table>
                    <br>
                    <hr>
                    <h5>Les équipment inclus</h5>
                    <p class="small-text text-muted float-left">{{activity.equipments_included}}</p>
                    <br>
                    <router-link :to="{ path: '/checkout?pid='+activity.id }" class="col-md-4 btn btn-sm btn-primary float-right reserver">Réserver</router-link>
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
    .title { 
        font-size: 36px;
     }
    .image{ 
        width:100%;
        border-radius: 3px;
    }
    .sizing{
         padding-left: 10px;
    }
    .info{
        width: 100%;
        height: 100px;
    }
    span{
        margin: auto;        
    }
    .sIcon{
        width: 30px;
        float: left;
    }
    .reserver{
        background-color: #2193b0;
        border: none;
        font-weight: bold;
    }
    </style>