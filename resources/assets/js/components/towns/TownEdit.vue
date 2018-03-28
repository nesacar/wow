<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Home</router-link></li>
                            <li><router-link tag="a" :to="'/towns'">Towns</router-link></li>
                            <li>Edit town</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row bela">
                <div class="col-md-12">
                    <div class="card">
                        <h5>Edit town</h5>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <h5>General info</h5>
                        <hr>
                        <form @submit.prevent="submit()">
                            <div class="form-group">
                                <label for="order">Order</label>
                                <input type="text" name="order" class="form-control" id="order" placeholder="Order" v-model="town.order">
                                <small class="form-text text-muted" v-if="error != null && error.order">{{ error.order[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label>Publish</label><br>
                                <switches v-model="town.publish" theme="bootstrap" color="primary"></switches>
                            </div>

                            <!--<upload-image-helper-->
                                    <!--:image="category.image"-->
                                    <!--:defaultImage="null"-->
                                    <!--:titleImage="'Category'"-->
                                    <!--:error="error"-->
                                    <!--@uploadImage="upload($event)"-->
                                    <!--@removeRow="remove($event)"-->
                            <!--&gt;</upload-image-helper>-->

                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Edit</button>
                                </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <h5>Language info</h5>
                        <hr>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="eng-tab" data-toggle="tab" href="#eng" role="tab" aria-controls="home" aria-selected="true">English</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane active" id="eng" role="tabpanel" aria-labelledby="contact-tab">
                                <form @submit.prevent="submit()">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Title" v-model="town.name">
                                        <small class="form-text text-muted" v-if="error != null && error.name">{{ error.title[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="slug2">Slug</label>
                                        <input type="text" name="slug" class="form-control" id="slug2" placeholder="Slug" v-model="town.slug">
                                        <small class="form-text text-muted" v-if="error != null && error.slug">{{ error.slug[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <ckeditor
                                                v-model="town.body"
                                                :config="config">
                                        </ckeditor>
                                        <small class="form-text text-muted" v-if="error != null && error.desc">{{ error.body[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Edit</button>
                                    </div>
                                </form>
                            </div><!-- #eng -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
//    import UploadImageHelper from '../helper/UploadImageHelper.vue';
    import swal from 'sweetalert2';
    import Switches from 'vue-switches';
    import Ckeditor from 'vue-ckeditor2';

    export default {
        data(){
          return {
              town: {},
              error: null,
              config: {
                  toolbar: [
                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', 'Image', 'Link', 'Unlink', 'Source' ],
                      { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                      '/',
                      { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                  ],
                  height: 300,
                  filebrowserBrowseUrl: 'media'
              }
          }
        },
        components: {
            'font-awesome-icon': FontAwesomeIcon,
//            'upload-image-helper': UploadImageHelper,
            'switches': Switches,
            'ckeditor': Ckeditor
        },
        created(){
            this.getTown();
        },
        methods: {
            getTown(){
                axios.get('api/towns/' + this.$route.params.id)
                    .then(res => {
                        if(res.data.town != null){
                            this.town = res.data.town;
                        }
                    })
                    .catch(e => {
                        console.log(e);
                        this.error = e.response.data.errors;
                    });
            },
            submit(){
                axios.put('api/towns/' + this.town.id, this.town)
                    .then(res => {
                        this.town = res.data.town;
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.error = null;
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
//            upload(image){
//                axios.post('api/towns/' + this.town.id + '/image', { image: image[0] })
//                    .then(res => {
//                        console.log(res);
//                        this.category.image = res.data.image;
//                        this.error = null;
//                        swal({
//                            position: 'center',
//                            type: 'success',
//                            title: 'Success',
//                            showConfirmButton: false,
//                            timer: 1500
//                        });
//                    }).catch(e => {
//                        console.log(e);
//                        this.error = e.response.data.errors;
//                    });
//            }
        }
    }
</script>