<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Home</router-link></li>
                            <li><router-link tag="a" :to="'/posts'">Posts</router-link></li>
                            <li>Post edit</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row bela">
                <div class="col-md-12">
                    <div class="card">
                        <h5>Post edit</h5>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <h5>Gallery images</h5>
                        <hr>
                        <div id="gallery" v-if="photos">
                            <div v-for="photo in photos" class="photo">
                                <font-awesome-icon icon="times" @click="deletePhoto(photo)" />
                                <img :src="photo.file_path_small" class="img-thumbnail" alt="post.title">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <h5>General info <a :href="domain + post.link" target="_blank" class="btn btn-primary pull-right">Preview</a></h5>
                        <hr>
                        <form @submit.prevent="submit()">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control" v-model="post.category_id">
                                    <option :value="index" v-for="(category, index) in lists">{{ category }}</option>
                                </select>
                                <small class="form-text text-muted" v-if="error != null && error.category_id">{{ error.category_id[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="town">Town</label>
                                <select name="town" id="town" class="form-control" v-model="post.town_id">
                                    <option :value="index" v-for="(town, index) in towns">{{ town }}</option>
                                </select>
                                <small class="form-text text-muted" v-if="error != null && error.town_id">{{ error.town_id[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label>Slider</label><br>
                                <switches v-model="post.slider" theme="bootstrap" color="primary"></switches>
                            </div>
                            <div class="form-group">
                                <label>Widget</label><br>
                                <switches v-model="post.widget" theme="bootstrap" color="primary"></switches>
                            </div>
                            <div class="form-group">
                                <label>Publish</label><br>
                                <switches v-model="post.publish" theme="bootstrap" color="primary"></switches>
                            </div>

                            <upload-image-helper
                                    :image="post.image"
                                    :defaultImage="null"
                                    :titleImage="'Post'"
                                    :error="error"
                                    @uploadImage="upload($event)"
                                    @removeRow="remove($event)"
                            ></upload-image-helper>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Edit</button>
                            </div>
                        </form>
                    </div><!-- .card -->

                    <div class="card">
                        <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" @vdropzone-success="showSuccess()"></vue-dropzone>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card">
                        <h5>Language info</h5>
                        <hr>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="eng-tab" data-toggle="tab" href="#eng" role="tab" aria-controls="contact" aria-selected="false">English</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane active" id="eng" role="tabpanel" aria-labelledby="eng-tab">
                                <form @submit.prevent="submit()">
                                    <div class="form-group">
                                        <label for="title2">Title</label>
                                        <input type="text" name="title" class="form-control" id="title2" placeholder="Title" v-model="post.title" @change="titleChange()">
                                        <small class="form-text text-muted" v-if="error != null && error.title">{{ error.title[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="slug2">Slug</label>
                                        <input type="text" name="slug" class="form-control" id="slug2" placeholder="Slug" v-model="post.slug">
                                        <small class="form-text text-muted" v-if="error != null && error.slug">{{ error.slug[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="shortIta">Short</label>
                                        <textarea name="short" id="shortIta" cols="3" rows="4" class="form-control" placeholder="Short" v-model="post.short"></textarea>
                                        <small class="form-text text-muted" v-if="error != null && error.short">{{ error.short[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Body</label>
                                        <ckeditor
                                                v-model="post.body"
                                                :config="config">
                                        </ckeditor>
                                        <small class="form-text text-muted" v-if="error != null && error.desc">{{ error.body[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Map</label>
                                        <ckeditor
                                                v-model="post.map"
                                                :config="config">
                                        </ckeditor>
                                        <small class="form-text text-muted" v-if="error != null && error.map">{{ error.map[0] }}</small>
                                    </div>
                                    <div class="form-group" v-if="seen">
                                        <label>Tags</label>
                                        <select2 :options="tags" :value="post.tags" :multiple="true" @input="input($event)">
                                            <option value="0" disabled>select one</option>
                                            <!--<option :value="tag.id" v-for="tag in post.tags">{{ tag.title }}</option>-->
                                        </select2>
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
    import { apiHost } from '../../config';
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import UploadImageHelper from '../helper/UploadImageHelper.vue';
    import UploadPdfHelper from '../helper/UploadPdfHelper.vue';
    import swal from 'sweetalert2';
    import Switches from 'vue-switches';
    import Ckeditor from 'vue-ckeditor2';
    import vue2Dropzone from 'vue2-dropzone';
    import 'vue2-dropzone/dist/vue2Dropzone.css';
    import Select2 from '../helper/Select2Helper.vue';

    export default {
        data(){
          return {
              post: {
                  tags: []
              },
              error: null,
              lists: {},
              towns: {},
              photos: {},
              tags: {},
              seen: false,
              config: {
                  toolbar: [
                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', 'Image', 'Link', 'Unlink', 'Source' ],
                      { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                      '/',
                      { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                  ],
                  height: 300,
                  filebrowserBrowseUrl: 'filemanager/show'
              },
              dropzoneOptions: {
                  url: 'api/posts/' + this.$route.params.id + '/gallery',
                  thumbnailWidth: 150,
                  maxFilesize: 0.5,
                  headers: { "Authorization": "Bearer " + this.$auth.getToken() }
              },
              domain : apiHost
          }
        },
        computed: {
            post_id(){
                return this.post.id;
            },
            user(){
                return this.$store.getters.getUser;
            }
        },
        components: {
            'font-awesome-icon': FontAwesomeIcon,
            'upload-image-helper': UploadImageHelper,
            'upload-pdf-helper': UploadPdfHelper,
            'switches': Switches,
            'ckeditor': Ckeditor,
            'vue-dropzone': vue2Dropzone,
            'select2': Select2
        },
        created(){
            this.getPost();
            this.getList();
            this.getTowns();
            this.getPhotos();
            this.getTags();
            setTimeout(() => {
                this.seen = true;
            }, 1000);
        },
        methods: {
            getPost(){
                axios.get('api/posts/' + this.$route.params.id)
                    .then(res => {
                        if(res.data.post != null){
                            this.post = res.data.post;
                            this.post.tags = res.data.tags;
                        }
                    })
                    .catch(e => {
                        console.log(e);
                        this.error = e.response.data.errors;
                    });
            },
            submit(){
                this.post.user_id = this.user.id;
                axios.put('api/posts/' + this.post.id, this.post)
                    .then(res => {
                        this.post = res.data.post;
                        this.post.tags = res.data.tags;
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.error = null;
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            upload(image){
                axios.post('api/posts/' + this.post.id + '/image', { file: image[0] })
                    .then(res => {
                        this.post.image = res.data.image;
                        this.error = null;
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }).catch(e => {
                    console.log(e);
                    this.error = e.response.data.errors;
                });
            },
            getList(){
                axios.get('api/categories/lists')
                    .then(res => {
                        this.lists = res.data.categories;
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            getTowns(){
                axios.get('api/towns/lists')
                    .then(res => {
                        this.towns = res.data.towns;
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            getPhotos(){
                axios.get('api/posts/' + this.$route.params.id + '/gallery')
                    .then(res => {
                        this.photos = res.data.photos;
                    }).catch(e => {
                    console.log(e.response);
                    this.error = e.response.data.errors;
                });
            },
            deletePhoto(photo){
                axios.post('api/photos/' + photo.id + '/destroy')
                    .then(res => {
                        this.photos = this.photos.filter(function (item) {
                            return photo.id != item.id;
                        });
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            showSuccess(){
                this.getPhotos();
            },
            getTags(){
                axios.get('api/tags/lists')
                    .then(res => {
                        this.tags = _.map(res.data.tags, (data) => {
                            var pick = _.pick(data, 'title', 'id');
                            var object = {id: pick.id, text: pick.title};
                            return object;
                        });
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            input(tag){
                this.post.tags = tag;
            },
            titleChange(){
                this.post.slug = Slug(this.post.title);
            }
        },
    }
</script>