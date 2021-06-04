 <template>
        <div>
            <div class="container-fluid hero-section d-flex align-content-center justify-content-center flex-wrap ml-auto">
                <img class="HomeImage" src="/img3.jpg" alt="">
            </div>
            <div class="quote container-fluid d-flex align-content-center justify-content-center flex-wrap ml-auto">
                <h2>Feel Free To Discover</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12  align-content-center justify-content-center">
                        <div class="row">
                            <div class="col-md-3 activity-box align-content-center justify-content-center flex-wrap " v-for="(activity,index) in activities" :key="index">
                                <router-link :to="{ path: '/activities/'+activity.id}">
                                    <img class="image" :src="activity.image" :alt="activity.name">
                                    <h5 v-html="activity.name"></h5>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12  align-content-center justify-content-center SavoirPlus">
                        <table>
                            <tr>
                                <td class="spLeft">
                                    <h3 class="spTitre">Experiance</h3>
                                    <p>lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum </p>
                                    <button class="btn btn-light">En savoir plus</button>
                                </td>
                                <td class="spRight">
                                    <img class="spImage" src="img3.jpg" alt="">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <footer>
            <div class="container-fluid footer d-flex align-content-center justify-content-center flex-wrap ">
                <table class="FooterTable">
                    <tr>
                        <td class="FooterTd"></td>
                        <td class="FooterTd">
                            <p class="FooterCenter">&copy;2021 Tanger Activite</p>
                        </td>
                        <td class="FooterTd">
                            <div class="FooterIcon">
                            <a href="https://www.facebook.com/tanger.activite" target="_blank"><img src="fb.png" class="icon" alt="facebook"></a>
                            <a href="https://www.instagram.com/tangeractivite/?hl=fr" target="_blank"><img src="ig.png" class="icon" alt="instagrame"></a>
                            </div>
                        </td>
                        <td class="FooterTd"></td>
                    </tr>
                </table>
            </div>
            </footer>
        </div>
    </template>

    <script>
        export default {
            data(){
                return {
                    activities : []
                }
            },
            mounted(){
                axios.get("api/activities/").then(response => this.activities = response.data)      
            }
        }
    </script>


    
     <style scoped>
    .small-text {
        font-size: 14px;
    }
    .activity-box {
        /* border: 1px solid #cccccc; */
    }
    .hero-section {
        height: 60vh;
        align-items: center;
        margin-top: -40px;
        padding: 0%;

    }
    .title {
        font-size: 60px;
        color: #ffffff;
    }
    .image{
        width: 250px;
        border-radius: 10px;
    }
    .hero-section .HomeImage{
        width:100%;
        height:100%;
        
    }
    .quote{
        background: black;
        color: white;
        margin-top: 0%;
        padding: 10px;
        margin-bottom: 2%;
        font-family: cursive;
    }
    table{
        border-collapse: collapse;
    }
    a{
        text-decoration: none;
        color:black;
    }
    .SavoirPlus{
        margin: auto;
        padding: 0%;
        border-radius: 10px;
        margin-top: 2%;
    }
    .spLeft{
        background: black;
        color: white;
        padding: 0 0 30px 20px;
        width: 50% ;
    }
    .spRight{
        width: 50%;
        border-radius: 10px 0 0 10px;
    }
    .spImage{
        width: 100%;
        border-radius: 0 10px 10px 0;
    }
    td{
        border-radius: 10px 0 0 10px ;
    }
    .spTitre{
        padding-bottom: 5%;
    }
    .footer{
        margin-top: 2%;
        margin-bottom: 0 ;
        background: black;
        color: white;
        height: 40px;
        font-weight: 500;
    }
    .icon{
        width: 50px;
        padding-right: 20px;
        margin: auto;
    }
    .FooterTable{
        width: 100%;
    }
    .FooterTd{
        width: 25%;
    }
    .FooterCenter{
        margin: auto;
        align-content: center;
        padding-left: 25% ;
    }
    .FooterIcon{
        padding-left: 100px;
    }
    </style>