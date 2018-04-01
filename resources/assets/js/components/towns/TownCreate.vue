<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Home</router-link></li>
                            <li><router-link tag="a" :to="'/towns'">Towns</router-link></li>
                            <li>Create town</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row bela">
                <div class="col-md-12">
                    <div class="card">
                        <h5>Create town</h5>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="card">
                        <form @submit.prevent="submit()">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name" v-model="town.name">
                                <small class="form-text text-muted" v-if="error != null && error.name">{{ error.name[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" v-model="town.slug">
                                <small class="form-text text-muted" v-if="error != null && error.slug">{{ error.slug[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="order">Order</label>
                                <input type="text" name="order" class="form-control" id="order" placeholder="Order" v-model="town.order">
                                <small class="form-text text-muted" v-if="error != null && error.order">{{ error.order[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="keywords">Keywords</label>
                                <input type="text" name="order" class="form-control" id="keywords" placeholder="Keywords" v-model="town.keywords">
                                <small class="form-text text-muted" v-if="error != null && error.keywords">{{ error.keywords[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <ckeditor
                                        v-model="town.body"
                                        :config="config">
                                </ckeditor>
                                <small class="form-text text-muted" v-if="error != null && error.short">{{ error.body[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label>Map</label>
                                <ckeditor
                                        v-model="town.map"
                                        :config="config">
                                </ckeditor>
                                <small class="form-text text-muted" v-if="error != null && error.map">{{ error.map[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label>Publish</label><br>
                                <switches v-model="town.publish" theme="bootstrap" color="primary"></switches>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <!--<upload-image-helper-->
                            <!--:image="category.image"-->
                            <!--:defaultImage="null"-->
                            <!--:titleImage="'Category'"-->
                            <!--:error="error"-->
                            <!--@uploadImage="upload($event)"-->
                            <!--@removeRow="remove($event)"-->
                    <!--&gt;</upload-image-helper>-->
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
              town: {
                  short: null,
                  publish: false
              },
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
        methods: {
            submit(){
                axios.post('api/towns', this.town)
                    .then(res => {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Uspeh',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.$router.push('/towns');
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
//            upload(image){
//                this.category.image = image[0];
//            }
        }
    }
</script>