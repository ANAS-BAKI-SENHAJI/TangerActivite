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
                            <div class="col-md-3 align-content-center justify-content-center flex-wrap " v-for="(activity,index) in activities" :key="index">
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
                            
                                <video loop muted autoplay poster="/users.png" class="background-video">
                                    <source src="/hafa.mp4" type="video/mp4">
                                </video>

                                <div class="background-video-content">
                                    <h3 class="spTitre">Experience</h3>
                                    <p>lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum </p>
                                    <button class="btn btn-light">En savoir plus</button>
                                </div>
                            
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




    .background-video {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    opacity: 0.5;
}

.page-hero {
    position: relative;
    overflow: hidden;
}

.background-video-content {
    position: relative;
    z-index: 1;
}

video[poster] {
    object-fit: cover;
    width: 100%;
    height: 100%;
}

.page-hero:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgb(0,0,0);
    background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 25%, rgba(22,22,22,0) 100%);
    z-index: 1;
}




    table{
        border-collapse: collapse;
        height: 250px;
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