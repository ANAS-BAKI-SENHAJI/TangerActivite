<template>
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div class="modal-header">
                        <slot name="header" v-html="data.name"></slot>
                    </div>
                    <div class="modal-body">
                        <slot name="body">
                            <table>
                                <tr>
                                    <td><label> Nom: </label></td>
                                    <td><input type="text" v-model="data.name"></td>
                                </tr>
                                <tr>
                                    <td><label>Prix: </label></td>
                                    <td><input type="text" v-model="data.price"></td>
                                </tr>
                                <tr>
                                    <td><label>Description: </label></td>
                                    <td><textarea v-model="data.description" placeholder="description"></textarea></td>
                                </tr>
                                <tr>
                                    <td><label>Durée d'activité : </label></td>
                                    <td><input type="text" v-model="data.duration_of_activity"></td>
                                </tr>
                                <tr>
                                    <td><label>Nombre minimale des personnes : </label></td>
                                    <td><input type="text" v-model="data.min_number_of_people"></td>
                                </tr>
                                <tr>
                                    <td><label>Nombre maximale des personnes : </label></td>
                                    <td><input type="text" v-model="data.max_number_of_people"></td>
                                </tr>
                                <tr>
                                    <td><label>Equipement inclus : </label></td>
                                    <td><input type="text" v-model="data.included_equipment"></td>
                                </tr>
                                <tr>
                                    <td><label>Transport inclus : </label></td>
                                    <td><input type="text" v-model="data.included_transport"></td>
                                </tr>
                                <tr>
                                    <td><label> Les équipements inclus : </label></td>
                                    <td><input type="text" v-model="data.equipments_included"></td>
                                </tr>
                                <tr>
                                    <td><label>Image</label></td>
                                    <td><input type="file" id="file" @change="attachFile" multiple></td>
                                </tr>
                            </table>
                           <!-- <label> Name: </label><input type="text" v-model="data.name">
                            <label>Price: </label><input type="text" v-model="data.price">
                            <textarea v-model="data.description" placeholder="description"></textarea>
                           <label> duration_of_activity: </label><input type="text" v-model="data.duration_of_activity">
                            <label>min_number_of_people: </label><input type="text" v-model="data.min_number_of_people">
                            <label>max_number_of_people: </label><input type="text" v-model="data.max_number_of_people">
                            <label>included_equipment: </label><input type="text" v-model="data.included_equipment">
                            <label>included_transport: </label><input type="text" v-model="data.included_transport">
                           <label> equipments_included: </label><input type="text" v-model="data.equipments_included">
                            <label>Image</label><span >
                                <img :src="data.image" v-show="data.image != null">
                                <input type="file" id="file" @change="attachFile">
                            </span> -->
                        </slot>
                    </div>
                    <div class="modal-footer">
                        <slot name="footer">
                            <button class="modal-default-button" @click="uploadFile">
                                Sauvegarder
                            </button>
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <style scoped>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }
    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }
    .modal-container {
        width: 550px;
        margin: 0px auto;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }
    .modal-header h3 {
        margin-top: 0;
        color: #42b983;
    }
    .modal-body {
        margin: 20px 0;
    }
    .modal-default-button {
        float: right;
    }
    .modal-enter {
        opacity: 0;
    }
    .modal-leave-active {
        opacity: 0;
    }
    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
    </style>


    <script>
    export default {
        props: ['activity'],
        data() {
            return {
                attachment: null
            }
        },
        computed: {
            data: function() {
                if (this.activity != null) {
                    return this.activity
                }
                return {
                    name: "",
                    price: "",
                    description: "",
                    duration_of_activity:"",
                    min_number_of_people: "",
                    max_number_of_people: "",
                    included_equipment: "",
                    included_transport: "",
                    equipments_included: "",
                    image: false
                }
            }
        },
        methods: {
            attachFile(event) {
                this.attachment = event.target.files[0];
            },
            uploadFile(event) {
                if (this.attachment != null) {
                    var formData = new FormData();
                    formData.append("image", this.attachment)
                    let headers = {'Content-Type': 'multipart/form-data'}
                    axios.post("/api/upload-file", formData, {headers}).then(response => {
                        this.activity.image = response.data
                        this.$emit('close', this.activity)
                    })
                } else {
                    this.$emit('close', this.activity)
                }
            }
        }
    }
    </script>