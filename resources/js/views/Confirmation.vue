<template>
        <div>
            <div class="container-fluid hero-section d-flex align-content-center justify-content-center flex-wrap ml-auto">
                <h2>
                    <span class="title"><strong>Merci!</strong></span>
                    <img src="correct.png" class="icon image-clignote" ><br>
                    <span class="medium-text">vos réservations ont été ajoutées.</span><br>
                    <router-link :to="{name: 'userboard'}" class="small-link">
                        Voir vos réservations
                    </router-link>
                </h2>
            </div>
        </div>
    </template>

    <script>
    export default {}
    </script>

    <style scoped>
    .medium-text { font-size: 36px; }
    .small-link { font-size: 24px; text-decoration: underline; color: #2193b0; }
    .activity-box { border: 1px solid #cccccc; padding: 10px 15px; }
    .hero-section { height: 80vh; align-items: center; margin-top: -20px; margin-bottom: 20px; }
    .title { font-size: 60px; display: flex; justify-content: center }
    .icon{ width: 100px; display: block; margin-left: auto; margin-right: auto }
    </style>